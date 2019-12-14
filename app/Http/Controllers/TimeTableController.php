<?php

namespace App\Http\Controllers;

use App\Models\TeacherInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Constraint;
use Whoops\Exception\ErrorException;
use DateTime;
use Carbon\CarbonInterval;
use DatePeriod;

class TimeTableController extends Controller
{
    public function index()
    {
        return view ( 'management.timetable' )->with ( 'title' , 'ตารางสอน' );
    }

    /** TIMETABLE ALGO */

    private function generateDateRange(string $title , string $weekday , string $lectid , Carbon $start_date , Carbon $end_date , $slot_duration = 60)
    {
        $dates = [];
        $slots = $start_date->diffInMinutes ( $end_date ) / $slot_duration;

        //first unchanged time
        $dates[ "title" ] = $title;
        $dates[ "lecturer_id" ] = $lectid;
        $dates[ "weekday" ] = $weekday;
        $dates[ "duration_hour" ] = $start_date->diff ( $end_date )->format ( '%h' );
        $dates[ "slots" ][] = $start_date->toTimeString ();

        for ($s = 1; $s <= $slots; $s++) {

            $dates[ "slots" ][] = $start_date->addMinute ( $slot_duration )->toTimeString ();

        }

        return $dates;
    }

    private function betweenTime()
    {

        $lecturerBurden = Constraint::all ();
        foreach ($lecturerBurden as $con) {
            $start = Carbon::createFromTimeString ( $con->start_time );
            $end = Carbon::createFromTimeString ( $con->end_time );
            $m[] = $this->generateDateRange ( $con->constraints_title , $con->weekday , $con->teacher_id , $start , $end );
        }
        return $m;
    }

    public function shaping()
    {
        $shape = array();
        $time = $this->betweenTime ();
        $slots = array();
        $i = 0;
        foreach ($time as $t) {
            $shape[ $t[ "weekday" ] ][ "title" ][] = $t[ "title" ];
            $shape[ $t[ "weekday" ] ][ "slots" ][ "info" ][ $t[ "lecturer_id" ] ][] = $t[ "slots" ];
        }

        return $shape;
    }

    public function minimalShaping()
    {
        $shape = $this->shaping ();
        $weekday = ['mon' , 'tue' , 'wed' , 'thu' , 'fri' , 'sat' , 'sun'];
        $teacher = TeacherInfo::all ();

        $tt = [];
        $start = [];
        $end = [];
        foreach ($weekday as $wk) {
            /** f(array_key_exists) check weekday array in foreach in shape array */
            if (array_key_exists ( $wk , $shape )) {
                foreach ($teacher as $tc) {
                    /** f(array_key_exists) check info slots in teacher_id tuples */
                    if (array_key_exists ( $tc[ 'teacher_id' ] , $shape[ $wk ][ "slots" ][ "info" ] )) {
//                        $start[] = Carbon::instance (new DateTime($shape[$wk]["slots"]["info"][$tc['teacher_id']][0][0]));
//                        $end[] = $shape[$wk]["slots"]["info"][$tc['teacher_id']];
                        $x = 0;
                        /** @var $tm is variable use for foreach() loop to get an time */
                        foreach ($shape[ $wk ][ "slots" ][ "info" ][ $tc[ 'teacher_id' ] ] as $tm) {
                            /** @var $st for start time from first item of array */
                            $st = Carbon::instance ( new DateTime( $tm[ 0 ] ) );
                            /** @var $ed for end time from last item of array */
                            $ed = Carbon::instance ( new DateTime( end ( $tm ) ) );
//                            $start[$tc["teacher_id"]][$x][$wk][] = array("start"=>$st,"end"=>$ed);
                            /** @var $start [] for array to contain time with weekday to response and get an avaliable timeslots */
                            $start[] = array("start" => $st , "end" => $ed , "weekday" => $wk , "teacher_id" => $tc[ 'teacher_id' ]);
                        }
                    } else {

                    }

                }
            } else {
                $tt[ $wk ][] = "empty";
            }
        }

        return $this->searchSpace ( $start );
    }

