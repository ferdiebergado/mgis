<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'test',
            'email' => 'abc@123.com',
            'password' => Hash::make('abc@123'),
            'email_verified_at' => now(),
            'school_id' => 1,
        ];

        App\User::create($user);
    }
}
