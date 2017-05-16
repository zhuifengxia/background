@extends('modules.backend.layouts.app')

@section('htmlheader_title')
    管理用户
@endsection

@section('contentheader_title')
    管理用户
@endsection

@section('contentheader_description')
    用户管理
@endsection

@section('main-content')
    <div class="container spark-screen">

        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        {{--<h3 class="box-title">Hover Data Table</h3>--}}
                        <div class="col-xs-2"><a href="{{ backendUrl('/users/create') }}" class="btn btn-block btn-info oc-icon-plus">添管理员</a></div>
                        <div class="box-tools pull-right">

                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">序号</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">用户名</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">用户姓名</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">权限</th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $users as $user )
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"> {{ $user->id }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->userinfo }}</td>
                                                <td>超级管理员</td>
                                                <td><a href="{{ backendUrl('/users/create/:id', ['id' => $user->id]) }}">编辑</a> | 删除 </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">共有{{$users->total()}}条数据</div>
                                </div>
                                <div class="col-sm-7">
                                    {!! $users->render() !!}
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div><!-- /.col -->
        </div>
    </div>
@endsection
