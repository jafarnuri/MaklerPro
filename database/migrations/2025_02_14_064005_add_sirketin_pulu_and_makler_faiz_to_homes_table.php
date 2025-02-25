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
            $table->decimal('sirketin_pulu', 10, 2)->after('price')->default(0);
            $table->decimal('makler_faiz', 5, 2)->after('sirketin_pulu')->default(0);
        });
    }

    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn(['sirketin_pulu', 'makler_faiz']);
        });
    }
};
