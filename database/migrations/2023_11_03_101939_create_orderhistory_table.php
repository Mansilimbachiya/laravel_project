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
        Schema::create('orderhistory', function (Blueprint $table) {
            $table->increments('orderhistoryid');
            $table->longtext('orderaddress');
            $table->integer('orderuserid');
            $table->date('orderdate');
            $table->string('ordertotalamount');
            $table->integer('orderstatus')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orderhistory');
    }
};
