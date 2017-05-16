@extends('modules.backend.layouts.app')

@section('htmlheader_title')
   添加管理用户
@endsection

@section('contentheader_title')
    添加管理用户
@endsection

@section('contentheader_description')
    添加管理用户
@endsection

@section('main-content')
    <div class="container spark-screen">

        <div class="col-md-6">
            <div class="">

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>喔 NO!</strong> 您输入的信息，有以下几个问题.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                            <!-- /.box-header -->
                    <!-- form start -->
                    <form action="{{route('usercreate',$user->id)}}" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="username">用户名</label>
                                <input type="text" name="username" value="{{$user->username}}" class="form-control" placeholder="请输入用户名">
                            </div>
                            <div class="form-group">
                                <label for="userinfo">用户姓名</label>
                                <input type="text" name="userinfo" value="{{$user->userinfo}}" class="form-control" placeholder="请输入用户姓名">
                            </div>
                            <div class="form-group">
                                <label for="password">用户密码</label>
                                <input type="password" name="password" value="{{$user->password}}" class="form-control" placeholder="请输入用户密码">
                            </div>
                            <div class="form-group">
                                <label for="userlarvel">用户权限</label>
                                <input type="text" name="userlarvel" value="{{$user->userlarvel}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">确认保存</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection
