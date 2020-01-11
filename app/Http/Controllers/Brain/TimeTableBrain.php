<?php

namespace App\Http\Controllers\Brain;

use App\Models\Constraint;
use App\Models\TeacherInfo;
use ArrayIterator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime;
use DatePeriod;
use Facade\FlareClient\Time\Time;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\TeachBy;
use App\Models\TimeFit;

class TimeTableBrain
{
    /** The LeBlanc Algorithm inspired by LeBlanc in Kakao Modoo Marble  */
    /** Ability of LeBlanc is Go to Opponents and use Ability to Drop Their Ability */
    /** If Cards Appear to City , if you go to that city , The city will owned by you */
    /** Boom Monopoly ! */

    /** function callAllTeacher() for Calling a All Teacher use @class TeacherInfo */

    /** @var $BURDEN as array to collecting an Burden to System , Make it Globally ! */
    public static $BURDEN = array();
    /** @var $KEY_TEACHERID array to collecting an Key , Make it Globally ! */
    public static $KEY_TEACHERID = array();
    /** @var $WEEKDAY array to Fixing Weekday */
    public static $WEEKDAY = ['mon' , 'tue' , 'wed' , 'thu' , 'fri' , 'sat' , 'sun'];
    /** @var $TESTFIELD array to Testing Field */
    public static $TESTFIELD = array();
    /** @var $TIMETABLE_POOLER_ARRAY */
    public static $TIMETABLE_POOLER_ARRAY = array();

    /** function countLectBurden() for Counting Burden in Lecturer */
    public static function countLectBurden()
    {
        $rank = [];
        $item = 0;
        $count = Constraint::select ( DB::raw ( "teacher_id,count(weekday) as wkd" ) )->groupBy ( 'teacher_id' )->orderBy ( 'wkd' , 'DESC' )->get ();
        foreach ($count as $ct) {
            if ($ct[ "wkd" ] >= 2) {
                $rank[] = array("teacher_id" => $ct[ "teacher_id" ] , "rank" => $ct[ "wkd" ]);
            } else {
                $rank[] = array("teacher_id" => $ct[ "teacher_id" ] , "rank" => $ct[ "wkd" ]);
            }
        }
        return $rank;
    }

    public static function teacherTimeGenerate()
    {
        $timeslot = self::timeslot ();
        $timeslotIterator = new ArrayIterator( $timeslot );
        $output = [];
        $rdq = [];

        $allocatorIncrement = 0;

        foreach ($timeslot as $teacher) {
            $timeslotIterator->current ();
            foreach ($teacher as $day) {
                $day = new ArrayIterator( $teacher );
                $day->current ();
                foreach ($day as $status) {
                    //$output[strval($timeslotIterator->key())][strval($day->key())] = $status;
                    if (key ( $status ) === "busy") {

                    } else if (key ( $status ) === "avaliable") {
                        //$output[strval($timeslotIterator->key())][strval($day->key())] = $status;
                        $teacher = TeachBy::with ( ['haveSubjectName'] )->where ( 'teacher_id' , strval ( $timeslotIterator->key () ) )->inRandomOrder ()->take ( 3 )->get ();
                        $output[ strval ( $timeslotIterator->key () ) ][ strval ( $day->key () ) ] = (function () use (&$status , &$timeslotIterator , &$day) {
                            $i = 0;
                            $x = [];
                            foreach ($status as $key => $value) {
                                foreach ($value as $final) {
                                    $x[ "timeset_" . $i ] = $final;
                                    $i++;
                                }
                            }

                            $randomology = array_rand ( $x , 3 );
                            $finalrnd = array($x[ $randomology[ rand ( 0 , 1 ) ] ] , $x[ $randomology[ rand ( 0 , 2 ) ] ] , $x[ $randomology[ rand ( 1 , 2 ) ] ]);

                            $start = Carbon::instance ( new DateTime( $x[ $randomology[ rand ( 0 , 2 ) ] ][ "start" ] ) );
                            $end = Carbon::instance ( new DateTime( $x[ $randomology[ rand ( 0 , 2 ) ] ][ "end" ] ) );

                            $dff = ($end->diff ( $start ))->h;

                            $tcid = strval ( $timeslotIterator->key () );

                            $wkd = strval ( $day->key () );

                            $tt = TimeFit::create ( [
                                'start_time' => $start ,
                                'end_time' => $end ,
                                'fit_duration' => $dff ,
                                'teacher_id' => $tcid ,
                                'weekday' => $wkd
                            ] );

                            return $finalrnd;
                        })();
                    }
                }
                $day->next ();
            }
            $timeslotIterator->next ();
        }
        return true;
    }

