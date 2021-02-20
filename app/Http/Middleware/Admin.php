<?php

namespace App\Http\Middleware;

use Brian2694\Toastr\Facades\Toastr;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::guard('admin')->check()){
            return redirect('/admin/login');
        }else{
            // Get Admin and sub-admin details
            $adminDetails = \App\Models\Admin::where('email',  Auth::guard('admin')->user()->email)->first();
            $adminDetails = json_decode(json_encode($adminDetails), true);
            if($adminDetails['type'] == 'Admin'){
                $adminDetails['categories_view_access'] = 1;
                $adminDetails['categories_edit_access'] = 1;
                $adminDetails['categories_full_access'] = 1;

                $adminDetails['products_access'] = 1;
                $adminDetails['orders_access'] = 1;
                $adminDetails['users_access'] = 1;
            }
            Session::put('adminDetails', $adminDetails);
//            echo '<pre>'; print_r(Session::get('adminDetails')); die;
            $currentPath = Route::getFacadeRoot()->current()->uri();

            if(($currentPath == 'admin/categories' || $currentPath == 'admin/add-category') && Session::get('adminDetails')['categories_view_access'] == 0){
                Toastr::error('You have no access for this module ', 'Error');
                return redirect('/admin/dashboard');
            }

            if(($currentPath == 'admin/add-product' || $currentPath == 'admin/view-products' ) && Session::get('adminDetails')['products_access'] == 0){
                Toastr::error('You have no access for this module ', 'Error');
                return redirect('/admin/dashboard');
            }

            if($currentPath == 'admin/view-orders' && Session::get('adminDetails')['orders_access'] == 0){
                Toastr::error('You have no access for this module ', 'Error');
                return redirect('/admin/dashboard');
            }

            if($currentPath == 'admin/view-users' && Session::get('adminDetails')['users_access'] == 0){
                Toastr::error('You have no access for this module ', 'Error');
                return redirect('/admin/dashboard');
            }
        }
        return $next($request);
    }
}
