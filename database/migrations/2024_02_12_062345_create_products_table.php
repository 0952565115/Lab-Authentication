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
        Schema::create('products', function (Blueprint $table) {
            $table->string('product_code', 10)->primary(); // รหัสสินค้า
            $table->string('product_name', 100); // ชื่อสินค้า
            $table->text('description')->nullable(); // รายละเอียด
            $table->integer('price'); // ราคา
            $table->integer('quantity')->unsigned(); // จำนวนคงเหลือ
            $table->timestamps(); // เวลาที่สร้างและเวลาที่อัพเดต
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
