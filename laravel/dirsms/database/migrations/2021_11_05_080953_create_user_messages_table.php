<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsermessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('receiver_id')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('branch_id')->nullable(); 
            $table->string('contact')->default('unknown');
            $table->string('subject')->default('unknown');
            $table->longText('message')->default('Missing message');
            $table->enum('type', ['easy', 'hard'])->default('easy');
            $table->enum('status', ['Sent', 'Failed'])->default('Sent');
            $table->timestamp('sent_date')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('user_messages');
    }
}
