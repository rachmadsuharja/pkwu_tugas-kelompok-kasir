<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['nama_menu', 'id_kategori', 'harga', 'status'];

    public function kategori() {
        return $this->belongsTo(Category::class, 'id_kategori');
    }
}
