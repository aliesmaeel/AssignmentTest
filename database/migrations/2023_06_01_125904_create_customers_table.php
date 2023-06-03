<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('phone',30);
            $table->string('address',255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
