<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigo');
            $table->date('dataRetirada');
            $table->date('dataDevolucao');
            $table->string('pessoa', 250);
            $table->string('livro', 250);
            $table->string('status', 10);
        });
    }

    public function down()
    {
        //
    }
};
