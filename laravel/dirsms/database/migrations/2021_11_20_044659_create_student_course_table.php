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
            
            $table->string('driving_lto_requirement')->default('');
            $table->string('theoretical_driving_course')->default('');
            $table->string('practical_driving_course_mv')->default('');
            $table->string('manual_transmission_mv')->default('');
            $table->string('automatic_transmission_mv')->default('');
            $table->string('practical_driving_course_mc')->default('');
            $table->string('manual_transmission_mc')->default('');
            $table->string('automatic_transmission_mc')->default('');
            $table->string('others_mc')->default('');
            $table->string('where_did_you_know_school_')->default('');


            $table->string('civil_status')->default('');
            $table->string('pob')->default('');
            $table->string('height')->default('');
            $table->string('weigth')->default('');
            $table->string('blood_type')->default('');

            $table->string('name_of_mother')->default('');
            $table->string('name_of_father')->default('');
            $table->string('person_notify_in_case_of_emergency')->default('');
            $table->string('guardian_address')->default('');
            $table->string('guardian_number')->default('');
            $table->string('guardian_pob')->default('');
            $table->string('guardian_relation')->default('');


            $table->string('y_e')->default('more than a months');

            $table->string('orno')->default('');
            $table->string('amount_paid')->default('');
            
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
