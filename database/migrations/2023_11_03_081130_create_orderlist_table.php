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
        Schema::create('orderlist', function (Blueprint $table) {
            $table->increments('orderid');
            $table->integer('orderhistoryid');
            $table->integer('opid');
            $table->integer('ouid');
            $table->string('ocpprice');
            $table->string('oqty');
            $table->date('odate');
            $table->integer('ostatus')->default();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderlist');
    }
};
