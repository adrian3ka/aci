<?php

namespace App\Http\Controllers;

use App\Schedule;
use App\ScheduleDetail;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth.admin');
    }
    public function index()
    {
        //
        $schedules = Schedule::paginate(5);
        return view('schedules/index',[
            'schedules' => $schedules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('schedules/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $schedule = new Schedule;
        $schedule->date = $input['date'];
        $schedule->trainer = $input['trainer'];
        $schedule->location = $input['location'];
        $schedule->save();
        $details = [];
        for( $i = 0 ; $i < count($input['detail_time']); $i++) {
			$detail = new ScheduleDetail;
			$detail->name = $input['detail_name'][$i];
			$detail->time = $input['detail_time'][$i];
			$detail->schedule_id = $schedule->id;
			$detail->save();
			array_push($details, $detail);
		}
        $schedule->details()->saveMany($details);
        print_r($input);
        return redirect('schedules');
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
        $schedule = Schedule::find($id);
        return view('schedules/show',[
            'schedule' => $schedule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
