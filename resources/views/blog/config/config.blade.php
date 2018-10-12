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
			<label for="" class="col-sm-2 control-label"></label>
			<div class="col-sm-6">
				@include('manager.common.editError')
			</div>
		</div>
		<!-- form start -->
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="{{old('id')??$ret['id']}}">
			{{csrf_field()}}
			<div class="box-body">
				<div class="form-group">
					<label for="tel" class="col-sm-2 control-label">
						电话
					</label>
					<div class="col-sm-6">
						<input class="form-control" id="tel" name="tel"
						       value="{{old('tel')??$ret['tel']}}" placeholder="022-5555555" type="text">
					</div>
				</div>
				<div class="form-group">
					<label for="postcode" class="col-sm-2 control-label">
						邮箱
					</label>
					<div class="col-sm-6">
						<input class="form-control" id="postcode" name="postcode"
						       value="{{old('postcode')??$ret['postcode']}}" placeholder="zanpu@163.com" type="text">
					</div>
				</div>
				<div class="form-group">
					<label for="title" class="col-sm-2 control-label">
						网站名称
					</label>
					<div class="col-sm-6">
						<input class="form-control" id="title" name="title"
						       value="{{old('title')??$ret['title']}}" placeholder="xxx官网" type="text">
					</div>
				</div>
				<div class="form-group">
					<label for="website_code" class="col-sm-2 control-label">
						网站备案信息
					</label>
					<div class="col-sm-6">
						<input class="form-control" id="website_code" name="website_code"
						       value="{{old('website_code')??$ret['website_code']}}" placeholder="津888888" type="text">
					</div>
				</div>
				<div class="form-group">
					<label for="keys" class="col-sm-2 control-label">
						网站关键词（SEO）
					</label>
					<div class="col-sm-6">
						<textarea class="form-control" id="keys" name="keys" rows="3" placeholder="赞普;云服务提供商;服务器托管">{{old('keys')??$ret['keys']}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="description" class="col-sm-2 control-label">
						网站描述
					</label>
					<div class="col-sm-6">
						<textarea class="form-control" id="description" name="description" rows="3" placeholder="网站描述">{{old('description')??$ret['description']}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">
						关于我们
					</label>
					<div class="col-sm-6">
						<textarea id="editor1" name="about" rows="10" cols="80" style="visibility: hidden; display: none;">
								{{old('about')??$ret['about']}}
						</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">
						联系我们
					</label>
					<div class="col-sm-6">
						<textarea id="contact_me" name="contact_me" rows="10" cols="80" style="visibility: hidden; display: none;">
							 {{old('contact_me')??$ret['contact_me']}}
						</textarea>
					</div>
				</div>
				<script src="{{asset('./common/bower_components/ckeditor/ckeditor.js')}}"></script>
				<script>
                    CKEDITOR.replace('editor1',
                        {filebrowserUploadUrl:'/common/commonUpload'})
                    CKEDITOR.replace('contact_me',
                        {filebrowserUploadUrl:'/common/commonUpload'})
				</script>
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