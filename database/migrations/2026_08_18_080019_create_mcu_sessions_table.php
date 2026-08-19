<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mcu_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->foreignId('doctor_id')->nullable()->constrained()->nullOnDelete();
            $table->date('examination_date');
            $table->string('status')->default('draft');
            $table->json('anamnesis')->nullable();
            $table->json('physical_exam')->nullable();
            $table->json('work_exposure')->nullable();
            $table->json('lab_results')->nullable();
            $table->json('radiology_results')->nullable();
            $table->json('ekg_results')->nullable();
            $table->json('conclusions')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mcu_sessions');
    }
};