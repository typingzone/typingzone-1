<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToDocumentNamesTable extends Migration
{
    public function up()
    {
        Schema::table('document_names', function (Blueprint $table) {
            $table->softDeletes(); 
        });
    }

    public function down()
    {
        Schema::table('document_names', function (Blueprint $table) {
            $table->dropSoftDeletes(); 
        });
    }
}
