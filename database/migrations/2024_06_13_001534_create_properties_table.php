<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('listedFor');
            $table->string('location');
            $table->unsignedBigInteger('seller_id');
            $table->json('images')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
