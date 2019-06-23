<!doctype html>
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
    <form action="{{route('admin.user.index')}}" method="get">
        <input type="text" id="sousuo" class="sousuo" name="sousuo">
        <button type="submit" class="btn btn-success">搜索</button>
    </form>
    <div class="text-left">
        <a href="{{route('admin.user.create')}}" class="btn btn-success">添加用户</a>
    </div>

    <div class="text-left">
        <a href="javascript:void(0);" class="btn btn-success" id="deldel">全部删除</a>
    </div>
    <br>
    <table class="table table-dark">
        <thead>
        <tr>
            <th>#</th>
            <th scope="col">ID</th>
            <th scope="col">真实姓名</th>
            <th scope="col">用户名</th>
            <th scope="col">邮箱</th>
            <th scope="col">手机号</th>
            <th scope="col">创建时间</th>
            <th scope="col">操作</th>
        </tr>
        </thead>
        <tbody>
        @forelse($data as $item)
            <tr>
                <td>
                    <input type="checkbox" name="aaa" id="aaa" value="{{$item->id}}">
                </td>
                <th>{{$item->id}}</th>
                <td>{{$item->truename}}</td>
                <td>{{$item->username}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->createtime}}</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{route('admin.user.update',['id'=>$item->id])}}">修改</a>
                    <a class="btn btn-danger btn-sm del" href="{{route('admin.user.del',['id'=>$item->id])}}">删除</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">暂无数据</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{$data->appends(request()->except(['page']))->links()}}
</div>
<script src="/js/app.js"></script>
<script>
    $('.del').click(function () {
        let url = $(this).attr('href');
        if (confirm('您真的要删除？')) {
            $.ajax({
                url,
                data: {
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                type: 'DELETE'
            }).then(ret => {
                alert(ret.msg);
                location.href='{{route('admin.user.index')}}';
            })
        }
        return false;
    });
    var array=[];
    $('#deldel').click(function(){
        $("input[name='aaa']:checked").each(function(){
            array.push($(this).val());
        });
        // console.log(array);
        if(array.length>0){
            // console.log(111);
            if(confirm('确认删除？')){
                $.ajax({
                    url: '{{route('admin.user.deldel')}}',
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        _token: '{{csrf_token()}}',
                        id: array,
                    }
                }).then(red => {
                    alert(red.msg);
                    location.href='{{route('admin.user.index')}}';
                })

            }

        }
    })

</script>
</body>
</html>