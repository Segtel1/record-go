<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->index();
            $table->unsignedBigInteger('project_id')->index();
            $table->integer('amount');
            $table->enum('payment_source', ['bank', 'credit'])->default('bank');
            $table->date('purchase_date');
            $table->foreign('project_id')->references('id')->on('enterprise_projects')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('purchase_items')->onDelete('cascade');
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
        Schema::dropIfExists('purchases');
    }
}
