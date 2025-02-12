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

            Schema::create('galeries', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('home_id'); // Mənzil ilə əlaqə
                $table->string('image'); // Şəkilin fayl adı
                $table->timestamps();
    
                // Xarici açar (Foreign Key)
                $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
            });
        

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeries');
    }
};
