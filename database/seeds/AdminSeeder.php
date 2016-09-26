<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->delete();
        Admin::create(array(
            'email'    => 'admin',
            'password' => Hash::make('admin')
        ));
    }
}
