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
        Schema::create('products', function (Blueprint $table) {
            $table->id()->generatedAs()->always();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->bigInteger('price')->default(0);
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->string('status')->default('Tersedia');
            $table->timestamps();
            $table->string('created_by', length: 255)->nullable();
            $table->string('updated_by', length: 255)->nullable();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
