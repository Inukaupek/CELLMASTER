<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mobile_phones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->text('description');
            $table->string('ram');
            $table->string('storage');
            $table->string('camera');
            $table->string('display');
            $table->string('image');
            $table->string('price');
            $table->string('quantity');
            $table->unsignedBigInteger('supplier_id'); // Corrected the typo
            $table->foreign('supplier_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('availability')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mobile_phones');
    }
};
