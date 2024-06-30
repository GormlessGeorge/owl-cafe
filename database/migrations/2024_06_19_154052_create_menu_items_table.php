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
        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();  // Первичный ключ
            $table->string('name');  // Имя блюда
            $table->text('ingredients');  // Состав блюда
            $table->integer('weight');  // Граммовка блюда
            $table->decimal('price', 6, 2);  // Цена блюда
            $table->boolean('is_favourite')->default(false);
            $table->string('image_path')->nullable();  // Путь к изображению блюда
            $table->unsignedBigInteger('category_id');  // Внешний ключ к таблице categories
            $table->timestamps();  // Временные метки created_at и updated_at
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
