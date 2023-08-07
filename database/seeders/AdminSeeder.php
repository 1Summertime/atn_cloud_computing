<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') ->insert([
            'full_name' => 'Nguyen Duc Phat',
            'user_name' => 'Ducphat',
            'email' => 'ducphat09042003@gmail.com',
            'password' => Hash::make('12345678'),
            'number' => '0978586366',
            'birthday' => '09/05/2003',
            'role' => 'admin',
            'address' => 'Ha Tinh'
        ]);
    }
}
