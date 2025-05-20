<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageUrl = ('web/img/logo.jpg');

        Setting::create(['key' => 'app_name', 'value' => 'BIS']);
        Setting::create(['key' => 'app_logo', 'value' => $imageUrl]);
        Setting::create(['key' => 'company_name', 'value' => 'ComLab']);
        Setting::create(['key' => 'current_currency', 'value' => 'PHP']);
        Setting::create(['key' => 'hospital_address', 'value' => 'Bohol']);
        Setting::create(['key' => 'hospital_email', 'value' => 'barangay@gmail.com']);
        Setting::create(['key' => 'hospital_phone', 'value' => '+639123456789']);
        Setting::create(['key' => 'hospital_from_day', 'value' => 'Mon to Fri']);
        Setting::create(['key' => 'hospital_from_time', 'value' => '8 AM to 5 PM']);
    }
}
