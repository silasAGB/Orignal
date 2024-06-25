<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatierePremieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere_premieres', function (Blueprint $table) {
            $table->id('id_MP');
            $table->string('nom_MP');
            $table->float('prix_achat');
            $table->integer('qte_stock');
            $table->integer('seuil_stock');
            $table->integer('unite');
            $table->unsignedBigInteger('id_categorie');
            $table->timestamps();

            $table->foreign('id_categorie')->references('id_categorie')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matiere_premieres');
    }
}
