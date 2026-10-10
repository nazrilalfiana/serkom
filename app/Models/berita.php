<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'tanggal',
        'gambar',
        'status',
        'id_user'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
