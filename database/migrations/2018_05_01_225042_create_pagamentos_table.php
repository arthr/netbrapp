<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pedido_id');
            $table->foreign('pedido_id')
                ->references('id')
                ->on('pedidos');
            $table->decimal('valor', 10, 2);
            $table->unsignedInteger('metodo_id');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('pagamentos', function (Blueprint $table) {
            $table->foreign('metodo_id')
                ->references('id')
                ->on('metodos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagamentos');
    }
}
