<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Subject::class,50)->create()->each(function($subject){
            $subject->post()->save(factory(App\Models\Subject::class)->make());
        });
    }
}
