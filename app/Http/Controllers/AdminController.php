<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = Admin::all();
        return view('admin.index',['res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'admin_name' => 'required|regex:/^[\x{4e00}-\x{9fa5}\w]{2,16}$/u|unique:admin',
            'admin_tel' => 'required|regex:/^\d{11}$/',
            'admin_email' => 'required',
            'admin_pwd' => 'required|regex:/^\w{6}$/',
        ],[
            'admin_name.regex' =>'由中文、字母、数字、下划线、破折号2-16位 且唯一',
            'admin_name.unique' =>'名字已有',
            'admin_name.required' =>'名字必填',
            'admin_tel.regex' =>'电话号由11位组成',
            'admin_tel.required' =>'电话必填',
            'admin_email.required' =>'邮箱必填',
            'admin_pwd.required' =>'密码必填',
            'admin_pwd.regex' =>'密码6位',
        ]);
        $data = request()->except('_token');
        if($request->hasFile('admin_logo')){
            $data['admin_logo'] = upload('admin_logo');
        }
        $res = Admin::insert($data);
        if($res){
            return redirect('admin/index');
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
        $res = Admin::find($id);
        return view('admin.edit',['res'=>$res]);
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
        $data = request()->except('_token');
        if($request->hasFile('admin_logo')){
            $data['admin_logo'] = upload('admin_logo');
        }
        $res = Admin::where('admin_id',$id)->update($data);
        if($res!==false){
            return redirect('admin/index');
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
        $res = Admin::where('admin_id',$id)->delete();
        if($res){
            return redirect('admin/index');
        }
    }
}
