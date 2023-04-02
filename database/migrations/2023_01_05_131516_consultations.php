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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->int('index_id');
            $table->string('item_name');
            $table->string('description');
            $table->string('material');
            $table->integer('quantity');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('offers_id')->constrained()->cascadeOnDelete();
            $table->string('start_date');
            $table->string('end_date');
            $table->string('consultation_status ');
        });
    }
    //
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
};
// php artisan migrate --path=database/migrations/2023_01_05_131516_consultations.php
