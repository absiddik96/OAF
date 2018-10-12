<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational_qualifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->string('ssc_board');
            $table->string('ssc_name_of_institute');
            $table->string('ssc_passing_year');
            $table->string('ssc_gpa');
            $table->string('ssc_marksheet');
            $table->string('hsc_board');
            $table->string('hsc_name_of_institute');
            $table->string('hsc_passing_year');
            $table->string('hsc_gpa');
            $table->string('hsc_marksheet');
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
        Schema::dropIfExists('educational_qualifications');
    }
}
