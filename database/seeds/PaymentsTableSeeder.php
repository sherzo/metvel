<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payments')->insert([
        	['name' => 'Transferencia'],
        	['name' => 'Debito'],
        	['name' => 'Credito'],
        	['name' => 'Efectivo']
    	]);
    }
}
