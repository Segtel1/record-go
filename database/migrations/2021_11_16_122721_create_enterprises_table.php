<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('enterprise_name');
            $table->unsignedBigInteger('enterprise_type_id')->index();
            $table->foreign('enterprise_type_id')->references('id')->on('enterprise_types')->onDelete('cascade');
            $table->string('business_entity_type');
            $table->integer('no_of_employees');
            $table->text('address');
            $table->string('website_url')->nullable();
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
        Schema::dropIfExists('enterprises');
    }
}
