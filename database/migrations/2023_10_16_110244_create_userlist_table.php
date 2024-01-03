<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('userlist', function (Blueprint $table) {
            $table->increments('uid');
            $table->string('uimage');
            $table->string('uname');
            $table->string('umobileno');
            $table->string('upassword');
            $table->string('uusername');
            $table->string('uaddress');
            $table->integer('ustatus')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userlist');
    }
};
