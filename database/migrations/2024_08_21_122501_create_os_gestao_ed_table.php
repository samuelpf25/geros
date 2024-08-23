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
        Schema::create('os_gestao', function (Blueprint $table) {
            $table->id();
            $table->string('id_ufes', 255);  // Certifique-se de que o tipo e o comprimento correspondem à tabela referenciada
            $table->foreign('id_ufes')
                  ->references('id_ufes')
                  ->on('os_ufes')
                  ->onDelete('cascade');
            
            // Referência para a tabela de status
            $table->unsignedBigInteger('fk_Status_id_status');
            $table->foreign('fk_Status_id_status')
                  ->references('id') // Coluna referenciada
                  ->on('status') // Tabela referenciada
                  ->onDelete('cascade'); // Comportamento ao deletar o registro pai
    
            // Referência para a tabela de usuários
            $table->unsignedBigInteger('fk_Usuario_id_usuario');
            $table->foreign('fk_Usuario_id_usuario')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
    
            // Referência para a tabela de categorias
            $table->unsignedBigInteger('fk_Categoria_id_categoria');
            $table->foreign('fk_Categoria_id_categoria')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('cascade');
    
            // Outros campos
            $table->text('observacao')->nullable(); // Use 'text' se 'observacao' for um texto longo
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
        Schema::dropIfExists('os_gestao');
    }
};
