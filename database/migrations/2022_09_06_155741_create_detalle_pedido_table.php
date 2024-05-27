<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedido', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer("cantidad");
            $table->float("total");
            $table->unsignedBigInteger("pedido_id");
            $table->unsignedBigInteger("producto_id");
            $table->foreign("pedido_id")->references("id")->on("pedido");
            $table->foreign("producto_id")->references("id")->on("producto");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedido');
    }
}
