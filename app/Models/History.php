<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    protected $primaryKey = 'no_transaksi';
    protected $fillable = ['no_transaksi', 'nama_menu', 'nama_kasir', 'total_harga', 'total_bayar', 'uang_kembali'];
}
