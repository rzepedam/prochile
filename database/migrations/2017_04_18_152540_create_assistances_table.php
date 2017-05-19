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
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('industry_id')->nullable();
            $table->unsignedInteger('country_id')->nullable();
            $table->boolean('is_male');
            $table->string('first_name');
            $table->string('male_surname');
            $table->string('female_surname')->nullable();
            $table->string('rut')->unique();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('photo')->default('/img/prochile.png');
            $table->timestamps();
            $table->softDeletes();
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
