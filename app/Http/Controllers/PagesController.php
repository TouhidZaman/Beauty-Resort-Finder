<?php

namespace App\Http\Controllers;

use App\Resort;
use App\ResortCategory;
use App\BookingHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class PagesController extends Controller
{
    public function index(){
        $resort_categories = ResortCategory::all()->sortByDesc('created_at');
        $resorts = Resort::all()->where('active_status', true);
        return View('pages.index',['resorts' => $resorts, 'resort_categories' => $resort_categories]);
    }

    public function contact(){
        return view('pages.contact');
    }

    public function getAdminDashboard(){
        $resorts = Resort::all()->where('active_status',false);
        return view('pages.admin.dashboard', ['resorts' => $resorts]);
    }
    public function getUserDashboard(){
        $user = Auth::user(); //Get the Current User
        $booking_histories = $user->booking_histories()->where('check_out_date', '>=', Carbon::now()->toDateString())->get(); //get booking histories
        $personal_resorts = Resort::all()->where('user_id', $user->id);
        return view('pages.user.dashboard', ['booking_histories' => $booking_histories, 'personal_resorts' => $personal_resorts]);
    }
}
