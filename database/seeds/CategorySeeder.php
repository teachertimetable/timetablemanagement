<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\Artisan;

class CategorySeeder extends Seeder
{

    /**
     * DB table name
     *
     * @var string
     */
    protected $table;

    /**
     * CSV filename
     *
     * @var string
     */
    protected $filename;

    public function __construct()
    {
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $seedData = $this->seedFromCSV("database/csv/category.csv", ',');
        Category::insert($seedData);
    }

    /**
     * Collect data from a given CSV file and return as array
     *
     * @param $filename
     * @param string $deliminator
     * @return array|bool
     */
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
                    $data[] = array_combine(str_replace('﻿c','c',$header), $row);
                }
            }
            fclose($handle);
        }

        return $data;
    }
}
