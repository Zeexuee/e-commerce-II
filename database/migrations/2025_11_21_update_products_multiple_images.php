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
        Schema::table('products', function (Blueprint $table) {
            // Rename 'image' to 'image1' if it exists
            if (Schema::hasColumn('products', 'image')) {
                $table->renameColumn('image', 'image1');
            }
            
            // Add image2 and image3 columns
            if (!Schema::hasColumn('products', 'image2')) {
                $table->string('image2')->nullable()->after('image1');
            }
            if (!Schema::hasColumn('products', 'image3')) {
                $table->string('image3')->nullable()->after('image2');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'image1')) {
                $table->renameColumn('image1', 'image');
            }
            $table->dropColumnIfExists('image2');
            $table->dropColumnIfExists('image3');
        });
    }
};
