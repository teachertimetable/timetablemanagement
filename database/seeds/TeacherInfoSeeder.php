<?php

use Illuminate\Database\Seeder;

class TeacherInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\TeacherInfo::class,25)
            ->create()
            ->each(function($teacher){
            $teacher->post()->save(factory(App\Models\TeacherInfo::class)->make());
        });
    }
}
