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
        $this->call(RegionsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        // $this->call(DistrictsTableSeeder::class);
        // $this->call(SchoolsTableSeeder::class);
        // $this->call(TeachersTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
