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
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // Clé étrangère pour la table 'companies'
            $table->string('title'); 
            $table->text('description'); 
            $table->string('skills'); 
            $table->string('location');
            $table->string('promotion_type'); 
            $table->string('duration'); 
            $table->decimal('remuneration', 8, 2); 
            $table->date('offer_date'); 
            $table->integer('available_positions'); 
            $table->integer('applicants_count')->default(0); 
            $table->string('image')->nullable(); 
            $table->timestamps();

            // Définir la contrainte de clé étrangère pour 'company_id'
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};
