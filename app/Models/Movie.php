<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
class Movie extends Model
{
	public $timestamps = false;
    use HasFactory;
    public function category() {
    	return $this->belongsTo(Category::class);
    }
    public function genre(){
    	return $this->belongsTo(Genre::class);
    }
    public function country(){
    	return $this->belongsTo(Country::class);
    }
    public function thuocnhieutheloai() {
        return $this->belongsToMany(Genre::class, 'thuocloai','movie_id','genre_id');
    }
}
