<?php

use App\User;
use Illuminate\Database\Seeder;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedData = $this->seedFromCSV ( "database/csv/user.csv" , ',' );
        foreach ($seedData as $ex) {
            User::create ( [
                'name' => $ex[ 'name' ] ,
                'surname' => $ex[ 'surname' ] ,
                'email' => $ex[ 'email' ] ,
                'password' => Hash::make ( $ex[ 'password' ] , [
                    'rounds' => 5
                ] ) ,
            ] );
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
                    $data[] = array_combine ( str_replace ( '﻿e' , 'e' , $header ) , $row );
                }
            }
            fclose ( $handle );
        }

        return $data;
    }
}
