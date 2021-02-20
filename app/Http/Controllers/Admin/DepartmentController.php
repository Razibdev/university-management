<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function department(){
        Session::put('page', 'department');
        $departments = Department::all();
        return view('admin.department.department', compact('departments'));
    }


    public function addDepartment(Request $request){
        Session::put('page', 'add-department');

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
            ];
            $customMessage = [
                'name.required' => 'Department Name is required',
                'name.regex'    => 'Valid Department Name is required'

            ];
            $this->validate($request, $rules, $customMessage);

            $department = new Department();
            $department->name = $data['name'];
            $department->save();
            Toastr::success('Add Department Successfully', 'success');
            return redirect('admin/department');

        }
        return view('admin.department.add_department');
    }


    public function editDepartment(Request $request, $id = null){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'   => 'required|regex:/(^([a-zA-z -]+)(\d+)?$)/u',
            ];
            $customMessage = [
                'name.required' => 'Department Name is required',
                'name.regex'    => 'Valid Department Name is required'

            ];
            $this->validate($request, $rules, $customMessage);

            Department::where(['id'=> $id])->update(['name'=> $data['name']]);
            Toastr::success('Department Updated Successfully', 'success');
            return redirect('/admin/department');
        }
        $departmentDetails = Department::where('id', $id)->first();

        return view('admin.department.edit_department', compact('departmentDetails'));
    }






    public function deleteDepartment($id){
        $delete_department = Department::where('id', $id)->first();
        $delete_department->delete();
        Toastr::success('Department has been deleted', 'success');
        return redirect('/admin/department');
    }

}
