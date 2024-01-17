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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
            $table->string("slug");
            $table->uuid()->unique()->index();
            $table->unsignedBigInteger('area');
            $table->unsignedBigInteger('floor');
            $table->unsignedBigInteger('WC');
            $table->unsignedBigInteger('room');
            $table->string('type');
            $table->boolean('parking');
            $table->boolean('elevator');
            $table->boolean('storehouse');
            $table->decimal('totalPrice');
            $table->unsignedBigInteger('mortgage');
            $table->unsignedBigInteger('rent');
            $table->foreignId("user_id")->constrained()->cascadeOnDelete();
            $table->foreignId("category_id")->constrained()->cascadeOnDelete();
            $table->foreignId("city_id")->constrained()->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estates');
    }
};
