<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigo');
            $table->string('nome', 100);
            $table->string('endereco', 250);
            $table->string('telefone', 15);
            $table->string('email', 100);
        });
    }

    public function down()
    {
        //
    }
};
