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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->default('ABOUT US');
            $table->string('banner_title')->nullable();
            $table->string('banner_sub_title')->nullable();
            $table->text('banner_desc')->nullable();
            $table->string('banner_btn_text')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('our_story_title')->nullable();
            $table->string('our_story_sub_title')->default('OUR STORY');
            $table->longText('our_story_desc')->nullable();
            $table->boolean('consultation_show')->default(false);
            $table->string('story_right_image')->nullable();
            $table->longText('story_right_desc')->nullable();
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
        Schema::dropIfExists('about_us');
    }
};
