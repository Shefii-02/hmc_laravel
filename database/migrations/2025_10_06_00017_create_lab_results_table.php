<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->string('test_name');
            $table->unsignedBigInteger('result_file')->nullable();
            $table->date('test_date')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();

            $table->foreign('result_file')->references('id')->on('media_files')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_results');
    }
};
