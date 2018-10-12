<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->date('dob');
            $table->tinyInteger('gender');
            $table->string('photo');
            $table->integer('blood_group')->unsigned();
            $table->string('email');
            $table->string('contact_number');
            $table->text('present_address');
            $table->text('permanent_address');
            $table->string('nationality');
            $table->string('religion');
            $table->string('signature');
            $table->string('reg_token');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('exam_season_id')->unsigned();
            $table->foreign('exam_season_id')->references('id')->on('exam_seasons')->onDelete('cascade');
            $table->boolean('status')->default(false);

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
        Schema::dropIfExists('students');
    }
}
