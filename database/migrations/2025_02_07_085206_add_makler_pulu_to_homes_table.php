<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->decimal('makler_pulu', 10, 2)->nullable(); // 'makler_pulu' sütununu əlavə edir, 'nullable' edirik
        });
    }
    
    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('makler_pulu'); // Əgər geri qaytarmaq istəsək, sütunu silirik
        });
    }
};
