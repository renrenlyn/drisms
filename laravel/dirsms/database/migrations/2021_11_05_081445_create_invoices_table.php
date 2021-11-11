<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('reference')->nullable();
            $table->integer('school_id')->nullable();
            $table->integer('branch_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('amountpaid')->nullable();
            $table->string('item')->default('unknown');
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
        Schema::dropIfExists('invoices');
    }
}
