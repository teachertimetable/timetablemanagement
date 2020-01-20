<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call ( [
            CategorySeeder::class ,
            MinorSeeder::class ,
            TeacherInfoSeeder::class ,
            SubjectSeeder::class ,
            YearSeed::class ,
            TeachBySeeder::class ,
            UserSeeder::class
        ]);
    }
}
