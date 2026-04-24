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
        Schema::create('introducers', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title')->nullable();
            $table->string('banner_sub_title')->nullable();
            $table->text('banner_desc')->nullable();
            $table->string('banner_btn_text')->nullable();
            $table->string('banner_btn_link')->nullable();
            $table->string('banner_logo_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->longText('wpwu_content')->nullable();
            $table->string('wpwu_image')->nullable();
            $table->string('hw_icon_one')->nullable();
            $table->string('hw_title_one')->nullable();
            $table->string('hw_subtitle_one')->nullable();
            $table->string('hw_icon_two')->nullable();
            $table->string('hw_title_two')->nullable();
            $table->string('hw_subtitle_two')->nullable();
            $table->string('hw_icon_three')->nullable();
            $table->string('hw_title_three')->nullable();
            $table->string('hw_subtitle_three')->nullable();
            $table->string('hw_icon_four')->nullable();
            $table->string('hw_title_four')->nullable();
            $table->string('hw_subtitle_four')->nullable();
            $table->longText('introducer_types')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_desc')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('introducers');
    }
};
