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
use App\Models\Subject;

class TimeTableController extends Controller
{
    public function index()
    {
        return view ( 'management.timetable' )->with ( 'title' , 'ตารางสอน' );
    }

    public function minimalShapingWithID(Request $request)
    {
        $shape = $this->shapingWithID ( $request->teacher_id );
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
                        $x = 0;
                        /** @var $tm is variable use for foreach() loop to get an time */
                        foreach ($shape[ $wk ][ "slots" ][ "info" ][ $tc[ 'teacher_id' ] ] as $tm) {
                            /** @var $st for start time from first item of array */
                            $st = Carbon::instance ( new DateTime( $tm[ 0 ] ) );
                            /** @var $ed for end time from last item of array */
                            $ed = Carbon::instance ( new DateTime( end ( $tm ) ) );
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

    public function shapingWithID($id)
    {
        $shape = array();
        $time = $this->betweenTimeWithID ( $id );
        $slots = array();
        $i = 0;
        if ($time == "no") {
            $time = $this->betweenTime ();
        } else {
            foreach ($time as $t) {
                $shape[ $t[ "weekday" ] ][ "title" ][] = $t[ "title" ];
                $shape[ $t[ "weekday" ] ][ "slots" ][ "info" ][ $t[ "lecturer_id" ] ][] = $t[ "slots" ];
            }
        }


        return $shape;
    }

    public function betweenTimeWithID($id)
    {
        $lecturerBurden = Constraint::where ( "teacher_id" , $id )->get ();
        foreach ($lecturerBurden as $con) {
            $start = Carbon::createFromTimeString ( $con->start_time );
            $end = Carbon::createFromTimeString ( $con->end_time );
            $m[] = $this->generateDateRange ( $con->constraints_title , $con->weekday , $con->teacher_id , $start , $end );
        }
        return $m ?? "no";
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

    /* WITH ID */

    private function betweenTime()
    {
        $lecturerBurden = Constraint::all ();
        foreach ($lecturerBurden as $con) {
            $start = Carbon::createFromTimeString ( $con->start_time );
            $end = Carbon::createFromTimeString ( $con->end_time );
            $m[] = $this->generateDateRange ( $con->constraints_title , $con->weekday , $con->teacher_id , $start , $end );
        }
        return $m ?? "no";
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

        $reqSlotHours = 1;
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
                $avail[ "time" ][] = array("status" => "avaliable" , "start" => $slot->toDateTimeString () , "end" => $to->toDateTimeString () , "weekday" => ($ddm) ?? "");
            } else {
                $avail[ "busy" ][] = array("status" => "busy" , "start" => $slot->toDateTimeString () , "end" => $to->toDateTimeString () , "weekday" => array_slice ( $jq[ $i ][ "weekday" ] , 0 , -1 ) , "teacher" => $jq[ $i ][ "lecturer" ]);
                $info[] = $jq[ $i ][ "lecturer" ];
                $wkd[] = $jq[ $i ][ "weekday" ];
            }
            $i++;
        }
        return $avail;
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

    /* WITH ID */

    protected function weekdaySearcher()
    {
        $wk = $this->weekdayUnDuplicator ();
        $sett = ['morning' , 'afternoon' , 'evening'];
        $set = array(array('morning' => "09:00:00-12:00:00") , array('afternoon' => "13:00:00-16:00:00") , array('evening' => "17:00:00-20:00:00"));
        $i = 0;
        foreach ($set as $item) {
            if (isset( $wk[ $sett[ $i ] ] )) {
                $cmbl = array();
                $p[ $sett[ $i ] ] = array(
                    "weekday" => $wk[ $sett[ $i ] ] ,
                    "lecturer_who_unavaliable" => array("teacher" => (function () use (&$wk , &$item , &$sett , &$i , &$cmbl) {
                        foreach ($wk[ $sett[ $i ] ][ "info" ] as $day) {
                            $ct = Constraint::where ( "weekday" , $day )
                                ->where ( "start_time" ,
                                    (function () use (&$item , &$sett , &$i) {
                                        $r = explode ( "-" , $item[ $sett[ $i ] ] );
                                        return $r[ 0 ];
                                    }
                                    )() )
                                ->get ( "teacher_id" )->toArray ();
                            array_push ( $cmbl , array_column ( $ct , "teacher_id" ) );
                        }
//                        return $this->teachTo ( $cmbl );
                        return $this->timeAvailDef ( $cmbl );
                    })()));
            } else {

            }

            $i++;
        }
        return $p;
    }

    protected function weekdayUnDuplicator()
    {
        $result_avail = $this->minimalShaping ();
        $kp = [];
        $i = 0;
        foreach ($result_avail[ 'busy' ] as $action_listday) {
            $t = new DateTime( $action_listday[ 'start' ] );
            if (($t->format ( "H:i:s" )) === "09:00:00") {
                $kp[ "morning" ][ "info" ] = array_values ( array_unique ( $action_listday[ 'weekday' ] , SORT_STRING ) );
            } else if (($t->format ( "H:i:s" )) === "13:00:00") {
                $kp[ "afternoon" ][ "info" ] = array_values ( array_unique ( $action_listday[ 'weekday' ] , SORT_STRING ) );
            } else if (($t->format ( "H:i:s" )) === "17:00:00") {
                $kp[ "evening" ][ "info" ] = array_values ( array_unique ( $action_listday[ 'weekday' ] , SORT_STRING ) );
            }
            $i++;
        }
        return $kp;
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
                        $x = 0;
                        /** @var $tm is variable use for foreach() loop to get an time */
                        foreach ($shape[ $wk ][ "slots" ][ "info" ][ $tc[ 'teacher_id' ] ] as $tm) {
                            /** @var $st for start time from first item of array */
                            $st = Carbon::instance ( new DateTime( $tm[ 0 ] ) );
                            /** @var $ed for end time from last item of array */
                            $ed = Carbon::instance ( new DateTime( end ( $tm ) ) );
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

    public function shaping()
    {
        $shape = array();
        $time = $this->betweenTime ();
        $slots = array();
        $i = 0;
        if ($time === "no") {

        } else {
            foreach ($time as $t) {
                $shape[ $t[ "weekday" ] ][ "title" ][] = $t[ "title" ];
                $shape[ $t[ "weekday" ] ][ "slots" ][ "info" ][ $t[ "lecturer_id" ] ][] = $t[ "slots" ];
            }
        }
        return $shape;
    }

    protected function timeAvailDef(Array $p)
    {
        $schedule = [
            'start' => '09:00:00' ,
            'end' => '20:00:00' ,
        ];

        $avail = [];

        $minSlotHours = 1;
        $minSlotMinutes = 0;
        $minInterval = CarbonInterval::hour ( $minSlotHours )->minutes ( $minSlotMinutes );

        $reqSlotHours = 1;
        $reqSlotMinutes = 0;
        $reqInterval = CarbonInterval::hour ( $reqSlotHours )->minutes ( $reqSlotMinutes );

        $start = Carbon::instance ( new DateTime( $schedule[ 'start' ] ) );
        $end = Carbon::instance ( new DateTime( $schedule[ 'end' ] ) );

        $i = 0;
        $wkd = [];
        $ddm = "";
        $wkk = 0;

        foreach ($p as $people) {
            foreach (new DatePeriod( $start , $minInterval , $end ) as $slot) {
                $info = [];

                $to = $slot->copy ()->add ( $reqInterval );
                $pp = $this->slotAvailableDef ( $slot , $to , $people );
                if ($pp) {
                    $avail[ $pp[ 0 ][ "teacher_id" ] ][ "time" ][] = array(
                        "status" => "avaliable" ,
                        "start" => $slot->toDateTimeString () ,
                        "end" => $to->toDateTimeString () ,
                        "weekday" => (function () use (&$pp) {
                            $wkd = [];
                            foreach ($pp as $people_information) {
                                array_push ( $wkd , $people_information[ "weekday" ] );
                            }
                            return $wkd;
                        })()
                    );
                } else {

                }
                $i++;
            }
            $wkk++;
        }
        return $avail;
    }

    private function slotAvailableDef($from , $to , $events)
    {
        $wk = [];
        $nwk = [];
        $i = 0;

        $tcr = Constraint::whereIn ( 'teacher_id' , $events )->get ()->toArray ();
        foreach ($tcr as $tt) {
            foreach ($events as $event) {
                $eventStart = Carbon::instance ( new DateTime( $tt [ 'start_time' ] ) );
                $eventEnd = Carbon::instance ( new DateTime( $tt [ 'end_time' ] ) );
                if ($from->between ( $eventStart , $eventEnd ) && $to->between ( $eventStart , $eventEnd )) {
                    return false;
                }
            }
            array_push ( $nwk , $tt[ "weekday" ] );
            array_push ( $wk , array("teacher_id" => $tt[ 'teacher_id' ] , "weekday" => end ( $nwk )) );
        }
        return $wk;
    }

//    protected function teachTo($teacher_id){
//        $e = \App\Models\TeachBy::with ( ['haveTeacher' , 'haveSubjectName'] )->whereIn( "teacher_id" , $teacher_id )->get ()->toArray ();
//        $col = [];
//        foreach ($e as $compilation) {
//            $col[$compilation[ 'have_teacher' ][ 'teacher_id' ]][] = array(
//                "subject_id" => $compilation[ 'have_subject_name' ][ 'subject_id' ] ,
//                "subject_name" => $compilation[ 'have_subject_name' ][ 'subject_name' ] ,
//                "teacher_id" => $compilation[ 'have_teacher' ][ 'teacher_id' ] ,
//                "teacher_name" => $compilation[ 'have_teacher' ][ 'teacher_name' ] ,
//                "credit" => array(
//                    "normal_hour"=>substr($compilation['have_subject_name']['credit'],2,1),
//                    "lab_hour"=>substr($compilation['have_subject_name']['credit'],4,1),
//                    "sum_hour"=>strval((int)
//                        (substr($compilation['have_subject_name']['credit'],2,1))+(int)(substr($compilation['have_subject_name']['credit'],4,1))
//                    )
//                )
//            );
//        }
//        return $col;
//    }

    /** SLOTS ALGORITHM https://laracasts.com/discuss/channels/general-discussion/determining-available-time-slotsfor-scheduling */

    /** TIMETABLE ALGO */
}
