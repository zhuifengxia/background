@extends('modules.backend.layouts.app')

@section('htmlheader_title')
    {{count($examtype->id)>0?'编辑':'添加'}}分类信息
@endsection
@section('contentheader_title')
    <div class="col-md-offset-3"> {{count($examtype->id)>0?'编辑':'添加'}}分类信息</div>
@endsection

@section('contentheader_description')

@endsection

@section('main-content')
    <div class="container spark-screen col-md-offset-2">
        <div class="col-md-6">
            <div class="row">
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
            </div>
                <div class="row">
                <form action="{{route("saveexamtype")}}" method="post">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="banktypename">分类名称</label>
                            <input type="text" name="banktypename" value="{{$examtype->banktypename}}" class="form-control" placeholder="请输入分类名称">
                        </div>
                        <div class="form-group">
                            <label for="banknum">序号</label>
                            <input type="text" name="banknum" value="{{$examtype->banknum}}" class="form-control"  placeholder="请输入序号">
                        </div>
                        <div class="form-group">
                            <label for="isdevelop">是否显示</label>
                            <input type="text" name="isdevelop" value="{{$examtype->isdevelop}}"  class="form-control" placeholder="是/否">
                        </div>
                        <div class="form-group">
                            <label for="bankfid">上级分类</label>
                            <input type="text" name="bankfid" value="{{$examtype->bankfid}}" class="form-control" placeholder="上级分类">
                        </div>
                        <div class="form-group">
                            <label for="logo">LOGO</label>
                            <input type="text" name="logo" value="{{$examtype->logo}}" class="form-control" placeholder="上传logo图片">
                        </div>
                        <div class="form-group col-md-offset-5">
                            <button type="submit" class="btn btn-primary">确认保存</button>
                        </div>
                    </div>
                </form>
                </div>

        </div>
    </div>
@endsection