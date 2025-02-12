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
            $table->string('owner_name')->after('status')->nullable(); // Mənzil sahibinin adı
            $table->string('owner_contact')->after('owner_name')->nullable(); // Mənzil sahibinin əlaqə nömrəsi
        });
    }

    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn(['owner_name', 'owner_contact']);
        });
    }
};
