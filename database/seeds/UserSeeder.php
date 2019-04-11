<?php

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

        \App\User::create([
            'code'      => '0000',
            'name'      => 'نامعتبر',
            'password'  => bcrypt('123456'),
            'email'     => 'noreply@riratech.ir',
            'state'     => '1',
            'group_id'  => '1',
            'people_id'  => '1',
            'level_id'  => '3',
            'api_token' => str_random(60)
        ]);


        $user =  \App\User::create([
            'code'      => '1000',
            'name'      => 'root',
            'password'  => bcrypt('123456'),
            'email'     => 'root@dev.dev',
            'state'     => '1',
            'group_id'  => '1',
            'people_id'  => '2',
            'level_id'  => '1',
            'api_token' => str_random(60)
        ]);

        $user_student =  \App\User::create([
            'code'      => '9000',
            'name'      => 'دانشجو',
            'password'  => bcrypt('123456'),
            'email'     => 'stu@dev.dev',
            'state'     => '1',
            'group_id'  => '3',
            'people_id'  => '3',
            'level_id'  => '3',
            'api_token' => str_random(60)
        ]);

       /*
       Fill grouppermit_user table
       */
       $user ->grouppermits()->attach([1]);

    }
}
