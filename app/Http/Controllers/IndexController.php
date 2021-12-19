<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Country;
use App\Models\Movie;
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

        $category_movie = Category::with('movie')->where('slug',$slug)->where('status',1)->get();
        $slug_category = Category::where('slug',$slug)->first();
        return view('pages.category',compact('category','genre','country','slug_category','category_movie','phimhot'));
    }
    public function genre($slug)
    {
        $phimhot = Movie::where('phimhot', 1)->where('status', 1)->get();

        $category = Category::orderBy('sort','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('sort','ASC')->where('status',1)->get();
        $country = Country::orderBy('sort','ASC')->where('status',1)->get();
        $slug_genre = Genre::where('slug',$slug)->first();

        return view('pages.genre',compact('category','genre','country','slug_genre','phimhot'));
    }
    public function country($slug)
    {
        $phimhot = Movie::where('phimhot', 1)->where('status', 1)->get();
        $category = Category::orderBy('sort','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('sort','ASC')->where('status',1)->get();
        $country = Country::orderBy('sort','ASC')->where('status',1)->get();
        $slug_country = Country::where('slug',$slug)->first();

        return view('pages.country',compact('category','genre','country','slug_country','phimhot'));
    }
    public function movie()
    {
        return view('pages.movie');
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
