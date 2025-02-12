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
   Schema::create('shops', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id')->nullable(); // Makler (istifadəçi) ID-si
    $table->string('title'); // Mağaza adı
    $table->text('description')->nullable(); // Mağaza haqqında məlumat
    $table->decimal('price', 10, 2)->nullable(); // Satış və ya kirayə qiyməti
    $table->decimal('area', 10, 2)->nullable(); // Sahə ölçüsü
    $table->string('area_unit')->default('m²'); // Ölçü vahidi (m² və ya ft²)
    $table->string('address'); // Ünvan
    $table->string('image')->nullable(); // Mağaza şəkli
    $table->enum('sale_type', ['sale', 'rent']); // Satış və ya kirayə
    $table->boolean('status')->default(true); // Aktiv/deaktiv status
    $table->decimal('faiz_derecesi', 5, 2)->nullable(); // Faiz dərəcəsi
    $table->decimal('latitude', 10, 6)->nullable(); // Xəritə - enlik
    $table->decimal('longitude', 10, 6)->nullable(); // Xəritə - uzunluq
    $table->string('owner_name'); // Mağaza sahibinin adı
    $table->string('owner_contact'); // Mağaza sahibinin əlaqə nömrəsi
    $table->timestamps();

    $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
