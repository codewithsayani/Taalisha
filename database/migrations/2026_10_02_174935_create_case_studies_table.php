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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->index();
            $table->string('client')->nullable();
            $table->foreignId('industry_id')->constrained()->restrictOnDelete();
            $table->text('description');
            $table->text('challenge');
            $table->text('solution');
            $table->text('results');
            $table->string('featured_image')->nullable();
            $table->timestamp('published_at')->index()->nullable();
            $table->string('status')->index()->default('published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
