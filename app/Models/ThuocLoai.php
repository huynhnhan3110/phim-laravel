<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class ThuocLoai extends Model
{
	use HasFactory;
    protected $fillable = [
        'genre_id','movie_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'thuocloai';
    public function thuocphim(){
        return $this->belongsTo(Movie::class);
    }
}
