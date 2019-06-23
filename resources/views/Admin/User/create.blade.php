<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="container">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('admin.user.create')}}" method="post">
        @csrf
        <div class="form-group">
            <label>真实姓名</label>
            <input type="text" class="form-control" name="truename" value="{{old('truename')}}">
        </div>
        <div class="form-group">
            <label>用户名</label>
            <input type="text" class="form-control" name="username" value="{{old('username')}}">
        </div>
        <div class="form-group">
            <label>密码</label>
            <input type="text" class="form-control" name="password" value="{{old('password')}}">
        </div>
        <div class="form-group">
            <label>邮箱</label>
            <input type="text" class="form-control" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
            <label>电话</label>
            <input type="text" class="form-control" name="phone" value="{{old('phone')}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">添加用户</button>
        </div>
    </form>
</div>
</body>
</html>

</body>
</html>