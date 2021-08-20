<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function all_schedule(){
            return view('admin.all_schedule');
    }
}
