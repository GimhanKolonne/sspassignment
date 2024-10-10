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
        Schema::create('broker_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('license_number')->nullable()->unique();
            $table->integer('years_experience')->nullable();
            $table->text('specializations')->nullable();
            $table->text('certifications')->nullable();
            $table->text('education')->nullable();
            $table->text('bio')->nullable();
            $table->text('services')->nullable();
            $table->text('areas_served')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broker_profiles');
    }
};
