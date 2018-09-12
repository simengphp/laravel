<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">姓名</label>

        <div class="col-sm-5">
            <input type="text" name="student[name]"
                   value="{{ old('student')['name'] ??$student['name'] }}"
                   class="form-control" id="name" placeholder="请输入学生姓名">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('student.name') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">年龄</label>

        <div class="col-sm-5">
            <input type="text" value="{{ old('student')['age']??$student['age'] }}"
                   name="student[age]" class="form-control" id="age" placeholder="请输入学生年龄">
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('student.age') }}</p>
        </div>
    </div>
    <div class="form-group">
        <label for="age" class="col-sm-2 control-label">头像</label>
        <div class="col-sm-5">
            @if($student['img'])
                <input type="file" name="img" id="">
                <img src="/uploads/{{$student['img']}}" width="100px" height="100px" class="img-circle"/>
                @else
                <input type="file" name="img" id="">
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">性别</label>
        <div class="col-sm-5">
            @foreach($student->returnSex() as $ind => $val)
            <label class="radio-inline">
                <input type="radio" name="student[sex]"
                       {{ isset($student['sex']) && $ind == $student['sex'] ? 'checked' : '' }}
                       value="{{$ind}}"> {{$val}}
            </label>
            @endforeach
        </div>
        <div class="col-sm-5">
            <p class="form-control-static text-danger">{{ $errors->first('student.sex') }}</p>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">提交</button>
        </div>
    </div>
</form>