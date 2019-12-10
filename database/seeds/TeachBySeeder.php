<?php

use Illuminate\Database\Seeder;
use App\Models\TeachBy;

class TeachBySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeachBy::truncate ();
        $seedData = $this->seedFromCSV ( "database/csv/teach_by.csv" , ',' );
        TeachBy::insert ( $seedData );
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
