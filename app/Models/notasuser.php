<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notasuser extends Model
{
    use HasFactory;
    protected $table = 'notasusers'; // Defina o nome correto da tabela
    protected $fillable = [
        'titulo',
        'texto',
        'page_id',
    ];
}
