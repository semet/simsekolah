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
        Schema::create('rapots', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tahun_id')
                ->references('id')
                ->on('tahuns')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('semester_id')
                ->references('id')
                ->on('semesters')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('guru_id')
                ->references('id')
                ->on('gurus')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('mapel_id')
                ->references('id')
                ->on('mapels')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('kelas_id')
                ->references('id')
                ->on('kelas')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('siswa_id')
                ->references('id')
                ->on('siswas')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('nilai');
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
        Schema::dropIfExists('rapots');
    }
};
