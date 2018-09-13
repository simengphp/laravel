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
use App\Http\Controllers\Auth\Demo\StudentAuthController;

class StudentController extends Controller
{
    /**列表页
     * @author crazy
     */
    public function index()
    {
        $ret = Student::paginate(10);
        if ($ret->isEmpty()) {
            throw new StudentException();
        }
        return view('student.index', ['student'=>$ret]);
    }

    /**新增
     * @author crazy
     */
    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $ret_auth = (new StudentAuthController())->goCheck($request);
            if ($ret_auth !== true) {
                return redirect()->back()->withErrors($ret_auth)->withInput();
            }
            $data = $request->input('student');
            $file_img = $this->common($request, 'img'); //上传图片
            if (isset($file_img['flag']) && $file_img['flag'] === false) {
                return redirect()->back()->with('error', $file_img['msg'])->withInput();
            } else {
                $data['img'] = $file_img??'';
            }
            if (Student::create($data)) {
                return redirect('student/index')->with('success', '新增成功');
            } else {
                return redirect()->back()->with('error', '新增失败');
            }
        } else {
            return view('student.create', ['student'=>new Student()]);
        }
    }

    /**
     * 详情
     * @author crazy
    */
    public function detail($id)
    {
        $ret = Student::find($id);
        return view('student.detail', ['student'=>$ret]);
    }

    /**删除方法
     * @author crazy
     */
    public function del($id)
    {
        $student = Student::find($id);

        if ($student->delete()) {
            return redirect('student/index')->with('success', '删除成功-' . $id);
        } else {
            return redirect('student/index')->with('error', '删除失败-' . $id);
        }
    }

    /**修改方法
     * @author crazy
     */
    public function edit(Request $request, $id)
    {
        $student = Student::find($id);
        if ($request->isMethod('post')) {
            $ret_auth = (new StudentAuthController())->goCheck($request);
            if ($ret_auth !== true) {
                return redirect()->back()->withErrors($ret_auth)->withInput();
            }

            $data = $request->input('student');
            $file_img = $this->common($request, 'img'); //上传图片
            if (isset($file_img['flag']) && $file_img['flag'] === false) {
                return redirect()->back()->with('error', $file_img['msg'])->withInput();
            } else {
                $file_img?$student->img = $file_img:'';
            }
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

    /**上传图片的公共方法
     * @author crazy
     */
    public function common($request, $file_name)
    {
        $file = $request->file($file_name);
        if (!isset($file)) {
            return;
        }
        if ($file->isValid()) {
            $ret = UploadController::isImg($file);
            if ($ret) {
                $is_upload = UploadController::uploadOne($file);
                if ($is_upload === false) {
                    $arr = [
                        'msg'=>'上传失败',
                        'flag' =>false
                    ];
                    return $arr;
                } else {
                    return $is_upload;
                }
            } else {
                $arr = [
                    'msg'=>'图片后缀错误',
                    'flag' =>false
                ];
                return $arr;
            }
        }
    }
}
