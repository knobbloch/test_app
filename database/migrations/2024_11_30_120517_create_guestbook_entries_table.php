<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('guestbook_entries', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email');
            $table->text('text');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guestbook_entries');
    }
};
