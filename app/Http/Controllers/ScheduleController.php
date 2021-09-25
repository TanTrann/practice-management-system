<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

// Model
use App\Models\Schedule;
use App\Models\DetailSemester;

class ScheduleController extends Controller
{
    public function AuthLogin(){
        $user_id = Session::get('user_id');
        if($user_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }

    public function list_schedule(){
        $this->AuthLogin();
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $ds_tkb = DB::table('tbl_ds_tkb')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_ds_tkb.hoc_ki')->get();
        $count_room=DB::table('tbl_room')->get()->count();
        $all_schedule = DB::table('tbl_schedule')->where('schedule_status','1')->orderBy('schedule_id','desc')->paginate(1);
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_room = DB::table('tbl_room')->orderby('room_name','asc')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $manager_schedule = view('admin.schedule.schedule_list')->with('all_schedule',$all_schedule)->with('all_week',$all_week)->with('all_room',$all_room)->with('all_subject',$all_subject)->with('count_room',$count_room)->with('hoc_ki',$hoc_ki)->with('ds_tkb',$ds_tkb);
        return view ('admin_layout')->with('admin.schedule_list',$manager_schedule);
    }

    public function manage_semester(){
        $this->AuthLogin();
        $all_schedule = DB::table('tbl_schedule')->get();
        $manager_semester = view('admin.schedule.manage_semester')->with('all_schedule',$all_schedule);
        return view ('admin_layout')->with('admin.manage_semester',$manager_semester);
    }

    public function insert_schedule(Request $request){
    
       
        $this->AuthLogin();
        $data =  array();
        $data= array();
        $data['hoc_ki']= $request->hki;
        $data['nam_hoc']= $request->nam_hoc;
        $data['date_start']= $request->date_start;
        $data['date_end']= $request->date_end;
        $data['week_quantity']= $request->week_quantity;
        $data['schedule_status']= $request->schedule_status;
        Schedule::insert($data);

        $data3['week_quantity']= $request->week_quantity;
        
        $get = DB::table('tbl_schedule')->orderby('schedule_id','desc')->first();
        $get_id = $get->schedule_id;
        for ($i = 1; $i <= $data3['week_quantity']; $i++){
            $data2 =  array();
            $data2['schedule_id'] = $get_id;
            $data2['week'] = "Tuần ".$i;
            DB::table('tbl_detail_semester')->insert($data2); 
        }
        Session::put('message','Cập nhật học kì thành công');
        return Redirect()->back();
        
    }
    
    public function unactive_hoc_ki($schedule_id){
        $this->AuthLogin();
        DB::table('tbl_schedule')->where('schedule_id',$schedule_id)->update(['schedule_status'=>1]);
        Session::put('message','Ẩn học kì thành công');
        return redirect()->back();

    }
    public function active_hoc_ki($schedule_id){
        $this->AuthLogin();
        $get_schedule=Schedule::get();
        foreach ($get_schedule as $key =>$value)
        $get_status = $value->schedule_status;
       if($get_status==0){
        Session::put('message','Kích hoạt học kì không thành công, chỉ được kích hoạt 1 học kì');
        return redirect()->back();
       }
       else{
        DB::table('tbl_schedule')->where('schedule_id',$schedule_id)->update(['schedule_status'=>0]);
        Session::put('message','Kích hoạt học kì thành công');
        return redirect()->back();
       }
        
    }

    //---------------------- SUBJECT-----------------------
    public function manage_subject(){
        $this->AuthLogin();
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_subject = DB::table('tbl_subject')->get();
       
        $manager_subject = view('admin.schedule.manage_subject')->with('all_subject',$all_subject)->with('all_week',$all_week);
        return view ('admin_layout')->with('admin.manage_subject',$manager_subject);
    }
    public function insert_subject(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['subject_name']= $request->subject_name;
        $data['so_buoi']= $request->so_buoi;
        $data['ngay_bd']= $request->ngay_bd;
        $data['ngay_kt']= $request->ngay_kt;
        DB::table('tbl_subject')->insert($data); 
        Session::put('message','Thêm học phần thành công');
        return Redirect()->back();   
    }
    public function save_subject(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['subject_name']= $request->subject_name;

        DB::table('tbl_subject')->insert($data); 
        Session::put('message','Thêm học phần thành công');
        return Redirect()->back();   
    }
    public function save_subject_schedule (Request $request){
        $data= array();
        $data['hoc_ki']= $request->hoc_ki;
        $data['thu']= $request->thu;
        $data['week']= $request->week;
        $data['subject_name']= $request->subject_name;
        DB::table('tbl_ds_tkb')->insert($data); 
        Session::put('message','Đăng kí học phần thành công');
        return Redirect()->back();   
    }

}
