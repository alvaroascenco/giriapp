<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giria extends Model
{
    protected $table = 'girias';

    protected $fillable = [
        'nome', 'local', 'significados', 'etimologia', 'imagem', 'videoId'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
