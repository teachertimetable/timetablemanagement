<?php

use Illuminate\Database\Seeder;
use App\Models\Minor;

class MinorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Minor::truncate();
        $seedData = $this->seedFromCSV("database/csv/minor.csv", ',');
        Minor::insert($seedData);
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
                    $data[] = array_combine(str_replace('﻿m','m',$header), $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}
