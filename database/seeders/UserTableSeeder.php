<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'FirstName' => 'John ',
            'MiddleName' => 'Doe',
            'LastName' => 'Qooe',
            'email' => 'john@example.com',
            '_password' => Hash::make('12345'),
            'role' => 'admin'

        ]);
        DB::table('users')->insert([
            'FirstName' => 'Shant ',
            'MiddleName' => 'Moe',
            'LastName' => 'Qooe',
            'email' => 'shant@example.com',
            '_password' => Hash::make('12345'),
            'role' => 'principal'
        ]);
    }
}
// FirstName	MiddleName	LastName	email	_password	role	created_at	updated_at	
