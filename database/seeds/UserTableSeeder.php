<?php

use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: yamauchiayaka
 * Date: 2018/09/10
 * Time: 16:16
 */

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = array(
            'username' => 'tege',
            'email' => 'tege@gmail.com',
            'password' => Hash::make('tege'),
            'created_at' => DB::raw('NOW()'),
            'updated_at' => DB::raw('NOW()'),
        );

        DB::table('users')->insert($user);
    }

}
