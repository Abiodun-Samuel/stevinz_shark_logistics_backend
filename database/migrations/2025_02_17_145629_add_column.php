<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->bigInteger('amount')->nullable()->default(0)->after('item');
            $table->string('sender_phone')->index()->nullable()->after('item');
            $table->string('sender_name')->index()->nullable()->after('item');
            $table->string('receiver_phone')->index()->nullable()->after('item');
            $table->string('receiver_name')->index()->nullable()->after('item');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventories', function (Blueprint $table) {
            $table->dropColumn('cash');
            $table->dropColumn('sender_phone');
            $table->dropColumn('sender_name');
            $table->dropColumn('receiver_phone');
            $table->dropColumn('receiver_name');
        });
    }
};
