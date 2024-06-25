<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id('id_produit');
            $table->string('reference_produit')->unique();
            $table->string('nom_produit');
            $table->text('description_produit')->nullable();
            $table->float('prix_details_produit');
            $table->float('prix_gros_produit');
            $table->integer('qte_preparation');
            $table->integer('qte_stock');
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
        Schema::dropIfExists('produits');
    }
}
