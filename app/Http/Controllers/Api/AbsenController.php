<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        // absen masuk
        $date = Carbon::now();

        if($request->description == "in"){
            $cek_double = Absen::where(['date' => Carbon::now()->toDateString(), 'user_id'=>Auth::id()])->count();
            // dd($cek_double); 
            if ($cek_double > 0) {
                return response()
                ->json([
                    "status" => "00",
                    "message" => "Anda sudah Absen",
                ]);
            }
            $absen = Absen::create([
                "date" =>  Carbon::now()->toDateString(),
                "time_in" =>  $date->toTimeString(),
                "longitude" => $request->longitude,
                "latitude" => $request->latitude,
                "user_id" => Auth::id(),
            ]);
            return response()
            ->json([
                "status" => "00",
                "message" => "Absen Masuk Jam $absen->time_in",
                "data" => [["time" => $date->toTimeString()]]
            ]);
        }
        // absen keluar
        elseif($request->description == "out"){
            $absen = Absen::where(['date' => Carbon::now()->toDateString(), 'user_id' => Auth::id()])
                ->update(['time_out' =>  Carbon::now()->toTimeString()]);
            return response()
            ->json([
                "status" => "00",
                "message" => "Absen Keluar Jam",
                "data" => [["date" => "sudah absen"]]
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
