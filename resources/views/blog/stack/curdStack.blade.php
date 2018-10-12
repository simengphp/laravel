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
                            <label for="name" class="col-sm-2 control-label">
                                贡献者名称<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="name" name="name"
                                       value="{{ old('name')??$ret['name'] }}" placeholder="贡献者名称" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website" class="col-sm-2 control-label">
                                贡献者个人网站
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="website" name="website"
                                       value="{{ old('website')??$ret['website'] }}" placeholder="贡献者个人网站" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">
                                贡献者联系方式
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="contact" name="contact"
                                       value="{{ old('contact')??$ret['contact'] }}" placeholder="贡献者联系方式" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">
                                排序（正序0/1/2/3）
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="sort"
                                       value="{{ old('sort')??$ret['sort'] }}" id="sort" placeholder="排序" type="number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">头像</label>
                            <div class="col-sm-6">
                                <input name="pic" placeholder="头像" type="file">
                                <input type="hidden" value="{{ old('pic')??$ret['pic'] }}" name="pic" >
                                <img src="/uploads/{{ old('pic')??$ret['pic'] }}" alt="" style="width:50px;height:auto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stack" class="col-sm-2 control-label">
                                贡献者技术栈<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="stack" name="stack" rows="3" placeholder="贡献者技术栈">{{ old('stack')??$ret['stack'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-sm-2 control-label">
                                贡献者描述<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="贡献者描述">{{ old('desc')??$ret['desc'] }}</textarea>
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