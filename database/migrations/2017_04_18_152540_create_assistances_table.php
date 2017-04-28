<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('position_id');
            $table->unsignedInteger('type_assistance_id')->nullable();
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('country_id');
            $table->string('first_name');
            $table->string('male_surname');
            $table->string('female_surname');
            $table->string('rut');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('industry_id');
            $table->string('phone');
            $table->string('email');
            $table->string('photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assistances');
    }
}
