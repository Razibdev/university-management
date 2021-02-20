<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Department;
use App\Models\Semester;
use App\Models\Subject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SubjectController extends Controller
{
    public function subject(){
        Session::put('page', 'subject');
        $subjects = Subject::with('department')->with('batch')->with('semester')->get();
        return view('admin.subject.subject', compact('subjects'));
    }

    public function addSubject(Request $request){
        $departments = Department::all();
        $batches = Batch::all();
        $semesters = Semester::all();

        Session::put('page', 'add-subject');

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'   => 'required|regex:/([A-Za-z0-9])+/',
                'department_id' => 'required',
                'batch_id' => 'required',
                'semester_id' => 'required'
            ];
            $customMessage = [
                'name.required' => 'Subject Name is required',
                'name.regex'    => 'Valid Subject Name is required',
                'department.required'    => 'Department  is required',
                'batch_id.required'    => 'Batch  is required',
                'semester_id.required'    => 'Semester  is required'

            ];
            $this->validate($request, $rules, $customMessage);

            $subject= new Subject();
            $subject->department_id = $data['department_id'];
            $subject->batch_id = $data['batch_id'];
            $subject->semester_id = $data['semester_id'];
            $subject->name = $data['name'];
            $subject->code = $data['code'];

            $subject->save();
            Toastr::success('Add Subject Successfully', 'success');
            return redirect('admin/subject');

        }
        return view('admin.subject.add_subject', compact('departments', 'batches', 'semesters'));
    }



    public function editSubject(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'name'   => 'required|regex:/([A-Za-z0-9])+/',
                'department_id' => 'required',
                'batch_id' => 'required',
                'semester_id' => 'required'
            ];
            $customMessage = [
                'name.required' => 'Subject Name is required',
                'name.regex'    => 'Valid Subject Name is required',
                'department.required'    => 'Department  is required',
                'batch_id.required'    => 'Batch  is required',
                'semester_id.required'    => 'Semester  is required'

            ];
            $this->validate($request, $rules, $customMessage);

            Subject::where(['id'=> $id])->update(['department_id'=> $data['department_id'], 'batch_id'=> $data['batch_id'],'semester_id'=> $data['semester_id'], 'name'=> $data['name'], 'code' =>$data['code']]);
            Toastr::success('Subject Updated Successfully', 'success');
            return redirect('/admin/subject');
        }
        $subjectDetails = Subject::where('id', $id)->first();
        $departments = Department::all();
        $batches = Batch::all();
        $semesters= Semester::all();
        return view('admin.subject.edit_subject', compact('subjectDetails', 'departments', 'batches', 'semesters'));
    }


}
