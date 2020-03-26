<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;
use App\Brand2;
use Validator;
// use App\Http\Requests\StoreBrandPost;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $res = DB::table('brand')->get();
        // $res= Brand::all();
        $brand_name = request()->brand_name;
        $brand_url = request()->brand_url;
        $where = [];
        if($brand_name){
            $where [] = ['brand_name','like',"%$brand_name%"];
        }
        if($brand_url){
            $where [] = ['brand_url','like',"%$brand_url%"];
        }
        $res = Brand::orderby('brand_id','desc')->where($where)->paginate(2);
        $input = request()->all();
        return view('brand.index',['res'=>$res,'input'=>$input]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = Brand2::get();
        //  dd($res);
        return view('brand.create',['res'=>$res]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store(StoreBrandPost $request)
    {
        // $validatedData = $request->validate([ 
        //     'brand_name' => 'required|unique:brand|max:20',
        //      'brand_url' => 'required',
        // ],[
        //      'brand_name.required' => '名字必填!',
            // 'brand_name.unique' => '名字已有!',
            // 'brand_url.max' => '名字小于等于20位!',
            // 'brand_url.required' => '网址必填!'
        // ]);
        $data = $request->except('_token');
        // dd($data);
        $validator = Validator::make($data,[
            'brand_name' => 'required|unique:brand|max:20',
            'brand_url' =>'required',
               ],[
                     'brand_name.required' => '名字必填!',
                    'brand_name.unique' => '名字已有!',
                    'brand_url.max' => '名字小于等于20位!',
                    'brand_url.required' => '网址必填!'
                ]);
               
               if ($validator->fails()){ 
                   return redirect('brand/create') 
                   ->withErrors($validator) 
                   ->withInput();
                }    
       
        if($request->hasFile('brand_logo')){
           $data['brand_logo'] = $this->upload('brand_logo');
       }
         
        // $res = DB::table('brand')->insert($data);
        $res = Brand::create($data);
        // $res = Brand::insert($data);
        if( $res ){
            return redirect('/brand/index');
        }
    }
    //文件上传
    // public function upload($img){
    //     //判断上传过程中有无错误
    //    if(request()->file($img)->isValid()){
    //         $file = request()->$img;
    //         $info = $file->store('upload');
    //         return $info;
    //    }
    //     // exit('未获取到上传文件或上传过程出错');
    // }


    public function upload($img){
        if(request()->file($img)->isValid()){
            $file = request()->file($img);
            $info = $file->store('upload');
            return $info;
        }
        exit('未获取到上传文件或上传过程出错');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $res = DB::table('brand')->where('brand_id',$id)->first();
        $res2 = Brand2::get();
        $res = Brand::find($id);
        return view('brand/edit',['res'=>$res,'res2'=>$res2]);
        // dd($res);
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
        $data = $request->except('_token');
        // dd($data);
        if($request->hasFile('brand_logo')){
            $data['brand_logo'] = $this->upload('brand_logo');
            
        }
        // $res = DB::table('brand')->where('brand_id',$id)->update($data);
        $res = Brand::where('brand_id',$id)->update($data);
        if($res!==false){
            return redirect('/brand/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $res = DB::table('brand')->where('brand_id',$id)->delete();
        // $res = Brand::destroy($id);
        $res = Brand::where('brand_id',$id)->delete();
        if($res){
            return redirect('/brand/index');
        }
    }
}
