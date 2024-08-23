<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('os_ufes', function (Blueprint $table) {
            $table->id();
            $table->string('id_ufes', 255)->unique();
            $table->text('breve_descricao');
            $table->string('entidade');
            $table->string('localizacao');
            $table->string('status_ufes');
            $table->text('descricao');
            $table->string('data_abertura');
            $table->string('categoria');
            $table->string('atribuido_fornecedor');
            $table->text('solucao');
            $table->string('tecnico');
            $table->string('prioridade');
            $table->string('requerente');
            $table->string('ult_atualizacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('os_ufes');
    }
};
