<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Category;
use App\Models\Genre;
use App\Models\ThuocLoai;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $movies = Movie::with('category','genre','country','thuocnhieutheloai')->orderBy('id','DESC')->get();
         return view('admincp.movie.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $country = Country::pluck('title','id');
       return view('admincp.movie.form',compact('category','genre','country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      
      $movie = new Movie();
      $movie->title = $data['title'];
      $movie->title_eng = $data['title_eng'];
      $movie->slug = $data['slug'];
      $movie->description = $data['description'];
      $movie->status = $data['status'];
      $movie->phimhot = $data['phimhot'];
      $movie->category_id = $data['category_id'];
      
        foreach($data['gen'] as $key => $genDetail){
            $movie->genre_id = $genDetail[0];
      }
      
      
      $movie->country_id = $data['country_id'];
      $get_image = $request->file('image');
      $path = 'uploads/movie/';

      if($get_image) {
        $get_name_image = $get_image->getClientOriginalName(); // hinhanh1.jpg
        $file_name = current(explode('.',$get_name_image)); //hinhanh1
        $file_name_created = $file_name.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); // hinhanh19999.jpg
        $get_image->move($path,$file_name_created);
        $movie->image = $file_name_created;
      }

      $movie->save();
      $movie->thuocnhieutheloai()->attach($data['gen']);
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $movie = Movie::find($id);
      $category = Category::pluck('title','id');
      $genre = Genre::pluck('title','id');
      $thuocloai = ThuocLoai::where('movie_id',$id)->pluck('genre_id')->toArray();
      $country = Country::pluck('title','id');
      return view('admincp.movie.form',compact('movie','category','genre','country','thuocloai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $data = $request->all();
      $movie = Movie::find($id);
      $movie->title = $data['title'];
      $movie->title_eng = $data['title_eng'];
      $movie->slug = $data['slug'];
      $movie->description = $data['description'];
      $movie->status = $data['status'];
      $movie->phimhot = $data['phimhot'];
      $movie->category_id = $data['category_id'];
      foreach($data['gen'] as $key => $genDetail){
        $movie->genre_id = $genDetail[0];
      }
      $movie->country_id = $data['country_id'];

      $get_image = $request->file('image');
      $path = 'uploads/movie/';

      if($get_image) {
        if(!empty($movie)) {
          unlink('uploads/movie/'.$movie->image);
        }
        $get_name_image = $get_image->getClientOriginalName(); // hinhanh1.jpg
        $file_name = current(explode('.',$get_name_image)); //hinhanh1
        $file_name_created = $file_name.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); // hinhanh19999.jpg
        $get_image->move($path,$file_name_created);
        $movie->image = $file_name_created;
      }

      $movie->save();
      $movie->thuocnhieutheloai()->sync($data['gen']);
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id); // Movie::find($id)->delete();
        if(!empty($movie)){
            unlink('uploads/movie/'.$movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}
