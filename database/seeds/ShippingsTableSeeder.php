<?php

use Illuminate\Database\Seeder;

class ShippingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shippings')->insert([
        	['name' => 'MRW'],
        	['name' => 'Zoom'],
        	['name' => 'Tealca']
    	]);
    }
}
