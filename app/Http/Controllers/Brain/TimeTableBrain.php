<?php

namespace App\Http\Controllers\Brain;

use App\Models\Constraint;
use App\Models\TeacherInfo;
use ArrayIterator;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use DateTime;
use DatePeriod;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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

    public static function sortTeacher()
    {
        $timeslot = self::timeslot ();

        return $timeslot;
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
