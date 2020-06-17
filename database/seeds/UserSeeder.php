<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name' => 'Admin',
           'email' => 'admin@email.com',
           'password' => bcrypt('password'),
           'created_at' => Carbon::now(),
           'admin' => true
        ]);
    }
}
