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
                    <td>{{$val['name']}}</td>
                    <td>{{$val['age']}}</td>
                    <td>{{$val['sex']?'男':'女'}}</td>
                    <td>{{ date('Y-m-d', $val['created_at'])}}</td>
                    <td>
                        <a href="">详情</a>
                        <a href="">修改</a>
                        <a href="">删除</a>
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