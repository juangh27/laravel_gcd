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
        Schema::create('woo_products', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 50);
            $table->string('sku', 50);
            $table->string('nombre', 50);
            $table->boolean('destacado')->default(false);
            $table->string('visibilidad', 50)->nullable();
            $table->string('descripcion_corta', 512)->nullable();
            $table->string('descripcion', 4096)->nullable();
            $table->string('inicio_rebaja', 50)->nullable();
            $table->string('fin_rebaja', 50)->nullable();
            $table->boolean('existencia')->default(true);
            $table->integer('stock')->nullable();
            $table->integer('bajo_inventario')->nullable();
            $table->double('peso', 8, 2)->nullable();
            $table->string('longitud', 50)->nullable();
            $table->string('anchura', 50)->nullable();
            $table->string('altura', 50)->nullable();
            $table->string('ventas_dirigidas', 50)->nullable();
            $table->string('ventas_cruzadas', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('woo_products');
    }
};
