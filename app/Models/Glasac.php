<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glasac extends Model
{
    use HasFactory;
    protected $table = 'glasac';
    protected $fillable = [
        'ime_prezime',
        'email',
        'jmbg',
        'adresa',
        'poverenistvo',
    ];
}
