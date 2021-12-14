<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Country;
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
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();

        return view('pages.home', compact('category','genre','country'));
    }
    public function category($slug)
    {
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();

        $slug_category = Category::where('slug',$slug)->first();
        return view('pages.category',compact('category','genre','country','slug_category'));
    }
    public function genre($slug)
    {
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $slug_genre = Genre::where('slug',$slug)->first();

        return view('pages.genre',compact('category','genre','country','slug_genre'));
    }
    public function country($slug)
    {
        $category = Category::orderBy('id','DESC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1)->get();
        $country = Country::orderBy('id','DESC')->where('status',1)->get();
        $slug_country = Country::where('slug',$slug)->first();

        return view('pages.country',compact('category','genre','country','slug_country'));
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
