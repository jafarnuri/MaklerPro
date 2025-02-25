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
        Schema::create('shop_galeries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id'); // Mənzil ilə əlaqə
            $table->string('image'); // Şəkilin fayl adı
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_galeries');
    }
};
