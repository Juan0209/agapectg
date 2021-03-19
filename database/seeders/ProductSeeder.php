<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('products')->insert([
           'name'=>'producto 1',
           'description'=>'descripción producto 1',
           'image'=>'img/products/product1.jpg',
           'price'=>'11111',
           'catalogues_id'=>'1'
       ]);

        DB::table('products')->insert([
            'name'=>'producto 2',
            'description'=>'descripción producto 2',
            'image'=>'img/products/product2.jpg',
            'price'=>'22222',
            'catalogues_id'=>'2'
        ]);

        DB::table('products')->insert([
            'name'=>'producto 3',
            'description'=>'descripción producto 3',
            'image'=>'img/products/product3.jpg',
            'price'=>'33333',
            'catalogues_id'=>'2'
        ]);

        DB::table('products')->insert([
            'name'=>'producto 4',
            'description'=>'descripción producto 4',
            'image'=>'img/products/product4.jpg',
            'price'=>'44444',
            'catalogues_id'=>'3'
        ]);

        DB::table('products')->insert([
            'name'=>'producto 5',
            'description'=>'descripción producto 5',
            'image'=>'img/products/product5.jpg',
            'price'=>'55555',
            'catalogues_id'=>'3'
        ]);
    }
}
