<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('numero');
            $table->date('fecha');
            $table->integer('client_id')->unsigned();
            $table->text('notas');
            $table->text('terminos');
            $table->text('pie');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoices');
    }
}
