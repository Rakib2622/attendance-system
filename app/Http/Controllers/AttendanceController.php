<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkIn(Request $request)
    {
        $attendance = new Attendance();
        $attendance->user_id = Auth::id();
        $attendance->check_in_time = now();
        $attendance->save();

        return response()->json(['message' => 'Checked in successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkOut(Request $request)
    {
        $attendance = Attendance::where('user_id', Auth::id())
                                 ->whereNull('check_out_time')
                                 ->first();
        if ($attendance) {
            $attendance->check_out_time = now();
            $attendance->save();

            return response()->json(['message' => 'Checked out successfully'], 200);
        }

        return response()->json(['message' => 'No check-in record found'], 404);
    }
}
