<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolmessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('receiver_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('branch_id')->nullable(); 
            $table->enum('type', ['sms', 'email'])->default('sms');
            $table->string('contact')->default('unknown');
            $table->string('subject')->default('unknown');
            $table->longText('message')->default('unknown');
            $table->enum('status', ['Sent', 'Failed'])->default('Sent'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     *  $table->timestamp('sent_at')->default(DB::raw('CURRENT_TIMESTAMP'));
           
     */
    public function down()
    {
        Schema::dropIfExists('schoolmessages');
    }
}
