@extends('common.layout')

@section('title', 'Page Title')

@section('content')
    @include('common.message')
    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">学生列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th>ID</th>
                <th>头像</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>性别</th>
                <th>添加时间</th>
                <th width="120">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($student as $val)
                <tr>
                    <th scope="row">{{$val['id']}}</th>
                    <td><img width="25px" height="25px"
                             src="{{ $val['img']?'/uploads/'.$val['img']:'/uploads/logo.jpg'}}" alt="" class="img-circle"></td>
                    <td>{{$val['name']}}</td>
                    <td>{{$val['age']}}</td>
                    <td>{{$val->returnSex($val['sex'])}}</td>
                    <td>{{ date('Y-m-d H:i:s', $val['created_at'])}}</td>
                    <td>
                        <a href="{{ url('student/detail', ['id'=>$val['id']]) }}">详情</a>
                        <a href="{{ url('student/edit', ['id'=>$val['id']]) }}">修改</a>
                        <a onclick="if (confirm('确定要删除吗？') == false) return false;"
                           href="{{ url('student/del', ['id'=>$val['id']]) }}">删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- 分页  -->
    <div>
    <div class="pull-right">
        {{ $student->links() }}
    </div>
    </div>
@stop