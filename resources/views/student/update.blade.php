@extends('common.layout')

@section('title', '修改数据页面')

@section('content')
    @include('common.message')
    <!-- 所有的错误提示 -->
    @include('common.validate')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">修改学生</div>
        <div class="panel-body">
            @include('common._formCommon')
        </div>
    </div>
@stop