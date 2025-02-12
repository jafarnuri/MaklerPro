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
        Schema::table('homes', function (Blueprint $table) {
            // Yeni sütunu əlavə etmək
            $table->decimal('faiz_derecesi', 5, 2)->nullable()->default(0); // Faiz dərəcəsi
        });
    }
    
    public function down(): void
    {
        Schema::table('homes', function (Blueprint $table) {
            // Yeni sütunu silmək
            $table->dropColumn('faiz_derecesi');
        });
    }
};
