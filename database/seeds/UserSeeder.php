<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('123123');
        // create user customer
        DB::table('users')->insert([
            "name"     => "Administrator",
            "username"    => "admin",
            "password" => $password,
            "created_at" => date('Y-m-d H:i:s'),
        ]);

    }
}
