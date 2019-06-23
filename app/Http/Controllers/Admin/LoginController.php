<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class LoginController extends Controller
{
    public function index(){
        return view('admin.login.index');

    }
    public function login(Request $request){
        $post=$this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);
        $ret=User::where('username',$post['username'])->first();
//        dump($ret);
        if(!$ret){
            return redirect()->back()->with('error','账号密码有错误');
        }
        if($ret->password != $post['password']){
            return  redirect()->back()->with('error','账号密码有错误');
        }
        session(['admin.user'=>$ret]);

        return redirect(route('admin.user.index'));
    }
}
