<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_logs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('birth_date');
            $table->string('phone');
            $table->string('address');
            $table->string('credit_card');
            $table->integer('four_numbers');
            $table->string('franchise');
            $table->string('email');
            $table->string('error_message');
            $table->unsignedBigInteger('user_id')->nullable($value = false);
            $table->unsignedBigInteger('csv_file_id')->nullable($value = false);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('csv_file_id')->references('id')->on('csv_files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_logs');
    }
}
