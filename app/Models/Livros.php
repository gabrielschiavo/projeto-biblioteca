<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livros extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $fillable = ['codigoGenero', 'codigoLivro', 'titulo', 'descricao', 'imgCapa'];

    public $timestamps = false;
}
