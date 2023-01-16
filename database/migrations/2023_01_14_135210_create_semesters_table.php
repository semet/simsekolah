<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesters', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tahun_id')
                ->references('id')
                ->on('tahuns')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->enum('nama', ['Ganjil', 'Genap']);
            $table->timestamp('awal');
            $table->timestamp('akhir');
            $table->boolean('aktif')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semesters');
    }
};
