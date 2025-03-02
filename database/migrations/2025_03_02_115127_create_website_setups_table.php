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
        Schema::create('website_setups', function (Blueprint $table) {
            $table->id();
            $table->string('cover_photo')->nullable();
            $table->text('welcome_message')->nullable();
            $table->text('about_us')->nullable();
            $table->json('our_services')->nullable();
            $table->json('faqs')->nullable();
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_setups');
    }
};
