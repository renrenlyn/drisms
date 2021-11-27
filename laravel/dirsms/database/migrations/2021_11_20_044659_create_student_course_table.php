<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_course', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('school_course_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->string('y_e')->default('more than a months');
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
        Schema::dropIfExists('student_course');
    }
}
