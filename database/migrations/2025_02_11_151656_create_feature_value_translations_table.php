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
        Schema::create('feature_value_translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feature_value_id')->constrained()->cascadeOnDelete();
            $table->string('locale_code')->index();
            $table->string('value');
            $table->unique(['feature_value_id', 'locale_code']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_value_translations');
    }
};
