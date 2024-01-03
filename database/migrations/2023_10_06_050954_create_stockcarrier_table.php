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
        Schema::create('stockcarrier', function (Blueprint $table) {
            $table->increments('scid');
            $table->string('scname');
            $table->string('scmobileno');
            $table->string('scpersonname');
            $table->integer('scstatus')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockcarrier');
    }
};
