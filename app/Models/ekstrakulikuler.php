<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ekstrakulikuler extends Model
{
    use HasFactory;

    protected $table = 'ekstrakulikulers';

    protected $fillable = [
        'nama_eskul',
        'pembina',
        'jadwal_latihan',
        'deskripsi',
        'gambar',
    ];
}
