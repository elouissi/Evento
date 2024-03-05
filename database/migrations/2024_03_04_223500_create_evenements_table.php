<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('lieux');
            $table->string('titre');
            $table->integer('prix');
            $table->integer('durée');
            $table->text('description');
            $table->enum('status',['accept','refusable','attend'])->default('attend');
            $table->enum('accptance',['auto','manuel'])->default('auto');
            $table->bigInteger('capacity');
            $table->bigInteger('tickets_vendus')->nullable();
            $table->text('localisation');
            $table->date('date');
            $table->unsignedBigInteger('organisateur');
            $table->unsignedBigInteger('categorie_id');

            $table->foreign('organisateur')
                  ->references('id')  
                  ->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('categorie_id')
                  ->references('id')  
                  ->on('categories')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
