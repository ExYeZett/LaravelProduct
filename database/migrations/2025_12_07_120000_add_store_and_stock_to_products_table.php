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
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (!Schema::hasColumn('products', 'store')) {
                    $table->text('store')->nullable()->after('description');
                }
                if (!Schema::hasColumn('products', 'stock')) {
                    $table->integer('stock')->default(0)->after('store');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (Schema::hasColumn('products', 'stock')) {
                    $table->dropColumn('stock');
                }
                if (Schema::hasColumn('products', 'store')) {
                    $table->dropColumn('store');
                }
            });
        }
    }
};
