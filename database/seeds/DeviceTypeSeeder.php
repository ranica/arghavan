<?php

use Illuminate\Database\Seeder;

class DeviceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\DeviceType::create([
            'name' => 'گیت'
        ]);

        \App\DeviceType::create([
            'name' => 'اثرانگشت'
        ]);

        \App\DeviceType::create([
            'name' => 'آنت تردد'
        ]);
    }
}
