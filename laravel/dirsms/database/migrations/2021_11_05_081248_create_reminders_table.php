<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            
            $table->unsignedBigInteger('school_id')->index()->nullable();
            $table->integer('days')->nalluble(); 
            $table->text('message')->default('unknown'); 
            $table->string('subject')->default('unknown'); 
            $table->enum('type', ['class', 'payment'])->default('class'); 
            $table->enum('send_via', ['email', 'sms'])->default('email'); 
            $table->enum('timing', ['before_due', 'after_due'])->default('before_due'); 

             
            $table->foreign('school_id')->references('id')->on('schools');
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
        Schema::dropIfExists('reminders');
    }
}
