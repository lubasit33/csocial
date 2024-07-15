<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contas', function (Blueprint $table) {
            $table->id();
            $table->string('numero_conta', 11)->unique();
            $table->date('data_abertura');
            $table->decimal('saldo', 18, 2)->default(0.0);
            $table->foreignId('titular')
                ->constrained('associados')
                ->cascadeOnUpdate();
            $table->foreignId('avalista_id')
                ->constrained()
                ->cascadeOnUpdate();
            $table->index('numero_conta');
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
        Schema::dropIfExists('contas');
    }

}
