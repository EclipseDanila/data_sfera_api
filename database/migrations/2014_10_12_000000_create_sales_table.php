<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->string('g_number');
            $table->date('date');
            $table->date('last_change_date');
            $table->string('supplier_article');
            $table->string('tech_size');
            $table->string('barcode');
            $table->float('total_price');
            $table->integer('discount_percent');
            $table->boolean('is_supply');
            $table->boolean('is_realization');
            $table->integer('promo_code_discount');
            $table->string('warehouse_name');
            $table->string('country_name');
            $table->string('oblast_okrug_name');
            $table->string('region_name');
            $table->bigInteger('income_id')->unsigned();
            // Идентификатор
            $table->string('sale_id');
            $table->bigInteger('odid')->unsigned();
            $table->string('spp');
            $table->float('for_pay');
            $table->float('finished_price');
            $table->float('price_with_disc');
            $table->bigInteger('nm_id')->unsigned();
            $table->string('subject');
            $table->string('category');
            $table->string('brand');
            $table->boolean('is_storno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
