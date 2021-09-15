<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;

class ScheduleController extends Controller
{
    public function index()
    {
        //get all data from database
        $schedule = Schedule::latest()->get();
        //render with data "posts"
        return Inertia::render('schedule/index', [
            'schedules' => $schedule
        ]);
    }

    public function create()
    {
        return Inertia::render('schedule/Create');
    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $request->validate([
            'price'   => 'required',
            'schedule_from' => 'required',
            'schedule_to' => 'required',
            'opening_hour' => 'required',
            'closing_hour' => 'required',
            'duration' => 'required',
        ]);

        //create Schedule
        $post = Schedule::create([
            'price'         => $request->price,
            'schedule_from' => $request->schedule_from,
            'schedule_to'   => $request->schedule_to,
            'opening_hour' => $request->opening_hour,
            'closing_hour' => $request->closing_hour,
            'duration' => $request->duration,
        ]);

        if($post) {
            return Redirect::route('schedule.index')->with('message', 'Data Berhasil Disimpan!');
        }
    }
}
