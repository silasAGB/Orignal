<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatiereProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matiere_produit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_MP');
            $table->unsignedBigInteger('id_Produit');
            $table->integer('qte');
            $table->timestamps();

            $table->foreign('id_MP')->references('id_MP')->on('matiere_premieres')->onDelete('cascade');
            $table->foreign('id_Produit')->references('id_Produit')->on('produits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matiere_produit');
    }
}
