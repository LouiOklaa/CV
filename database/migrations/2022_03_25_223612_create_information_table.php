<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->id();
            $table->string('name' ,55)->nullable();
            $table->Integer('age')->nullable();
            $table->string('phone_number' , 55)->nullable();
            $table->string('address' , 255)->nullable();
            $table->string('language' , 255)->nullable();
            $table->string('work' , 255)->nullable();
            $table->string('about_me' , 999)->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('contact_me_photo')->nullable();
            $table->string('CV_pdf')->nullable();
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
        Schema::dropIfExists('information');
    }
}
