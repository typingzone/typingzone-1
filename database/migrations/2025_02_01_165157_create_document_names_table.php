<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentNamesTable extends Migration
{
    public function up()
    {
        Schema::create('document_names', function (Blueprint $table) {
            $table->id();
            $table->string('document_name');
            $table->boolean('expiry_reminder')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_names');
    }
}

