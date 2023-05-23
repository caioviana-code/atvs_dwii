<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorsTable extends Migration {
    
    public function up() {

        Schema::create('professors', function (Blueprint $table) {

            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->integer('siape');
            $table->unsignedBigInteger('eixo_id');
            $table->foreign('eixo_id')->references('id')->on('eixos');
            $table->integer('ativo');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function down() {
        Schema::dropIfExists('professors');
    }
}
