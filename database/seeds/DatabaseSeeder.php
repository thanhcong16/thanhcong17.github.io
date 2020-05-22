<?php

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
         $this->call(users::class);
         $this->call(categorys::class);
         $this->call(products::class);
         $this->call(payment_method::class);
         $this->call(orders::class);
         $this->call(order_product::class);
         $this->call(feedback::class);
         $this->call(size::class);
         $this->call(product_size::class);


    }
}
