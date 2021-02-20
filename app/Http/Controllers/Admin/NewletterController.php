<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewletterSubscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\subscriberExport;

class NewletterController extends Controller
{
    public function viewNewsletterSubscriber(){
        $newsletter = NewletterSubscriber::get();
        return view('admin.newsletter.view_newsletter', compact('newsletter'));

    }

    public function updateNewsletter(Request $request){
        $news = NewletterSubscriber::findOrFail($request->news);
        $news->status = $request->status;
        $news->save();
        return response()->json([
            'message' => 'Newsletter Status Updated Successfully !'
        ]);
    }


    public function deleteNewsletter($id){
        $delete_newsletter = NewletterSubscriber::where('id', $id)->first();
        $delete_newsletter->delete();
        Toastr::success('Newsletter Subscriber has been deleted', 'success');
        return redirect('/admin/view-newsletter-subscriber');
    }


//    public function exportNewsletter(){
//        $subscriberData = NewletterSubscriber::select('id', 'email', 'created_at')->where('status', 1)->orderBy('id', 'Desc')->get();
//        $subscriberData = json_decode(json_encode($subscriberData), true);
//        Excel::download('subscribers'.rand(), function ($excel) use($subscriberData){
//            $excel->setTitle('Pdf Data');
//            $excel->sheet('mySheet', function ($sheet) use($subscriberData){
//                $sheet->fromArray($subscriberData, null, 'A$', false, false);
//
//            });
//        });
//    }


    public function exportNewsletter(){
        $name = 'subscriber'.rand().'.xlsx';
        return Excel::download(new subscriberExport ,$name);
    }









}
