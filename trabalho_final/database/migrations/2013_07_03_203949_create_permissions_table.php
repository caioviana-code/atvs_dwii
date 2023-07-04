<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration {
    
    public function up() {

        Schema::create('permissions', function (Blueprint $table) {

            $table->id();
            $table->string('regra');
            $table->boolean('permissao');
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('types');
            $table->timestamps();

        });
    }

    public function down() {
        Schema::dropIfExists('permissions');
    }
}
