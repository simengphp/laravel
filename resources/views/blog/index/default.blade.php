@extends('blog.index.index')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">CMS管理系统Version{{$version}}</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <p class="text-aqua">后台框架：Laravel5.6</p>
                    <p class="text-aqua">PHP版本：v7.0+</p>
                    <p class="text-aqua">Mysql版本：v5.7</p>
                    <p class="text-aqua">服务器环境：Linux</p>
                    <p class="text-aqua">图片存储地址：/public/uploads/</p>
                    <p class="text-aqua">后台路由文件：manager.php</p>
                    <p class="text-aqua">开发团队：刘柱</p>
                    <p class="text-aqua"><a href="http://www.zanpu.com" class="text-aqua" target="_blank">官网地址：www.zanpu.com</a></p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop