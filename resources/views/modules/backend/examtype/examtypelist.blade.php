@extends('modules.backend.layouts.app')

@section('htmlheader_title')
    医考天地分类表
@endsection

@section('contentheader_title')
    医考天地分类表
@endsection

@section('contentheader_description')

@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-md-offset-5 ">
                            @if(session('status'))
                                <h4 style="color:red">  {{ session('status') }}</h4>
                            @endif
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-hover dataTable" >
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>分类名称</th>
                                            <th>序号</th>
                                            <th>是否显示</th>
                                            <th>上级分类</th>
                                            <th>LOGO</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $examtypelsts as $lists )
                                            <tr>
                                                <td> {{ $lists->id }}</td>
                                                <td> {{ $lists->banktypename }}</td>
                                                <td>{{ $lists->banknum }}</td>
                                                <td>{{ $lists->isdevelop }}</td>
                                                <td>{{ $lists->bankfid }}</td>
                                                <td><img src="{{ $lists->logo }}" width="20px" height="20px"/></td>
                                                <td>
                                                    <a href="{{route("addexamtype",$lists->id)}}">编辑</a> |
                                                    <a href="{{route("delexamtype",$lists->id)}}">删除</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9 ">
                                    {!!$examtypelsts->render()!!}
                                </div>
                                <div class="col-md-3 ">
                                    <a href="{{route("addexamtype")}}" class="btn btn-primary">添加分类</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
