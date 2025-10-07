<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description')->nullable();

            $table->unsignedBigInteger('image')->nullable();

            $table->dateTime('published_at')->nullable();
            $table->integer('order')->default(0);
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->timestamps();

            $table->foreign('image')->references('id')->on('media_files')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_events');
    }
};
