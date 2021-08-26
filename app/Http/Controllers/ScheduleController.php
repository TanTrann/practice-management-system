<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;
// Model
use App\Models\Schedule;


class ScheduleController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }

    public function all_schedule(){
        $this->AuthLogin();
        $all_schedule = DB::table('tbl_schedule')->get();
        
       
        $manager_schedule = view('admin.schedule_list')->with('all_schedule',$all_schedule);
        return view ('admin_layout')->with('admin.schedule_list',$manager_schedule);
    }
    public function manage_schedule(){
        $this->AuthLogin();
        return view('admin.manage_schedule');
    }

    public function update_schedule(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['hoc_ki']= $request->hki;
        $data['date_start']= $request->date_start;
        $data['date_end']= $request->date_end;
        Schedule::insert($data);
        Session::put('message','Cập nhật học kì thành công');
        return Redirect()->back();
    }
    
}
