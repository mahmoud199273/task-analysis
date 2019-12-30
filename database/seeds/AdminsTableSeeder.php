<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([

            [
                'name' => 'admin',
                'email' => 'admin@survey.com',
                'password' => bcrypt('password'), //password
                'activation' => '1',
                'image' => '0',
            ]
        ]);
    }
}
