<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*Order::factory(5)->create();*/
        /*Products::factory(5)->create();*/
        $this->call(ProductSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(UserSeeder::class);
        /*$this->call(BillSeeder::class);*/
    }
}
