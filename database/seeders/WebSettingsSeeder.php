<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WebSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $values =  [
            [
                'name' => 'Session Logout Time ( In Hours )',
                'type' => 'SESSION',
                'key' => 'USER_SESSION_LOGOUT_TIME',
                'value' => 20,
                'is_active' => 0,
                'field_type'=>'number'         
           ]        
        ]; 
        DB::table('web_settings')->insert($values);
    }
}