    /** SLOTS ALGORITHM https://laracasts.com/discuss/channels/general-discussion/determining-available-time-slotsfor-scheduling */

    private function slotAvailable($from , $to , $events)
    {
        $wk = [];
        $nwk = [];
        $i = 0;
        foreach ($events as $event) {
            $eventStart = Carbon::instance ( new DateTime( $event[ 'start' ] ) );
            $eventEnd = Carbon::instance ( new DateTime( $event[ 'end' ] ) );
            if ($from->between ( $eventStart , $eventEnd ) && $to->between ( $eventStart , $eventEnd )) {
                if (array_key_exists ( "no" , $wk )) {

                } else {
                    $wk[ "weekday" ][] = $events[ $i ][ "weekday" ];
                    $wk[ "lecturer" ][] = $events[ $i ][ "teacher_id" ];
                }
            }
            $i++;
        }
        $wk[ "weekday" ][] = "no";
        return $wk;
    }

    public function searchSpace($events)
    {
        $schedule = [
            'start' => '09:00:00' ,
            'end' => '20:00:00' ,
        ];

        $avail = [];

        $minSlotHours = 1;
        $minSlotMinutes = 0;
        $minInterval = CarbonInterval::hour ( $minSlotHours )->minutes ( $minSlotMinutes );

        $reqSlotHours = 3;
        $reqSlotMinutes = 0;
        $reqInterval = CarbonInterval::hour ( $reqSlotHours )->minutes ( $reqSlotMinutes );

        $start = Carbon::instance ( new DateTime( $schedule[ 'start' ] ) );
        $end = Carbon::instance ( new DateTime( $schedule[ 'end' ] ) );

        $i = 0;
        $wkd = [];
        $ddm = "";

        foreach (new DatePeriod( $start , $minInterval , $end ) as $slot) {
            $info = [];

            $to = $slot->copy ()->add ( $reqInterval );
            $jq[] = $this->slotAvailable ( $slot , $to , $events );
            if ($jq[ $i ][ "weekday" ][ 0 ] === "no") {

//                $teacherget = TeacherInfo::whereNotIn('teacher_id',$info)->get();
//                $teacherid = function () use(&$teacherget){
//                    $tid = [];
//                    foreach($teacherget as $tc){
//                        $tid[] = $tc['teacher_id'];
//                    }
//                    return $tid;
//                };
//                $filter = array_filter($jq[$i]["weekday"],
//                    function($val) use ($weekday){
//                        return in_array($val,$weekday);
//                    },
//                    ARRAY_FILTER_USE_KEY
//                );
//                IDEOLOGY array_unique(array_merge($wkd[0],$wkd[1],$wkd[2]),SORT_STRING)

                $avail[ "time" ][] = array("status" => "avaliable" , "start" => $slot->toDateTimeString () , "end" => $to->toDateTimeString () , "weekday" => ($ddm) ?? "");
            } else {
                $avail[ "busy" ][] = array("status" => "busy" , "start" => $slot->toDateTimeString () , "end" => $to->toDateTimeString () , "weekday" => array_slice ( $jq[ $i ][ "weekday" ] , 0 , -1 ) , "teacher" => $jq[ $i ][ "lecturer" ]);
                $info[] = $jq[ $i ][ "lecturer" ];
                $wkd[] = $jq[ $i ][ "weekday" ];
            }
            $i++;
        }
//        $weekday = ['mon' , 'tue' , 'wed' , 'thu' , 'fri' , 'sat' , 'sun'];
//        $filter = array_filter(array_unique(array_merge($wkd[0],$wkd[1],$wkd[2]),SORT_STRING),
//            function($val) use ($weekday){
//                return in_array($val,$weekday);
//            },
//            ARRAY_FILTER_USE_KEY
//        );

        return $avail;
    }

    /** SLOTS ALGORITHM https://laracasts.com/discuss/channels/general-discussion/determining-available-time-slotsfor-scheduling */

    /** TIMETABLE ALGO */
}
