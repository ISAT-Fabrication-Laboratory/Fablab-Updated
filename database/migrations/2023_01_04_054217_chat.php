<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chat', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('sender')->unsigned();
            $table->string('data')->nullable();
            $table->string('type')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat');
    }
};
// php artisan migrate --path=database/migrations/2023_01_04_054217_chat.php