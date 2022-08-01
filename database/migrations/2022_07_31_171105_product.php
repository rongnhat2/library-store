<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('category_id'); 
            $table->integer('author_id'); 
            $table->string('name');
            $table->string('slug'); 
            $table->string('image'); 
            $table->string('prices'); 
            $table->string('discount'); 
            $table->string('description'); 
            $table->longtext('detail'); 
            $table->longtext('metadata'); 
            $table->integer('trending'); 
            $table->integer('view'); 
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
        Schema::dropIfExists('product');
    }
}
