@extends('layouts.admin');

@section('title','用户登录');

@section('cnt')

        <form method="post" action="{{route('admin.login')}}">
            @csrf
            <div class="form-group">
                <label>账号</label>
                <input type="text" class="form-control"  placeholder="请输入账号" name="username">
            </div>
            <div class="form-group">
                <label >密码</label>
                <input type="text" class="form-control"  placeholder="请输入密码" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>



@endsection