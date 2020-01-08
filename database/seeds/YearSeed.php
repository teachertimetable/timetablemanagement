<?php

use Illuminate\Database\Seeder;
use App\Models\Subject;

class YearSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedData = $this->seedFromCSV ( "database/csv/yearteach.csv" , ',' );
        foreach ($seedData as $ex) {
            $subject = Subject::find ( $ex[ "subject_id" ] );
            $subject->year = $ex[ "year" ];
            $subject->save ();
        }
    }

    private function seedFromCSV($filename , $delimitor)
    {
        if (!file_exists ( $filename ) || !is_readable ( $filename )) {
            return FALSE;
        }

        $header = NULL;
        $data = array();
        if (($handle = fopen ( $filename , 'r' )) !== FALSE) {
            while (($row = fgetcsv ( $handle , $delimitor )) !== FALSE) {
                if (!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine ( str_replace ( '﻿s' , 's' , $header ) , $row );
                }
            }
            fclose ( $handle );
        }

        return $data;
    }
}
