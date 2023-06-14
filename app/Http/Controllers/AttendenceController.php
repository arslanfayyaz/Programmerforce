<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
use Carbon\Carbon;
use App\Models\AttendenceUser;

class AttendenceController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    
   public function checkIPAddress(Request $request) {
        $ip =  $request->ip();

        $address = Attendence::where('ip', $ip)->first();
        
        if ($address) {
            return response()->json(["Message"=>"IP found in the table"]);
        }

        return response()->json(['Message'=>"It is a remote user. Your IP is " . $ip]);
    }

    public function checkIn(Request $request) {
        $ip = $request->ip();

        // $address = Attendence::where('ip', $ip)->first();
        
        // if ($address) {
            AttendenceUser::create([
                "ip"=>$ip,
                "checkIn_time"=>Carbon::now()
            ]);

            return response()->json($ip);


        // }
        return response()->json(['Message'=>"It is a remote user. Your IP is " . $ip]);
    }

    public function checkout(Request $request) {
        $ip = $request->ip();
        $address = Attendence::where('ip', $ip)->first();
        $location = $address->location ?? 'remote';

        $endTime = Carbon::now();
        // $address = Attendence::where('ip', $ip)->first();
        if ($address) {
            // // Calculate difference between $this->startTime and $endTime
            $ipUser = AttendenceUser::where('ip', $ip)->first();

            $difference = $endTime->diffInHours($ipUser->checkIn_time);
            if($difference<7.5){

                 if($difference>5){
                    
                     $ipUser->workDay_status = "Working day complete";
                     

                 }elseif ($difference>3 && $difference<5) {
                     
                     $ipUser->workDay_status = "Half day present";
                 }elseif($difference<3){
                       
                       $ipUser->workDay_status = "Absent";
        

                 }


            }
            $ipUser->checkOut_time= $endTime;
            $ipUser->save();
            return response()->json($ipUser);
            // $ipUser->checkout_time = $endTime;
            // $ipUser->stay_duration = $difference;
            // $ipUser->save();
            // return response()->json([
            //     "ip"=> $ip,
            //     "location"=> $address->location,
            //     "stay_duration"=>$difference
            // ]);
        }

         // $remoteUser = AttendenceUser::where('ip', $ip)->first();
         // $difference = $endTime->diffInHours($ipUser->checkIn_time);

         // if($difference<7.5){

         //         if($difference>5){
                    
         //             $remoteUser->workDay_status = "Working day complete";


         //         }elseif ($difference>3 && $difference<5) {
                     
         //             $remoteUser->workDay_status = "Half day present";
         //         }elseif($difference<3){
                       
         //               $remoteUser->workDay_status = "Absent";

         //         }


         //    }



    }

    public function registerIP(Request $request) {
        $ip = $request->ip();
        Attendence::create([
            "ip"=>$ip,
            "location"=>"My neigbour Ip"
        ]);

        return response()->json(["Message"=>"We have registered your ip"]);
    }

    public function markAbsentOrPresent(Request $request){


          

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

