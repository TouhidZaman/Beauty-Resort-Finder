<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DateInterval;
use DatePeriod;
use DateTime;
use Illuminate\Http\Request;
use App\User;
use App\Resort;
use App\ResortCategory;
use App\BookingHistory;
use Image;
use Auth;

class ResortsController extends Controller
{

    public function createNewResort(Request $request){
        try{
            $user = Auth::user(); //Get the Current User
            $role=$user->roles->first()->name;
            if(($role == 'Moderator') || ($role == 'Admin') ){
                $active_status = true;
            }else{
                $active_status = false;
            }
            $resort_data = new Resort();
            if($request->hasFile('resort_image')){
                $avatar = $request->file('resort_image');
                $filename = time().'.'.$avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300,300)->save( public_path('/assets/resorts/'.$filename));
                $resort_data->resort_image = $filename;
            }
            if($request->hasFile('single_bed_sample')){
                $avatar = $request->file('single_bed_sample');
                $filename = time().'.'.$avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300,300)->save( public_path('/assets/resorts/'.$filename));
                $resort_data->single_bed_sample = $filename;
            }
            if($request->hasFile('double_bed_sample')){
                $avatar = $request->file('double_bed_sample');
                $filename = time().'.'.$avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300,300)->save( public_path('/assets/resorts/'.$filename));
                $resort_data->double_bed_sample = $filename;
            }
            $resort_data->name = $request->get('name');
            $resort_data->location = $request->get('location');
            $resort_data->single_bed = $request->get('single_bed');
            $resort_data->single_bed_cost = $request->get('single_bed_cost');
            $resort_data->double_bed = $request->get('double_bed');
            $resort_data->double_bed_cost = $request->get('double_bed_cost');
            $resort_data->resort_category_id = $request->get('resort_category_id');
            $resort_data->user_id = Auth::user()->id;
            $resort_data->active_status = $active_status;

            if($resort_data->save()){
                if($active_status){
                    return back()->with('success', 'Congrats ! Your Resort has been published');
                }
                return back()->with('success', 'Congrats ! Your Resort created Successfully ! Please wait for Admin/Moderator Approval');
            }else{
                return back()->with('success', 'Failed to save data !!');
            }
        }
        catch (Exception $exception){
            echo $exception->getMessage();
        }

    }

    //Get active resorts
    public function getResorts(){
        $resort_categories = ResortCategory::all()->sortByDesc('created_at');
        $resorts = Resort::all()->where('active_status', true);
        return View('pages.resortList',['resorts' => $resorts, 'resort_categories' => $resort_categories]);
    }
    //Filter resorts
    public function getResortsByCategory($selected_category){
        $resort_categories = ResortCategory::all()->sortByDesc('created_at');
        $selected_category = ResortCategory::all()->where('category', $selected_category)->first();
        $resorts = Resort::all()->where('active_status', true)->where('resort_category_id', $selected_category->id)->sortByDesc('created_at');
        if(Auth::user() !== Null){
            return View('pages.resortList',['resort_categories'=>$resort_categories, 'resorts'=>$resorts]);
        }
        return View('pages.index',['resort_categories'=>$resort_categories, 'resorts'=>$resorts]);
    }
    //Approve resorts
    public function approveResort($id){

        try {
            $resort_id = decrypt($id);
            $resort = Resort::find($resort_id);
            $resort -> active_status = true;
            if ($resort->Update()) {
                return back()->with('success', 'Resort has been approved Successfully');
                //echo "Data Updated Successfully";
            } else {
                echo "Failed";
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
    //view resort info
    public function viewResort($id){
        try{
            $resort_id = decrypt($id);
            $resort = Resort::find($resort_id);
            $resort_categories = ResortCategory::all()->sortByDesc('created_at');
            return view('pages.resortInfo', ['resort' => $resort, 'resort_categories' => $resort_categories]);

        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

    //resortBookingUpdates
    public function resortBookingUpdates($id){
        try{
            $resort_id = decrypt($id);
            $resort = Resort::find($resort_id);
            $booking_histories = $resort->booking_histories()->where('check_out_date', '>=', Carbon::now()->toDateString())->get(); //get booking histories
            return view('pages.user.resortBookingUpdates', ['resort' => $resort, 'booking_histories' => $booking_histories]);

        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

    //Delete Resort
    public function removeResort($id){

        try {
            $resort_id = decrypt($id);
            $resort = Resort::find($resort_id);
            $bh = BookingHistory::where('resort_id', $resort->id);
            $bh->Delete();
            if($resort->Delete()) {
                return back()->with('success', 'Resort has been removed Successfully');
            } else {
                echo "Failed";
            }
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
    //Check availability
    public function checkAvailability(Request $request){
        try {
            $resort_id = decrypt($request->get('resort_id')); //Get Resort Id
            $resort = Resort::find($resort_id); //Get Resort
            $single_bedrooms = $request->get('single_bedrooms');
            $double_bedrooms = $request->get('double_bedrooms');
            $check_in_date = $request->get('check_in_date');
            $check_out_date = $request->get('check_out_date');
            $total_cost = 0;
            if($single_bedrooms !== 0){
                $total_cost += $resort->single_bed_cost * $single_bedrooms;
            }
            if($double_bedrooms !== 0){
                $total_cost += $resort->double_bed_cost * $double_bedrooms;
            }

            //session variable section
            $request->session()->put('single_bedrooms',$single_bedrooms);
            $request->session()->put('double_bedrooms',$double_bedrooms);
            $request->session()->put('check_in_date',$check_in_date);
            $request->session()->put('check_out_date',$check_out_date);
            $request->session()->put('total_cost',$total_cost);
            $request->session()->put('resort_id',$resort_id);
            //End of session

            $resorts_history = BookingHistory::where('resort_id' ,'=' ,$resort_id)->first();

            if($resorts_history) {
                $resorts_history = $resorts_history->whereBetween('check_in_date', [$check_in_date, $check_out_date])->orWhereBetween('check_out_date', [$check_in_date, $check_out_date])->get();

                //Check available rooms section
                $tmp_check_in_date = $check_in_date;
                $tmp_check_out_date = $check_out_date;
                while ($tmp_check_in_date <= $check_out_date){
                    ${"single_room_" . $tmp_check_in_date} = 0;
                    ${"double_room_" . $tmp_check_in_date} = 0;
                    $tmp_check_in_date = strtotime("1 day", strtotime($tmp_check_in_date));
                    $tmp_check_in_date = date("Y-m-d", $tmp_check_in_date);
                }
                $tmp_check_in_date = $check_in_date;

                foreach ($resorts_history as $rh){
                    $temp_date = $rh->check_in_date;
                    if($rh->check_out_date <= $tmp_check_out_date){
                        $tmp_check_out_date = $rh->check_out_date;
                    }
                    while($temp_date <= $tmp_check_out_date){

                        if($temp_date >= $check_in_date) {
                            $i = $temp_date;
                            ${"single_room_" . $i} += $rh->single_bedrooms;
                            ${"double_room_" . $i} += $rh->double_bedrooms;
                            //return  ${"double_room_" . $i};
                        }

                        $date = strtotime("1 day", strtotime($temp_date));
                        $temp_date = date("Y-m-d", $date);
                    }

                }
                while ($tmp_check_in_date <= $check_out_date){
                    if($resort->single_bed >= ${"single_room_" . $tmp_check_in_date}){
                        $available_single_rooms =  $resort->single_bed - ${"single_room_" . $tmp_check_in_date};
                        if($single_bedrooms > $available_single_rooms){
                            return back()->with('warning', 'Sorry ! '.$available_single_rooms.' single rooms available in '.$tmp_check_in_date);
                        }
                    }

                    if($resort->double_bed >=  ${"double_room_" . $tmp_check_in_date}){
                        $available_double_rooms =  $resort->double_bed - ${"double_room_" . $tmp_check_in_date};
                        if($double_bedrooms > $available_double_rooms){
                            return back()->with('warning', 'Sorry ! '.$available_double_rooms.' double rooms available in '.$tmp_check_in_date);
                        }
                    }
                    return back()->with('CheckSuccess', 'Congratulations rooms are available !! Total Cost:'. $total_cost);

                    $tmp_check_in_date = strtotime("1 day", strtotime($tmp_check_in_date));
                    $tmp_check_in_date = date("Y-m-d", $tmp_check_in_date);
                }

            }else{
                return back()->with('CheckSuccess', 'Congratulations rooms are available !! Total Cost:'.$total_cost);
            }

        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

    //Confirm Resort Booking
    public function confirmResortBooking(Request $request){
        session_start();
        try{
            $user_id = Auth::user()->id; //Get the Current User Id

            $booking_data = new BookingHistory();
            $booking_data->check_in_date = $request->session()->get('check_in_date');
            $booking_data->check_out_date = $request->session()->get('check_out_date');
            $booking_data->single_bedrooms = $request->session()->get('single_bedrooms');
            $booking_data->double_bedrooms = $request->session()->get('double_bedrooms');
            $booking_data->total_cost = $request->session()->get('total_cost');
            $booking_data->resort_id = $request->session()->get('resort_id');
            $booking_data->user_id = $user_id;

            if($booking_data->save()){
                return back()->with('warning', 'Congrats ! Resort has been booked successfully !!');
            }else{
                return back()->with('warning', 'Failed to save data !!');
            }

        } catch (Exception $e){
            echo $e->getMessage();
        }

    }

}
