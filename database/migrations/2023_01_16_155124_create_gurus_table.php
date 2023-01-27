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
        Schema::create('gurus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('departemen_id')
                ->references('id')
                ->on('departemens')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('tingkat_id')
                ->references('id')
                ->on('tingkats')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('mapel_id')
                ->references('id')
                ->on('mapels')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('nip');
            $table->string('nuptk');
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('otp_verified_at')->nullable();
            $table->string('telepon')->unique();
            $table->string('password');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('foto')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->timestamp('tanggal_lahir')->nullable();
            $table->boolean('aktif')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('gurus');
    }
};
