<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toppings')->insert(
            array(
                ['name'=> 'Peanut',
                'price'=> '80'],
                ['name'=> 'Whipped Cream',
                'price'=> '60'],
                ['name'=> 'Hard Chocolate',
                'price'=> '100'],
            )
        );
    }
}
