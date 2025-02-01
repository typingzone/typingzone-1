<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); 
            $table->text('note')->nullable(); 
            $table->date('reminder_date')->nullable(); 
            $table->unsignedBigInteger('user_id'); // Add the user_id column
            $table->timestamps(); 
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};

