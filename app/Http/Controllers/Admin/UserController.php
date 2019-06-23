<?php

namespace App\Http\Controllers\Admin;
use Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
class UserController extends Controller
{
    public function index(Request $request)
    {
        $kw = $request->get('sousuo');
        $data = User::when($kw,function($query) use ($kw){
                $query->where('username','like',"%{$kw}%");
        })->paginate(2);



//        $data=User::get();
        return view('admin.user.index',compact('data'));
    }
    public function create(){
        return view('admin.user.create');
    }
    public function store(Request $request){
      $post=$this->validate($request,[
          'truename' => 'required',
          'username' => 'required',
          'password' => 'required',
          'email' => 'nullable|email',
      ]);
      $ret=User::insert($post);
        Mail::raw('开通账号成功，请速联系管理员',function($message){
            $message->to('1246360293@qq.com');
            $message->subject('开通账号提示');
        });
          return redirect(route('admin.user.index'))->with('success','添加用户成功');

    }

    public function del(int $id){
            $ret=User::find($id)->forceDelete();
        if($ret){
            return ['status'=>0,'msg'=>'删除成功'];
        }
    }

    public function update(int $id)
    {
        $data=User::where('id',$id)->first();
        return view('admin.user.edit',compact('data'));
    }

    public function edit(Request $request,int $id){
        $put=$this->validate($request,[
            'truename' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required'
        ]);
        $ret = User::where('id',$id)->update($put);
        if($ret){
            return redirect(route('admin.user.index'));
        }
    }

    public function deldel(Request $request){
        $id=$request->get('id');

        $ret=User::where('id',$id)->delete();
        if($ret){
            return ['status'=>0,'msg'=>'删除成功'];
        }
    }
}
