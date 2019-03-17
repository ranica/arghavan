<?php

use Illuminate\Database\Seeder;

class GroupPermitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grouppermit = \App\GroupPermit::create([
            'name'      => 'طراحان سیستم',
            'description'  => 'طراح و توسعه دهنده سیستم',
        ]);

        $grouppermitـstudent = \App\GroupPermit::create([
            'name'      => 'گروه دانشجویان',
            'description'  => 'دسترسی دانشجو',
        ]);

        /*
        Fill grouppermit_role table
         */
        $grouppermit->roles()->attach([1]);

        $grouppermitـstudent->roles()->attach([2]);

    }
}
