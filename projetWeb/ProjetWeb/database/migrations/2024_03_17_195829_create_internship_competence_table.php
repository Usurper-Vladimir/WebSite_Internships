<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('internship_competence', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('internship_id');
            $table->unsignedBigInteger('competence_id');
            $table->timestamps();

            $table->foreign('internship_id')->references('id')->on('internships')->onDelete('cascade');
            $table->foreign('competence_id')->references('id')->on('competences')->onDelete('cascade');

            // Pour éviter les doublons de paires internship_id et competence_id
            $table->unique(['internship_id', 'competence_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('internship_competence');
    }
};
