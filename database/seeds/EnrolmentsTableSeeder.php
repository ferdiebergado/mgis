<?php

use Illuminate\Database\Seeder;

class EnrolmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Enrolment::class, 500)->create();
    }
}
