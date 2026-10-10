<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table = 'gurus';
     protected $fillable = [
        'nama_guru',
        'nip',
        'mapel',
        'foto'
     ];
}
