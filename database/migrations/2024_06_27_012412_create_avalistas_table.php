<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvalistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avalistas', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->index();
            $table->string('bi', 14)->unique()->index();
            $table->date('data_inicio_funcoes');
            $table->decimal('salario', 14, 2);
            $table->string('local_trabalho', 255)->nullable();
            $table->string('imagem')->nullable();
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
        Schema::dropIfExists('avalistas');
    }

}
