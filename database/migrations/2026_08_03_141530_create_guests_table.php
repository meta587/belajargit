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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('telp', 16);
            $table->string('email', 128);
            $table->text('alamat');
            $table->string('asal_instansi', 128);
            $table->foreignId('employees_id') ->constrained('employees')->cascadeOnDelete();
            $table->longText('keperluan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
