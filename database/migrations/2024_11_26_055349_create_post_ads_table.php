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
        Schema::create('post_ads', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->unsignedBigInteger('country_id'); // Required field
            $table->unsignedBigInteger('state_id'); // Required field
            $table->unsignedBigInteger('city_id'); // Required field
            $table->string('company_name'); // Required field
            $table->string('contact_name'); // Required field
            $table->string('phone')->nullable(); // Optional field
            $table->string('fax')->nullable(); // Optional field
            $table->string('website')->nullable(); // Optional field
            $table->text('meta_desc')->nullable(); // Optional field
            $table->text('meta_keywords')->nullable(); // Optional field
            $table->string('email'); // Required field
            $table->string('postal_code')->nullable(); // Optional field
            $table->text('address')->nullable(); // Optional field
            $table->text('description'); // Required field
            $table->decimal('price', 10, 2)->nullable(); // Optional field
            $table->string('youtube')->nullable(); // Optional field
            $table->string('tags')->nullable(); // Optional field
            $table->string('ad_position'); // Required field
            $table->string('price_plan'); // Required field
            $table->string('audio')->nullable(); // Optional field
            $table->json('photos')->nullable(); // Optional field
            $table->unsignedBigInteger('user_id'); // Required field
            $table->timestamps(); // Automatically adds 'created_at' and 'updated_at' columns

            // Foreign keys for relationships
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_ads');
    }
};
