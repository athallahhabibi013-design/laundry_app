<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahanPembersihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up(): void
{
    Schema::create('bahan_pembersih', function (Blueprint $table) {
        $table->id();
        $table->string('nama_bahan');
        $table->string('kategori');
        $table->string('merek');
        $table->integer('stok');
        $table->string('satuan');
        $table->string('nama_supplier');
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
        Schema::dropIfExists('bahan_pembersihs');
    }
}
