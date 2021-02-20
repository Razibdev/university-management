<?php

namespace App\Http\Controllers\Admin;

use App\Exports\userExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
//    public function viewUsers(){
//        Session::put('page', 'users');
//        $users = User::get();
//        return view('admin.users.view_users')->with(compact('users'));
//    }
//
//    public function exportUsers(){
//        $name = 'users-'.rand().'.xlsx';
//        return Excel::download(new userExport(), $name);
//    }
//
//    public function viewUsersCharts(){
//        Session::put('page', 'users-charts');
//
//         $current_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();
//         $last_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
//         $last_to_last_month_users = User::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->subMonth(2))->count();
//        return view('admin.users.view_users_chart', compact('current_month_users', 'last_month_users', 'last_to_last_month_users'));
//    }
//
//    public function viewUsersCountriesCharts(){
//        $getUsersCountry = User::where('status', 1)->select('country', DB::raw('count(country) as count'))->groupBY('country')->get();
//        $getUsersCountry = json_decode(json_encode($getUsersCountry), true);
//        return view('admin.users.view_users_countries_chart', compact('getUsersCountry'));
//    }



}
