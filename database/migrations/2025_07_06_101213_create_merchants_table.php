<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);

            $table->string('banner_image')->nullable();
            $table->string('tagline')->nullable();
            $table->text('banner_description')->nullable();

            $table->string('feature_1_title')->nullable();
            $table->text('feature_1_desc')->nullable();
            $table->string('feature_2_title')->nullable();
            $table->text('feature_2_desc')->nullable();
            $table->string('feature_3_title')->nullable();
            $table->text('feature_3_desc')->nullable();
            $table->string('feature_4_title')->nullable();
            $table->text('feature_4_desc')->nullable();

            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();

            $table->text('contact_description')->nullable();
            $table->string('contact_image')->nullable();
            $table->text('contact_address')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_instagram')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
