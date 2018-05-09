<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDadosMetodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_metodos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('metodo_id');
            $table->foreign('metodo_id')
                ->references('id')
                ->on('metodos')
                ->onDelete('cascade');
            $table->enum('tipo', ['avista', 'aprazo']);
            $table->string('banco', 10)->nullable()->comment = '001 = Banco do Brasil - www.codigobanco.com';
            $table->string('agencia', 10)->nullable();
            $table->string('conta', 20)->nullable();
            $table->string('cedente', 200)->nullable();
            $table->enum('juros', ['simples', 'composto']);
            $table->integer('juros_taxa')->nullable();
            $table->integer('parcelas')->nullable();
            $table->integer('tarifa')->nullable()->comment = 'Tarifa por custo do serviço';
            $table->boolean('debito_automatico');
            $table->boolean('recorrente');
            $table->integer('frequencia')->nullable()->comment = 'No caso de pagamento recorrente, a frequêcia deve ser informada em dias';
            $table->text('descricao');
            $table->text('observacao');
            $table->string('token')->nullable();
            $table->string('refresh_token')->nullable();
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
        Schema::dropIfExists('dados_metodos');
    }
}
