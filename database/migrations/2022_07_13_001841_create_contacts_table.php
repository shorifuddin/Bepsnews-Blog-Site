<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('contact_id');
            $table->string('contact_address_one')->nullable();
            $table->string('contact_address_two')->nullable();
            $table->string('contact_phone_one')->nullable();
            $table->string('contact_phone_two')->nullable();
            $table->string('contact_email_one',60)->nullable();
            $table->string('contact_email_two',60)->nullable();
            $table->integer('contact_status')->default(1);
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
        Schema::dropIfExists('contacts');
    }
};
