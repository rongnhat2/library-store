<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_time', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('customer_id')->nullable();
            $table->Integer('sub_total');
            $table->Integer('discount');
            $table->Integer('total');
            $table->string('name');
            $table->string('phone');
            $table->string('address');  
            $table->longtext('order_value')->nullable();
            $table->Integer('order_status'); 
            $table->integer('status')->default(1);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_time');
    }
}
