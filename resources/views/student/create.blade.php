@extends('common.layout')

@section('title', '新增数据页面')

@section('content')
    @include('common.message')
    <!-- 所有的错误提示 -->
    <div class="alert alert-danger">
        <ul>
            <li>姓名不能为空</li>
            <li>年龄只能为整数</li>
            <li>请选择性别</li>
        </ul>
    </div>

    <!-- 自定义内容区域 -->
    <div class="panel panel-default">
        <div class="panel-heading">新增学生</div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">姓名</label>

                    <div class="col-sm-5">
                        <input type="text" name="student[name]" class="form-control" id="name" placeholder="请输入学生姓名">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">姓名不能为空</p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="age" class="col-sm-2 control-label">年龄</label>

                    <div class="col-sm-5">
                        <input type="text" name="student[age]" class="form-control" id="age" placeholder="请输入学生年龄">
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">年龄只能为整数</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">性别</label>

                    <div class="col-sm-5">
                        <label class="radio-inline">
                            <input type="radio" name="student[sex]" value="0"> 未知
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="student[sex]" value="1"> 男
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="student[sex]" value="2"> 女
                        </label>
                    </div>
                    <div class="col-sm-5">
                        <p class="form-control-static text-danger">请选择性别</p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop