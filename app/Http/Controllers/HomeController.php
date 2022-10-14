<?php

namespace App\Http\Controllers;

use App\Models\Buoi;
use App\Models\Dkiphong;
use App\Models\nhomth;
use App\Models\RoomDetails;
use App\Models\Software;
use App\Models\Version;
use App\Models\Room;
use App\Models\Schedule;
use App\Models\Thu;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{   
    public function index(){
        return view('pages.home');
    }
    public function AuthLoginUser(){
        $user_id = Session::get('user_id');
        $id_chucvu = Session::get('id_chucvu');
        if($user_id && $id_chucvu == 1){
            return Redirect('trang-chu');
        }else{
            return Redirect('dang-nhap')->send();
        }
    }

    public function my_calendar( Request $request ){
        $this->AuthLoginUser();
        $get_user_id = Session::get('user_id');
        $get_user_name = DB::table('tbl_user')->where('user_id',$get_user_id)->get();
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $all_cal = DB::table('tbl_nhomth')->join('tbl_lophp','tbl_lophp.sttlophp','=','tbl_nhomth.sttlophp')->where('macb_lophp', $get_user_id)->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_nhomth.hocky_lophp')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_nhomth.namhoc_lophp')->join('tbl_software','tbl_software.software_id','=','tbl_nhomth.ycpm')->get();
        $cal=DB::table('tbl_nhomth')->get();
        $get_nhomth = DB::table('tbl_nhomth')->get();
        $all_nhom=DB::table('tbl_nhomth')->join('tbl_room','tbl_room.room_id','=','tbl_nhomth.sttphong')->get();

        $lk_tuan= Dkiphong::join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_detail_semester','tbl_detail_semester.detail_semester_id','=','tbl_dki_phong.detail_semester_id')->join('tbl_tuan','tbl_tuan.tuan','=','tbl_detail_semester.week')->get();
        $count_cal = DB::table('tbl_dki_phong')->get()->count('nhom_id');
        $manager_calendar = view('pages.mycalendar')->with('all_nhom',$all_nhom)->with('lk_tuan',$lk_tuan)->with('get_nhomth',$get_nhomth)->with('count_cal',$count_cal)->with('all_cal',$all_cal)->with('get_user_name',$get_user_name);
        return view('welcome')->with('manager_calendar',$manager_calendar);
    }
    public function search(Request $request){
       
        $this->AuthLoginUser();
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $ds_tkb = DB::table('tbl_ds_tkb')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_ds_tkb.hoc_ki')->get();
       
        $all_schedule = DB::table('tbl_schedule')->where('schedule_status','1')->orderBy('schedule_id','desc')->paginate(1);
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_room = DB::table('tbl_room')->orderby('room_name','asc')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $user_id = Session::get('user_id');
        $all_software = DB::table('tbl_software')->orderBy('software_id','DESC')->get();
        $all_dki_phong = DB::table('tbl_dki_phong')->join('tbl_nhomhp','tbl_nhomhp.nhomhp_id','=','tbl_dki_phong.nhomhp_id')->join('tbl_user','tbl_user.user_id','=','tbl_dki_phong.id_user')->get();

        $all_subject_user = DB::table('tbl_nhomhp')->where('user_id',$user_id)->get()
        // ->dd()
        ;
        
        $get_subject_name = $all_subject_user->pluck('subject_id', 'subject_name')->unique()
        // ->dd()
        ;
        // dd($all_subject_user);
        $oneweek = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->paginate(1);
        
        $all_buoi = Buoi::get();
        $all_thu = Thu::get();
        $data =  array();
        $data['software_id'] = $request->software_id;
        $data['version_number'] = $request->version_number;
        
        $data['room_quantity'] = $request->room_quantity;
        $data['cpu'] = $request->cpu;
        $check_soft = Version::where('software_id',  $data['software_id'])->where('version_id',  $data['version_number'])->get();
        
       
        $check_room_quan = Room::where('pc_quantity','>=',$data['room_quantity'])->where('cpu','like','%'. $data['cpu'].'%')->get();
        foreach($check_room_quan as $quan){

            foreach($check_soft as $soft)
            {
                $id_soft = $soft->version_id;
                $id_room = $quan->room_id;
                $check_all = RoomDetails::where('room_id',$id_room)->where('version_id',$id_soft);
                foreach ($check_all as $check_room){
                    $id_room= $check_room->room_id;
                    $r_name = Room::where('room_id',$id_room);
                    if( $r_name == false){
                        return view('pages.dangkitkb');
                    }
                    $r_name = Room::where('room_id',$id_room)->get();
                }
            }
        }
        $count_room_search=DB::table('tbl_room')->where('room_id',$id_room)->get()->count();
     dd($id_room);

        return view('pages.search')->with('r_name',$r_name)->with('check_all',$check_all)->with('check_room_quan',$check_room_quan)->with('get_subject_name',$get_subject_name)->with('oneweek',$oneweek)->with('all_software',$all_software)->with('all_schedule',$all_schedule)->with('all_week',$all_week)->with('all_room',$all_room)->with('all_subject',$all_subject)->with('all_subject_user',$all_subject_user)->with('count_room_search',$count_room_search)->with('hoc_ki',$hoc_ki)->with('ds_tkb',$ds_tkb)->with('all_thu',$all_thu)->with('all_buoi',$all_buoi)->with('all_dki_phong',$all_dki_phong);

    }
}
