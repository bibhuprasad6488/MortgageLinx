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
        Schema::table('services', function (Blueprint $table) {
            $table->string('thumb_title')->nullable()->after('slug');
            $table->string('thumb_short_desc')->nullable()->after('thumb_title');
            $table->string('thumb_image')->nullable()->after('thumb_short_desc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'thumb_title',
                'thumb_short_desc',
                'thumb_image'
            ]);
        });
    }
};
