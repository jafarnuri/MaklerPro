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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Mənzili əlavə edən istifadəçi
            $table->string('title'); // Başlıq
            $table->text('description'); // Açıqlama
            $table->decimal('price', 10, 2); // Qiymət
            $table->integer('rooms'); // Otaq sayı
            $table->integer('bathrooms'); // Hamam sayı
            $table->integer('area'); // Sahə (m² və ya ft²)
            $table->enum('area_unit', ['m²', 'ft²'])->default('m²'); // Sahə vahidi
            $table->string('address'); // Ünvan
            $table->string('image')->nullable(); // Şəkil (Fayl yolu)
            $table->boolean('is_featured')->default(false); // Seçilmiş mənzil olub-olmaması
            $table->enum('house_type', ['heyet evi', 'bina evi', 'bag evi']); // Evin tipi
            $table->enum('sale_type', ['kiraye', 'satiliq']); // Satış növü
            $table->enum('status', ['satildi', 'qalir', 'verildi'])->default('qalir'); // Mövcud status
            $table->decimal('broker_commission_percentage', 5, 2); // Komissiya faizi
            $table->timestamps();

            // Xarici açar (Foreign Key) - istifadəçi silindiyi zaman null edir
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Cədvəl mövcuddursa, silirik
        Schema::dropIfExists('homes');
    }
};