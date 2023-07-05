<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmprestimosTable extends Migration {
    
    public function up() {

        Schema::create('emprestimos', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
            $table->unsignedBigInteger('ferramenta_id');
            $table->foreign('ferramenta_id')->references('id')->on('ferramentas');
            $table->integer('quantidade');
            $table->timestamp('data_emprestimos')->nullable();
            $table->timestamp('data_devolucao')->nullable();
            $table->softDeletes();
            $table->timestamps();

        });
    }

    public function down() {
        Schema::dropIfExists('emprestimos');
    }
}
