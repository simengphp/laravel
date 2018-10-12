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
                            <label for="title" class="col-sm-2 control-label">
                                文章标题<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" id="title" name="title"
                                       value="{{ old('title')??$ret['title'] }}" placeholder="文章标题" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="col-sm-2 control-label">
                                文章作者
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="author"
                                       value="{{ old('author')??$ret['author'] }}" id="author" placeholder="作者" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="col-sm-2 control-label">
                                文章排序（正序0/1/2/3）<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="sort"
                                       value="{{ old('sort')??$ret['sort'] }}" id="sort" placeholder="文章排序" type="number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="look" class="col-sm-2 control-label">
                                文章浏览量
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="look"
                                       value="{{ old('look')??$ret['look'] }}" id="look" placeholder="文章浏览量" type="number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="key" class="col-sm-2 control-label">
                                文章关键词（SEO）<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <input class="form-control" name="key"
                                       value="{{ old('key')??$ret['key'] }}" id="key" placeholder="文章关键词(用于SEO)" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">文章封面图/pdf文件</label>
                            <div class="col-sm-6">
                                <input name="pic" placeholder="文章封面图" type="file">
                                <input type="hidden" value="{{ old('pic')??$ret['pic'] }}" name="pic" >
                                <img src="/uploads/{{ old('pic')??$ret['pic'] }}" alt="" style="width:50px;height:auto">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pid" class="col-sm-2 control-label">
                                文章分类<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <select class="form-control" id="pid" name="class_id">
                                    <option value="">请选择文章分类...</option>
                                    @foreach($ret->class_list as $val)
                                    <option value="{{$val->id}}" {{ old('class_id') == $val->id ||
                                    isset($ret['class_id'])&&$ret['class_id'] == $val->id?'selected':'' }}>{{$val->class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-sm-2 control-label">
                                文章描述<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
                                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="文章描述">{{ old('desc')??$ret['desc'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-sm-2 control-label">
                                文章内容<i style="color: red">*</i>
                            </label>
                            <div class="col-sm-6">
						<textarea id="editor" name="content" rows="10" cols="80" style="visibility: hidden; display: none;">
							 {{ old('content')??$ret['content'] }}
						</textarea>
                            </div>
                            <script src="{{asset('./common/bower_components/ckeditor/ckeditor.js')}}"></script>
                            <script>
                                CKEDITOR.replace('editor',
                                    {filebrowserUploadUrl:'/common/commonUpload'})
                            </script>
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