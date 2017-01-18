<?php

use Illuminate\Database\Seeder;
use App\Auth\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'hchs',
            'email' => 'g9308370@hotmail.com',
            'project_prefix' => 'Hchs',
            'password' => bcrypt('123456'),
        ]);
        
    }
}
