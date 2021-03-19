<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'user_id'=>'1',
            'product_id'=>'1',
            'bill_id'=>'1',
            'name'=>'producto 1',
            'image'=>'img/products/product1.jpg',
            'quantity'=>'1',
            'total'=>'11111',
            'state'=>'1'
        ]);

        DB::table('orders')->insert([
            'user_id'=>'1',
            'product_id'=>'2',
            'bill_id'=>'1',
            'name'=>'producto 2',
            'image'=>'img/products/product2.jpg',
            'quantity'=>'2',
            'total'=>'22222',
            'state'=>'1'
        ]);

        DB::table('orders')->insert([
            'user_id'=>'1',
            'product_id'=>'3',
            'bill_id'=>'1',
            'name'=>'producto 3',
            'image'=>'img/products/product3.jpg',
            'quantity'=>'1',
            'total'=>'33333',
            'state'=>'1'
        ]);

        DB::table('orders')->insert([
            'user_id'=>'1',
            'product_id'=>'4',
            'bill_id'=>'1',
            'name'=>'producto 4',
            'image'=>'img/products/product4.jpg',
            'quantity'=>'3',
            'total'=>'44444',
            'state'=>'1'
        ]);

        DB::table('orders')->insert([
            'user_id'=>'1',
            'product_id'=>'5',
            'bill_id'=>'1',
            'name'=>'producto 5',
            'image'=>'img/products/product5.jpg',
            'quantity'=>'2',
            'total'=>'55555',
            'state'=>'1'
        ]);
    }
}
