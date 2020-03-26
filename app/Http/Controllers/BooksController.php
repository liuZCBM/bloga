<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Http\Requests\StoreBooksPost;
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $books_name = request()->books_name;
        $where = [];
        if($books_name){
            $where [] = ['books_name','like',"%$books_name%"];
        }
        $res = Books::where($where)->paginate(2);
        $quest = request()->all();
        return view('books.index',['res'=>$res,'quest'=>$quest]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBooksPost $request)
    {
        $data = request()->except('_token');
        if($request->hasFile('books_logo')){
            $data['books_logo'] = $this->upload('books_logo');
        }
        $res = Books::insert($data);
       if($res){
           return redirect('books/index');
       }
    }

    public function upload($img){
        $file = request()->$img;
        if($file->isValid()){
            $info = $file->store('upload');
            return $info;
        }
       
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
