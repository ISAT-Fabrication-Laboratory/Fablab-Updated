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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthdate');
            $table->string('organization');
            $table->string('occupation');
            $table->string('street');
            $table->string('municipality');
            $table->string('province');
            $table->string('contact_number')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('picture');
            $table->tinyInteger('type');
            /* Users: 0=>User, 1=>Admin*/
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
