<?php

namespace App\Http\Controllers;

use App\Models\TimeTablePool;
use Carbon\Carbon;
use DemeterChain\A;
use Illuminate\Http\Request;
use DateTime;
use ArrayIterator;

class TimeTablePoolerController extends Controller
{
    public function index(Request $request)
    {
        $ttt = TimeTablePool::where ( 'indicator' , $request->action )->get ();
        $dff = 0;
        $tsr = [];
        $v = 0;
        foreach ($ttt as $t) {
            $start = Carbon::instance ( new DateTime( $t[ 'start_time' ] ) );
            $end = Carbon::instance ( new DateTime( $t[ 'end_time' ] ) );
            $dff += ($end->diff ( $start ))->h;

            $tsr[] = $t;
        }
        return $this->packing ( $tsr );
    }

    public function packing(Array $arr)
    {
        return (function () use (&$arr) {
            $v = 0;
            $itx = [];
            foreach ($arr as $item) {
                if ($v % 2 === 0) {
                    $itx[ $v ][] = $item;
                } else {

                }
                $v++;
            }
            return $this->mergerista ( $itx );
        })();
    }

    public function mergerista(Array $arr)
    {
        $v = 0;
        $mm = [];
        $ql = [];
        foreach ($arr as $item) {
            if ($v % 2 === 0) {
                $start = Carbon::instance ( new DateTime( $item[ 0 ][ 'start_time' ] ) );
                $mm[][] = $start;
            } else {
                $start = Carbon::instance ( new DateTime( $item[ 0 ][ 'start_time' ] ) );
                $mm[][] = $start;
            }
            $v++;
        }
        $ql = (function () use (&$mm) {
            $pql = [];
            $arr1 = new ArrayIterator( $mm );
            $arr1->rewind ();

            $arr2 = new ArrayIterator( $mm );
            $arr2->rewind ();
            $arr2->next ();

            foreach ($mm as $mm1 => $mm2) {
                $pql[] = array("start" => $arr1->current () , "end" => $arr2->current ());
                $arr1->next ();
                $arr2->next ();
            }
            return $pql;
        })();
        return $this->searchHour ( $ql , 3 );
    }

    public function searchHour($arr , $hr)
    {
        $pack = [];
        foreach ($arr as $a) {
            $start = Carbon::instance ( new DateTime( $a[ "start" ][ 0 ] ) );
            $end = Carbon::instance ( new DateTime( $a[ "end" ][ 0 ] ) );
            $dff = ($end->diff ( $start ))->h;
            if ($dff == $hr) {
                $pack[] = $a;
            } else {

            }
        }
        return $pack;
    }
}
