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
        Schema::create('become_an_introducers', function (Blueprint $table) {
            $table->id();
            $table->string('banner_title')->nullable();
            $table->string('banner_sub_title')->nullable();
            $table->text('banner_desc')->nullable();
            $table->string('banner_btn_text')->nullable();
            $table->string('banner_btn_link')->nullable();
            $table->string('banner_logo_image')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('wpwm_icon_one')->nullable();
            $table->string('wpwm_title_one')->nullable();
            $table->string('wpwm_subtitle_one')->nullable();
            $table->string('wpwm_icon_two')->nullable();
            $table->string('wpwm_title_two')->nullable();
            $table->string('wpwm_subtitle_two')->nullable();
            $table->string('wpwm_icon_three')->nullable();
            $table->string('wpwm_title_three')->nullable();
            $table->string('wpwm_subtitle_three')->nullable();
            $table->string('wpwm_icon_four')->nullable();
            $table->string('wpwm_title_four')->nullable();
            $table->string('wpwm_subtitle_four')->nullable();
            $table->string('wpwm_icon_five')->nullable();
            $table->string('wpwm_title_five')->nullable();
            $table->string('wpwm_subtitle_five')->nullable();
            $table->string('wgpw_image')->nullable();
            $table->longText('wgpw_content')->nullable();
            $table->string('sp_icon_one')->nullable();
            $table->string('sp_title_one')->nullable();
            $table->string('sp_subtitle_one')->nullable();
            $table->string('sp_icon_two')->nullable();
            $table->string('sp_title_two')->nullable();
            $table->string('sp_subtitle_two')->nullable();
            $table->string('sp_icon_three')->nullable();
            $table->string('sp_title_three')->nullable();
            $table->string('sp_subtitle_three')->nullable();
            $table->string('sp_icon_four')->nullable();
            $table->string('sp_title_four')->nullable();
            $table->string('sp_subtitle_four')->nullable();
            $table->string('sp_icon_five')->nullable();
            $table->string('sp_title_five')->nullable();
            $table->string('sp_subtitle_five')->nullable();
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
        Schema::dropIfExists('become_an_introducers');
    }
};
