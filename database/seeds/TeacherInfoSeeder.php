<?php

use Illuminate\Database\Seeder;
use App\Models\TeacherInfo;

class TeacherInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TeacherInfo::truncate();
        $seedData = $this->seedFromCSV("database/csv/TeacherInfo.csv", ',');
        TeacherInfo::insert($seedData);
    }

    private function seedFromCSV($filename, $delimitor)
    {
        if(!file_exists($filename) || !is_readable($filename))
        {
            return FALSE;
        }

        $header = NULL;
        $data = array();
        if(($handle = fopen($filename, 'r')) !== FALSE)
        {
            while(($row = fgetcsv($handle, $delimitor)) !== FALSE)
            {
                if(!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine(str_replace('﻿t','t',$header), $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}