    public static function showSubject()
    {
        $tgg = json_decode ( self::teacherTimeGenerate () );
        $iff = [];
        if ($tgg) {

            $time = DB::select ( DB::raw ( "SELECT DISTINCT ft.start_time,ft.end_time,tt.teacher_id,tt.teacher_name,ft.fit_duration,ft.weekday
FROM timefit_pool ft LEFT OUTER JOIN teacher_info tt ON ft.teacher_id = tt.teacher_id
LEFT OUTER JOIN constraints_teacher cnt on ft.teacher_id = cnt.teacher_id
where ft.fit_duration <= 3
AND ft.fit_duration > 0 AND ft.fit_duration > 1
AND ft.start_time < ft.end_time
AND cnt.weekday != ft.weekday" ) );

            foreach ($time as $timetable_pool) {
                $teach = TeachBy::with ( ['haveSubjectName'] )->where ( "teacher_id" , $timetable_pool->teacher_id )->inRandomOrder ()->take ( rand ( 3 , 5 ) )->get ()->toArray ();
                foreach ($teach as $subject) {
                    if ($timetable_pool->fit_duration <= substr ( $subject[ "have_subject_name" ][ "credit" ] , 2 , 1 ) && $subject[ "have_subject_name" ][ "year" ] === rand ( 1 , 4 ) && $subject[ "teacher_id" ] === $timetable_pool->teacher_id) {
                        $tp = (new DateTime( "next " . $timetable_pool->weekday ))->format ( "d-M-Y" );
                        //$iff[] = array("teacher_id"=>$subject["teacher_id"],"subject_name"=>$subject["have_subject_name"]["subject_name"],"subject_id"=>$subject["have_subject_name"]["subject_id"],"start_time"=>$timetable_pool->start_time,"end_time"=>$timetable_pool->end_time,"weekday"=>$tp,"credit"=>$subject["have_subject_name"]["credit"]);
                        array_push ( $iff , array("title" => $subject[ "have_subject_name" ][ "subject_name" ] . " " . $subject[ "have_subject_name" ][ "subject_id" ] , "weekday" => $tp , "start" => $timetable_pool->start_time , "end" => $timetable_pool->end_time) );
                    }
                }
            }
        }

        return $iff;
    }

    public static function showSubjectWithID($id)
    {
        $tgg = self::teacherTimeGenerate ();
        $iff = [];

        $timerr = TimeFit::where ( 'teacher_id' , $id )->select ( DB::raw ( "AVG(fit_duration) as fit" ) )->get ();

        $time = DB::select ( DB::raw ( "SELECT DISTINCT ft.start_time,ft.end_time,tt.teacher_id,tt.teacher_name,ft.fit_duration,ft.weekday
FROM timefit_pool ft LEFT OUTER JOIN teacher_info tt ON ft.teacher_id = tt.teacher_id
LEFT OUTER JOIN constraints_teacher cnt on ft.teacher_id = cnt.teacher_id
WHERE ft.fit_duration >= :avger
AND ft.fit_duration > 0 AND ft.fit_duration > 1
AND ft.start_time < ft.end_time
AND ft.teacher_id = :id" ) , array('id' => $id , 'avger' => intval ( $timerr[ 0 ][ "fit" ] )) );

        foreach ($time as $timetable_pool) {
            $teach = TeachBy::with ( ['haveSubjectName'] )->where ( "teacher_id" , $timetable_pool->teacher_id )->inRandomOrder ()->take ( rand ( 3 , 5 ) )->get ()->toArray ();
            foreach ($teach as $subject) {
                if ($timetable_pool->fit_duration == substr ( $subject[ "have_subject_name" ][ "credit" ] , 2 , 1 ) && $subject[ "have_subject_name" ][ "year" ] == rand ( 1 , 4 ) && $subject[ "teacher_id" ] === $id) {
                    $tp = (new DateTime( "-5 day next " . $timetable_pool->weekday ))->format ( "y-m-d" );
                    //$iff[$timetable_pool->teacher_id][] = array("teacher_id"=>$subject["teacher_id"],"subject_name"=>$subject["have_subject_name"]["subject_name"],"subject_id"=>$subject["have_subject_name"]["subject_id"],"time"=>array("start_time"=>$timetable_pool->start_time,"end_time"=>$timetable_pool->end_time),"weekday"=>$tp,"credit"=>$subject["have_subject_name"]["credit"]);
                    array_push ( $iff , array("title" => $subject[ "have_subject_name" ][ "subject_id" ] . " " . $subject[ "have_subject_name" ][ "subject_name" ] , "start" => date_format ( new DateTime( $tp . " " . $timetable_pool->start_time ) , "Y-m-d H:i:s" ) , "end" => date_format ( new DateTime( $tp . " " . $timetable_pool->end_time ) , "Y-m-d H:i:s" )) );
                }
            }
        }

        return $iff;
    }

    /** Slot Searching Function */
    public static function timeslot()
    {
        $avaliableTimeSlot = array();
        $i = 0;

        $schedule = [
            'start' => '09:00:00' ,
            'end' => '20:00:00' ,
        ];

        $start = Carbon::instance ( new DateTime( $schedule[ 'start' ] ) );
        $end = Carbon::instance ( new DateTime( $schedule[ 'end' ] ) );

        $minSlotHours = 1;
        $minSlotMinutes = 0;
        $minInterval = CarbonInterval::hour ( $minSlotHours )->minutes ( $minSlotMinutes );

        $reqSlotHours = 1;
        $reqSlotMinutes = 0;
        $reqInterval = CarbonInterval::hour ( $reqSlotHours )->minutes ( $reqSlotMinutes );

        self::serializeBurden ();
        foreach (self::$BURDEN as $timeslot_assessor) {
            if (sizeof ( $timeslot_assessor ) >= 1) {
                foreach (new DatePeriod( $start , $minInterval , $end ) as $slot) {
                    $to = $slot->copy ()->add ( $reqInterval );
                    $slotAvail = TimeTableBrain::slotAvailable ( $slot , $to , $timeslot_assessor );
                    if ($slotAvail) {
                        foreach (self::ifExistsForeach ( $timeslot_assessor ) as $weekday) {
                            $avaliableTimeSlot[ self::$KEY_TEACHERID [ $i ] ][ $weekday ][ "avaliable" ][]
                                = array("start" => $slot->toTimeString () , "end" => $to->toTimeString ());
                        }
                    } else {
                        foreach (self::ifExistsForeach ( $timeslot_assessor ) as $weekday) {
                            $avaliableTimeSlot[ self::$KEY_TEACHERID [ $i ] ][ $weekday ][ "busy" ][]
                                = array("start" => $slot->toTimeString () , "end" => $to->toTimeString ());
                        }
                    }
                    foreach (self::$WEEKDAY as $wkd) {
                        $avaliableTimeSlot[ self::$KEY_TEACHERID [ $i ] ][ $wkd ][ "avaliable" ][]
                            = array("start" => $slot->toTimeString () , "end" => $to->toTimeString ());
                    }
                }
            } else {
                foreach (new DatePeriod( $start , $minInterval , $end ) as $slot) {
                    $to = $slot->copy ()->add ( $reqInterval );
                    $slotAvail = self::slotAvailable ( $slot , $to , $timeslot_assessor );
                    if ($slotAvail) {
                        foreach (self::$WEEKDAY as $weekday) {
                            $avaliableTimeSlot[ self::$KEY_TEACHERID[ $i ] ][ $weekday ][ "avaliable" ][]
                                = array("start" => $slot->toTimeString () , "end" => $to->toTimeString ());
                        }
                    }
                }
            }
            self::$TESTFIELD[ self::$KEY_TEACHERID[ $i ] ] = $timeslot_assessor;
            $i++;
        }
        return $avaliableTimeSlot;
        //return self::$TESTFIELD;
        //return self::$CONSTANT_TIMESLOT;
    }

    /** Burden Serializer Function serializeBurden */
    public static function serializeBurden()
    {
        /** @var $i for Incrementing an Value to Array */
        $i = 0;
        /** @var TimeTableBrain $bd is Calling callBurden Function() */
        $bd = self::callBurden ();
        /** @var ArrayIterator $arr to Collect Key Next and Next */
        $arr = new ArrayIterator( $bd );
        /** @var foreach loop from @var $bd into $burden */
        foreach ($bd as $burden) {
            $arr->current ();
            TimeTableBrain::$KEY_TEACHERID[] = strval ( $arr->key () );
            $arr->next ();
            /** @var foreach loop from @var $burden into $subburden */
            foreach ($burden as $subburden) {
                /** Pushing to @global TimeTableBrain::$BURDEN */
                self::$BURDEN[ self::$KEY_TEACHERID[ $i ] ] = $subburden;
            }
            $i++;
        }
        /** Returning $result to whom use this function */
        return self::$BURDEN;
    }

    /** function callBurden() for Calling an Burden */

    public static function callBurden()
    {
        /** return by λ()->function */
        return (function () {
            /** @var TimeTableBrain $teacher */
            $teacher = self::callAllTeacher ();
            /** @var Array $info for Collecting an Constraints with TeacherInfo */
            $info = [];
            foreach ($teacher as $tc) {
                /** @var $info [$tc["teacher_id"]] for collecting constraints use λ($tc["teacher_id"])->function to call Constraints by Laravel Eloquent */
                $info[ $tc[ "teacher_id" ] ] = array("constraints" => (function ($teacher_id) {
                    /** return Constraints which SELECT constraints_title,teacher_id,weekday,start_time,end_time FROM constraints WHERE teacher_id = $teacher_id */
                    return Constraint::where ( "teacher_id" , $teacher_id )->get ( ["constraints_title" , "teacher_id" , "weekday" , "start_time" , "end_time"] )->toArray ();
                })( $tc[ "teacher_id" ] ));
            }
            return $info;
        })();
    }

    /** function callAllTeacher() for calling an All of Teacher */
    public static function callAllTeacher()
    {
        return TeacherInfo::all ();
    }

    public static function slotAvailable($from , $to , $events)
    {
        foreach ($events as $event) {
            $eventStart = Carbon::instance ( new DateTime( $event[ 'start_time' ] ) );
            $eventEnd = Carbon::instance ( new DateTime( $event[ 'end_time' ] ) );
            if ($from->between ( $eventStart , $eventEnd ) && $to->between ( $eventStart , $eventEnd )) {
                return false;
            } else {

            }
        }
        return true;
    }

    public static function ifExistsForeach($array)
    {
        $weekdaypack = [];
        if (isset( $array )) {
            foreach ($array as $arr) {
                if (array_key_exists ( "weekday" , $arr )) {
                    array_push ( $weekdaypack , $arr[ "weekday" ] );

                } else {

                }
            }
        } else {
            array_push ( $weekdaypack , self::$WEEKDAY );
        }

        return $weekdaypack;
    }

}
