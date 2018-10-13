@extends('manager.index.index')
@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">表单信息填写</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- 错误信息 -->
                    <div class="row">
                        <label for="name" class="col-sm-2 control-label"></label>
                        <div class="col-sm-6">
                            @include('manager.common.editError')
                        </div>
                    </div>
                    <!-- form start -->
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ old('id')??$ret['id'] }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                                <label for="class_name" class="col-sm-2 control-label">
                                    分类名称<i style="color: red">*</i>
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="class_name" name="class_name"
                                           value="{{old('class_name')??$ret['class_name']}}" placeholder="分类名称" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="is_nav" class="col-sm-2 control-label">
                                    是否是导航栏
                                </label>
                                <div class="col-sm-6 checkbox-inline">
                                    @foreach($class_obj->returnNav() as $ind=>$val)
                                        <input type="radio" name="is_nav"
                                               {{ old('is_nav') == $ind || isset($ret['is_nav']) && $ind == $ret['is_nav'] ? 'checked' : '' }}
                                               value="{{$ind}}"> {{$val}}
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class_name" class="col-sm-2 control-label">
                                    SEO标题
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="title" name="title"
                                           value="{{old('title')??$ret['title']}}" placeholder="SEO标题" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="class_name" class="col-sm-2 control-label">
                                    SEO关键词
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="keys" name="keys"
                                           value="{{old('keys')??$ret['keys']}}" placeholder="SEO关键词" type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="desc" class="col-sm-2 control-label">
                                    SEO描述
                                </label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="SEO描述">{{ old('desc')??$ret['desc'] }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="sort" class="col-sm-2 control-label">
                                    分类排序<i style="color: red">*</i>
                                </label>
                                <div class="col-sm-6">
                                    <input class="form-control" id="sort" name="sort"
                                           value="{{ old('sort')??$ret['sort'] }}" placeholder="分类排序" type="text">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-sm-3">
                                <a type="button" href="javascript:history.go(-1)" class="btn btn-default pull-right">返回</a>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-info pull-right">提交</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
@stop