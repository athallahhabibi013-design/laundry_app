<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanPembersih extends Model
{
    use HasFactory;

    protected $table = 'bahan_pembersih';
    protected $fillable = [
        'nama_bahan', 
        'kategori', 
        'merek', 
        'stok', 
        'satuan', 
        'nama_supplier'
    ];
}