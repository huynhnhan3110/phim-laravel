<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
       $genres = Genre::orderBy('sort','ASC')->get();
       return view('admincp.genre.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admincp.genre.form');
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

        $genre = new Genre();
        $genre->title = $data['title'];
        $genre->description = $data['description'];
        $genre->slug = $data['slug'];
        $genre->status = $data['status'];
        $genre->tagColor = $data['tagColor'];

        $genre->save();

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
        $genre = Genre::find($id);
       return view('admincp.genre.form',compact('genre'));
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

        $genre = Genre::find($id);
        $genre->title = $data['title'];
        $genre->description = $data['description'];
        $genre->slug = $data['slug'];
        $genre->status = $data['status'];
        $genre->tagColor = $data['tagColor'];

        $genre->save();

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
        Genre::find($id)->delete();
        return redirect()->back();
    }

    public function resorting(Request $request) {
        $data = $request->all();
        foreach($data['arr_id'] as $key => $id) {
            $genre = Genre::find($id);
            $genre->sort = $key;
            $genre->save();
        }

    }
}
