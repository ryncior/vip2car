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
        Schema::create('encuestas', function (Blueprint $table) {
            $table->id(); // Esto crea un campo 'id' auto-incremental como primary key
            $table->text('Placa');
            $table->text('Marca');  
            $table->date('fecha_fab');
            $table->text('Nombre');
            $table->text('Apellido');
            $table->integer('dni');
            $table->text('mail');
            $table->text('telefono');
            $table->timestamps(); // Opcional: agrega campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuestas');
    }
};
