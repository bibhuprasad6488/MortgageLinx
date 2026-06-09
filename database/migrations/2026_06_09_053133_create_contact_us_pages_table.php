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
        Schema::create('contact_us_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->default('CONTACT US');
            $table->string('banner_title')->nullable();
            $table->string('banner_sub_title')->nullable();
            $table->text('banner_desc')->nullable();
            $table->string('banner_btn_text')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('wccml_icon_one')->nullable();
            $table->string('wccml_title_one')->nullable();
            $table->string('wccml_subtitle_one')->nullable();
            $table->string('wccml_icon_two')->nullable();
            $table->string('wccml_title_two')->nullable();
            $table->string('wccml_subtitle_two')->nullable();
            $table->string('wccml_icon_three')->nullable();
            $table->string('wccml_title_three')->nullable();
            $table->string('wccml_subtitle_three')->nullable();
            $table->string('wccml_icon_four')->nullable();
            $table->string('wccml_title_four')->nullable();
            $table->string('wccml_subtitle_four')->nullable();
            $table->string('wccml_icon_five')->nullable();
            $table->string('wccml_title_five')->nullable();
            $table->string('wccml_subtitle_five')->nullable();
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
        Schema::dropIfExists('contact_us_pages');
    }
};
