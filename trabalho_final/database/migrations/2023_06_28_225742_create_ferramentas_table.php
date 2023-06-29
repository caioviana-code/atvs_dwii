<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFerramentasTable extends Migration {

    public function up() {

        Schema::create('ferramentas', function (Blueprint $table) {

            $table->id();
            $table->string('nome');
            $table->integer('estoque');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function down() {
        Schema::dropIfExists('ferramentas');
    }
}
