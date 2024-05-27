<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float("monto");
            $table->unsignedBigInteger("cliente_id");
            $table->unsignedBigInteger("mesa_id");
            $table->unsignedBigInteger("mesero_id");
            $table->foreign("cliente_id")->references("id")->on("cliente");
            $table->foreign("mesa_id")->references("id")->on("mesa");
            $table->foreign("mesero_id")->references("id")->on("mesero");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
