@extends('modules.backend.layouts.app')

@section('htmlheader_title')
    Home
@endsection



@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">后台首页</div>

                    <div class="panel-body">
                        欢迎您登陆题库后台！
                        {{ BackendAuth::user()->userinfo }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
