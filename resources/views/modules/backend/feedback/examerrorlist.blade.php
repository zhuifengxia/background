@extends('modules.backend.layouts.app')

@section('htmlheader_title')
    Home
@endsection

@section('contentheader_title')
纠错列表
@endsection
@section('main-content')
   <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col"
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                    <caption>悬停表格布局</caption>
                    <thead>
                    <tr>
                        <th>名称</th>
                        <th>城市</th>
                        <th>密码</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tanmay</td>
                        <td>Bangalore</td>
                        <td>560001</td>
                    </tr>
                    <tr>
                        <td>Sachin</td>
                        <td>Mumbai</td>
                        <td>400003</td>
                    </tr>
                    <tr>
                        <td>Uma</td>
                        <td>Pune</td>
                        <td>411027</td>
                    </tr>
                    </tbody>
                </table>
                    </div>

                </div>
            </div>
        </div>
   </div>

@endsection