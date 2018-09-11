<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/9/11
     * Time: 14:01
     */

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Model\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $ret = Student::paginate(3);
        return view('student.index', ['student'=>$ret]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input('student');
//            try {
                if (Student::create($data)) {
                    return redirect('index')->with('success', '新增成功');
                } else {
                    return redirect()->back()->with('error', '新增失败');
                }
//            } catch (\Exception $e) {
//                return redirect()->back()->with('error', '新增失败');
//            }

        } else {
            return view('student.create');
        }
    }
}
