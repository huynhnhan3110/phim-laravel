<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Country;
use App\Models\Movie;
use DB;
class IndexController extends Controller
{
    public function login() {
        return view('home');
    }
     public function homeAdmin()
    {
        return view('home');
    }
    public function home()
    {
        $phimhot = Movie::where('phimhot', 1)->where('status', 1)->get();
        $category = Category::orderBy('sort','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('sort','ASC')->where('status',1)->get();
        $country = Country::orderBy('sort','ASC')->where('status',1)->get();
        $category_home = Category::with('movie')->orderBy('sort','ASC')->where('status',1)->get();
        return view('pages.home', compact('category','genre','country','category_home','phimhot'));
    }
    public function category($slug)
    {
        $phimhot = Movie::where('phimhot', 1)->where('status', 1)->get();

        $category = Category::orderBy('sort','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('sort','ASC')->where('status',1)->get();
        $country = Country::orderBy('sort','ASC')->where('status',1)->get();
        $slug_category = Category::where('slug',$slug)->first();

        $category_movies = Movie::where('category_id',$slug_category->id)->paginate(40);
        return view('pages.category',compact('category','genre','country','slug_category','category_movies','phimhot'));
    }
    public function genre($slug)
    {
        $phimhot = Movie::where('phimhot', 1)->where('status', 1)->get();

        $category = Category::orderBy('sort','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('sort','ASC')->where('status',1)->get();
        $country = Country::orderBy('sort','ASC')->where('status',1)->get();
        $slug_genre = Genre::where('slug',$slug)->first();

        $genre_movies = Movie::where('genre_id',$slug_genre->id)->paginate(40);
        return view('pages.genre',compact('category','genre','country','slug_genre','phimhot','genre_movies'));
    }
    public function country($slug)
    {
        $phimhot = Movie::where('phimhot', 1)->where('status', 1)->get();
        $category = Category::orderBy('sort','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('sort','ASC')->where('status',1)->get();
        $country = Country::orderBy('sort','ASC')->where('status',1)->get();
        $slug_country = Country::where('slug',$slug)->first();
        
        $country_movies = Movie::where('country_id',$slug_country->id)->paginate(40);
        return view('pages.country',compact('category','genre','country','slug_country','phimhot','country_movies'));
    }
    public function movie($slug)
    {
        $category = Category::orderBy('sort','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('sort','ASC')->where('status',1)->get();
        $country = Country::orderBy('sort','ASC')->where('status',1)->get();

        $movie = Movie::with('category','genre','country','thuocnhieutheloai')->where('slug',$slug)->where('status',1)->first();

        $movie_related = Movie::with('category','genre')->where('category_id',$movie->category_id)->where('genre_id',$movie->genre_id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        return view('pages.movie',compact('category','genre','country','movie','movie_related'));
    }
    public function watch()
    {
        return view('pages.watch');
    }
     public function episode()
    {
        return view('pages.episode');
    }
}
