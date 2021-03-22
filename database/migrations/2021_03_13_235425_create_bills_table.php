<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('payed');
            $table->integer('ref_epayco')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('cupon')->nullable();
            $table->string('name2')->nullable();
            $table->string('phone2')->nullable();
            $table->string('add2')->nullable();
            $table->text('message')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
