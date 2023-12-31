<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.login');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth(Request $request)
    {
        $email =  $request->post('email');
        $password =  $request->post('password');

         $result = Admin::where(['email'=>$email,'password'=>$password])->get();
        //     echo "<pre>";
        //  print_r($result);
        if(isset($result['0']->id)) {
            $request -> session() -> put('ADMIN_LOGIN',true);
            $request -> session() -> put('ADMIN_ID',$result['0']->id);

            return redirect('admin/dashboard');

         } else {
            $request -> session() -> flash('error','some thing wronmg');
            return redirect('admin');
        }
    }


    public function dashboard()
    {
        //
        return view('admin.dashboard');
    }

}
