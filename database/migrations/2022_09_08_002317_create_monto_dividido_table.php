<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMontoDivididoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monto_dividido', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float("monto");
            $table->unsignedBigInteger("pedido_id");
            $table->foreign("pedido_id")->references("id")->on("pedido");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monto_dividido');
    }
}
