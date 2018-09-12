<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/11
     * Time: 14:01
     */

namespace App\Http\Controllers\Demo;

use App\Exceptions\StudentException;
use App\Http\Controllers\Controller;
use App\Model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $ret = Student::paginate(3);
        if ($ret->isEmpty()) {
            throw new StudentException();
        }
        return view('student.index', ['student'=>$ret]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $validate = Validator::make($request->input(), [
                'student.name'  =>'required',
                'student.age'   =>'required|integer',
                'student.sex'   =>'required|integer'
            ], [
                'required'   =>':attribute 为必填项',
                'integer'   =>':attribute 必须为整数',
            ], [
                'student.name'=>'姓名',
                'student.age'=>'年龄',
                'student.sex'=>'性别',
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withErrors($validate)->withInput();
            }

            $data = $request->input('student');
            if (Student::create($data)) {
                return redirect('student/index')->with('success', '新增成功');
            } else {
                return redirect()->back()->with('error', '新增失败');
            }
        } else {
            return view('student.create', ['student'=>new Student()]);
        }
    }

    public function detail($id)
    {
        $ret = Student::find($id);
        return view('student.detail', ['student'=>$ret]);
    }

    public function del($id)
    {
        $student = Student::find($id);

        if ($student->delete()) {
            return redirect('student/index')->with('success', '删除成功-' . $id);
        } else {
            return redirect('student/index')->with('error', '删除失败-' . $id);
        }
    }

    public function edit(Request $request, $id)
    {
        $student = Student::find($id);
        if ($request->isMethod('post')) {
            $data = $request->input('student');
            $student->name = $data['name'];
            $student->age = $data['age'];
            $student->sex = $data['sex'];
            if ($student->save()) {
                return redirect('student/index')->with('success', '修改成功-' . $id);
            } else {
                return redirect()->back()->with('error', '修改失败')->withInput();
            }
        } else {
            return view('student.update', ['student'=>$student]);
        }
    }
}
