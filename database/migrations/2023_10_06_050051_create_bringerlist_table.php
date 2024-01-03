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
        Schema::create('bringerlist', function (Blueprint $table) {
            $table->increments('bid');
            $table->string('bname');
            $table->string('bmobileno');
            $table->string('bpersonname');
            $table->integer('bstatus')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bringerlist');
    }
};
