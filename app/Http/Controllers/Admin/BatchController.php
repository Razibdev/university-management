<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Department;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BatchController extends Controller
{
    public function batch(){
        Session::put('page', 'batch');
        $batches = Batch::with('department')->get();
        return view('admin.batch.batch', compact('batches'));
    }


    public function addBatch(Request $request){

        $departments = Department::all();

        Session::put('page', 'add-batch');

        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'name'   => 'required|regex:/([A-Za-z0-9])+/',
                'department_id' => 'required'
            ];
            $customMessage = [
                'name.required' => 'Batch Name is required',
                'name.regex'    => 'Valid Batch Name is required',
                'department.required'    => 'Department  is required',


            ];
            $this->validate($request, $rules, $customMessage);

            $batch = new Batch;
            $batch->department_id = $data['department_id'];
            $batch->name = $data['name'];
            $batch->save();
            Toastr::success('Add Batch Successfully', 'success');
            return redirect('admin/batch');

        }
        return view('admin.batch.add_batch', compact('departments'));

    }


    public function editBatch(Request $request, $id){
        if($request->isMethod('post')){
            $data = $request->all();
            $rules = [
                'name'   => 'required|regex:/([A-Za-z0-9])+/',
                'department_id' => 'required'
            ];
            $customMessage = [
                'name.required' => 'Batch Name is required',
                'name.regex'    => 'Valid Batch Name is required',
                'department_id.required'    => 'Department  is required',


            ];
            $this->validate($request, $rules, $customMessage);

            Batch::where(['id'=> $id])->update(['department_id'=> $data['department_id'], 'name'=> $data['name']]);
            Toastr::success('Batch Updated Successfully', 'success');
            return redirect('/admin/batch');
        }
        $batchDetails = Batch::where('id', $id)->first();
        $departments = Department::all();
        return view('admin.batch.edit_batch', compact('batchDetails', 'departments'));
    }


    public function deleteBatch($id){
        $delete_batch = Batch::where('id', $id)->first();
        $delete_batch->delete();
        Toastr::success('Batch has been deleted', 'success');
        return redirect('/admin/batch');
    }


}
