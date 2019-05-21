<?php

use Illuminate\Database\Seeder;

class FingerprintDeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\FingerprintDevice::create([
        	'ip' => '192.168.1.1',
        	'port' => '1470',
            'name' => 'سنسور اثرانگشت تماره یک',
            'net_state' => 0,
            'enabled' => 1,
        ]);

    }
}
