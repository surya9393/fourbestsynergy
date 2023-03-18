<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapgaji extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_nip',
        'gaji'
    ];
}