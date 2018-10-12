@extends('manager.index.index')
@section('content')
    <div class="row">
        @include('manager.common.ajaxErrorSuccess')
        @include('manager.common.message')
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-xs-1">
                        <a href="/article/curdArticle">
                            <button type="button" class="btn btn-primary">添加</button>
                        </a>
                    </div>
                    <div class="col-xs-8">
                        <form action="" class="" method="post">
                            {{csrf_field()}}
                            <div class="col-xs-4">
                                <input class="form-control" id="inputEmail3" name="search" value="{{$request['search']}}"
                                       placeholder="文章标题" type="text">
                            </div>
                            <div class="col-xs-5">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="text" name="search_date" value="{{$request['search_date']}}"
                                           placeholder="选择时间" class="form-control pull-right"
                                           id="reservationtime">
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-primary">查询</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>编号</th>
                            <th>文章标题</th>
                            <th>浏览量</th>
                            <th>排序</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $val)
                            <tr>
                                <td>{{$val->id}}</td>
                                <td>{{$val->title}}</td>
                                <td><input type="text" class="form-control" style="width:100px"
                                           onchange="ajaxData('/common/ajaxEditField',{'_token':
                                                   '{{csrf_token()}}','table':'article','field':'look',
                                                   'value':this.value,'id':{{$val->id}}})"
                                           value="{{$val->look}}"></td></td>
                                <td><input type="text" class="form-control" style="width:100px"
                                           onchange="ajaxData('/common/ajaxEditField',{'_token':
                                                   '{{csrf_token()}}','table':'article','field':'sort',
                                                   'value':this.value,'id':{{$val->id}}})" value="{{$val->sort}}"></td>
                                <td>{{$val->created_at}}</td>
                                <td>{{$val->updated_at}}</td>
                                <td>
                                    <a href="/article/curdArticle?id={{$val->id}}" title="修改" style="color: #0a0a0a">
                                        <i class="fa  fa-edit"></i>
                                    </a>
                                    <a href="/article/remove?id={{$val->id}}&status=9" title="删除" style="color: #0a0a0a">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pull-right">
                        {{$list->links()}}
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop