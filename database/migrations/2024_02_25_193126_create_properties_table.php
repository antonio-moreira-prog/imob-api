<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title')->nullable();
            $table->string('address')->nullable();
            $table->string('price')->nullable();
            $table->string('area')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('description')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('image')->nullable()->default('/images/default_image.jpg');
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

