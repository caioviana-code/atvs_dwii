<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuncionariosTable extends Migration {

    public function up() {

        Schema::create('funcionarios', function (Blueprint $table) {

            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('cpf');
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function down() {
        Schema::dropIfExists('funcionarios');
    }
}
