@extends('blog.index.index')
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
				@include('blog.common.message')
			</div>
		</div>
		<!-- form start -->
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="{{old('id')??$ret['id']}}">
			{{csrf_field()}}
			<div class="box-body">
				<div class="form-group">
					<label for="tel" class="col-sm-2 control-label">
						名称
					</label>
					<div class="col-sm-6">
						<input class="form-control" id="name" name="name"
						       value="{{old('name')??$ret['name']}}" placeholder="思梦php" type="text">
					</div>
				</div>
				<div class="form-group">
					<label for="postcode" class="col-sm-2 control-label">
						登陆账号
					</label>
					<div class="col-sm-6">
						<input class="form-control" id="account" name="account"
						       value="{{old('account')??$ret['account']}}" placeholder="simengphp" type="text">
					</div>
				</div>
				<div class="form-group">
					<label for="" class="col-sm-2 control-label">个人头像</label>
					<div class="col-sm-6">
						<input name="pic" placeholder="个人头像" type="file">
						<input type="hidden" value="{{ old('pic')??$ret['pic'] }}" name="pic" >
						<img src="/uploads/{{ old('pic')??$ret['pic'] }}" alt="" style="width:50px;height:auto">
					</div>
				</div>
				<div class="form-group">
					<label for="desc" class="col-sm-2 control-label">
						个人描述
					</label>
					<div class="col-sm-6">
						<textarea class="form-control" id="desc" name="desc" rows="3" placeholder="个人描述">{{old('desc')??$ret['desc']}}</textarea>
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