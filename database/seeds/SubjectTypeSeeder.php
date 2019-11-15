<?php

use Illuminate\Database\Seeder;

class SubjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SubjectType::class,50)->create()->each(function($subject_type){
            $subject_type->post()->save(factory(App\Models\SubjectType::class)->make());
        });
    }
}
