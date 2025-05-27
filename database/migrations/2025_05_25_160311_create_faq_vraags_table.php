<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('faq_vragen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_categorie_id')->constrained('faq_categorieen')->onDelete('cascade');
            $table->string('vraag');
            $table->text('antwoord');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_vragen');
    }
};
