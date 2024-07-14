<?php

namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::insert(array(
            array('id' => '1','name' => 'Admin','email' => 'admin@weloxpharma.com','password' => Hash::make('RDPwel@#236'),'is_admin'=> 1),
            array('id' => '2','name' => 'User','email' => 'user@weloxpharma.com','password' => Hash::make('+@WloxPh12'),'is_admin'=> 1),
          ));
    }
}