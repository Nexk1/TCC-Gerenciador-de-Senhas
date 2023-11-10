<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenhaUser extends Model
{
    use HasFactory;
    protected $table = 'senhasusers'; // Defina o nome correto da tabela
    protected $fillable = [
        'local',
        'senha',
        'page_id',
    ];
}
