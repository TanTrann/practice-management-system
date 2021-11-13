<?php

namespace App\Http\Controllers;

use App\Models\Buoi;
use App\Models\Room;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

// Model
use App\Models\Schedule;
use App\Models\DetailSemester;
use App\Models\Dkiphong;
use App\Models\Nhomhp;
use App\Models\Subject;
use App\Models\Thu;
use TblNhomhp;

class ScheduleController extends Controller
{
    public function AuthLogin(){
        $user_id = Session::get('user_id');
        $id_chucvu = Session::get('id_chucvu');
        if($user_id && $id_chucvu == 0){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
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

    public function list_schedule(){
        $this->AuthLogin();
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $ds_tkb = DB::table('tbl_ds_tkb')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_ds_tkb.hoc_ki')->get();
        $count_room=DB::table('tbl_room')->get()->count();
        $all_schedule = DB::table('tbl_schedule')->where('schedule_status','1')->orderBy('schedule_id','desc')->paginate(1);
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_room = DB::table('tbl_room')->orderby('room_name','asc')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $all_buoi = Buoi::get();
        $all_thu = Thu::get();
        $all_dki_phong = DB::table('tbl_dki_phong')->join('tbl_nhomhp','tbl_nhomhp.nhomhp_id','=','tbl_dki_phong.nhomhp_id')->join('tbl_user','tbl_user.user_id','=','tbl_dki_phong.id_user')->get();
        $manager_schedule = view('admin.schedule.schedule_list')->with('all_dki_phong',$all_dki_phong)->with('all_buoi',$all_buoi)->with('all_thu',$all_thu)->with('all_schedule',$all_schedule)->with('all_week',$all_week)->with('all_room',$all_room)->with('all_subject',$all_subject)->with('count_room',$count_room)->with('hoc_ki',$hoc_ki)->with('ds_tkb',$ds_tkb);
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
        Session::put('message','Kích hoạt học kì thành công');
        return redirect()->back();

    }
    public function active_hoc_ki($schedule_id){
        $this->AuthLogin();
        DB::table('tbl_schedule')->where('schedule_id',$schedule_id)->update(['schedule_status'=>0]);
        Session::put('message','Ẩn học kì thành công');
        return redirect()->back();
     
        
    
    }

    //---------------------- SUBJECT-----------------------
    public function manage_subject(){
        $this->AuthLogin();
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $all_user = DB::table('tbl_user')->where('id_chucvu',1)->get();
        $manager_subject = view('admin.schedule.manage_subject')->with('all_subject',$all_subject)->with('all_week',$all_week)->with('all_user',$all_user);
        return view ('admin_layout')->with('admin.manage_subject',$manager_subject);
    }
    public function insert_subject(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['subject_name']= $request->subject_name;
        $data['mahocphan']= $request->mahocphan;
        DB::table('tbl_subject')->insert($data); 
        Session::put('message','Thêm học phần thành công');
        return Redirect()->back();   
    }
    // public function save_subject(Request $request){
    //     $this->AuthLogin();
    //     $data= array();
    //     $data['subject_name']= $request->subject_name;

    //     DB::table('tbl_subject')->insert($data); 
    //     Session::put('message','Thêm học phần thành công');
    //     return Redirect()->back();   
    // }
    // public function save_subject_schedule (Request $request){
    //     $data= array();
    //     $data['hoc_ki']= $request->hoc_ki;
    //     $data['thu']= $request->thu;
    //     $data['week']= $request->week;
    //     $data['subject_name']= $request->subject_name;
    //     DB::table('tbl_ds_tkb')->insert($data); 
    //     Session::put('message','Đăng kí học phần thành công');
    //     return Redirect()->back();   
    // }
    public function show_edit_subject (Request $request){
        $subject_id = $request->subject_id;
        $subject_id = Subject::find($subject_id);
        $output['subject_id'] = $subject_id->subject_id;
        $output['subject_name'] = $subject_id->subject_name;
        $output['mahocphan'] = $subject_id->mahocphan;
        echo json_encode($output);   
    }
    public function update_subject(Request $request){
        $this->AuthLogin();
        $data= array();
        $subject_id=$request->subject_id;
        $data['subject_name']= $request->subject_name;
        $data['mahocphan']= $request->mahocphan;
        DB::table('tbl_subject')->where('subject_id',$subject_id)->update($data); 
        Session::put('message','Cập nhật học phần thành công');
        return Redirect()->back();   
    }
    public function phan_cong(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['subject_name']= $request->subject_name;
        $data['nhom']= $request->nhom;
        DB::table('tbl_subject')->insert($data); 
        Session::put('message','Thêm học phần thành công');
        return Redirect()->back();   
    }
    public function qli_phan_cong($subject_id){
        $this->AuthLogin();
        $all_nhomhp = DB::table('tbl_nhomhp')->where('subject_id',$subject_id)->join('tbl_user','tbl_user.user_id','=','tbl_nhomhp.user_id')->get();
        $all_subject = DB::table('tbl_subject')->where('subject_id',$subject_id)->get();
        $all_user = DB::table('tbl_user')->where('id_chucvu',1)->get();
        return view('admin.schedule.qli_phan_cong')->with('all_user',$all_user)->with('all_subject',$all_subject)->with('all_nhomhp',$all_nhomhp);  
    }
    public function insert_nhomhp(Request $request){
        $this->AuthLogin();
        $data= array();
        $data['user_id']= $request->user_id;
        $data['subject_id']= $request->subject_id;
        $data['mahocphan']= $request->mahocphan;
        $data['subject_name']= $request->subject_name;
        $data['soluong']= $request->soluong;
        $data['nhomhp_status']= $request->nhomhp_status;
        $data['nhom']= $request->nhom;
        DB::table('tbl_nhomhp')->insert($data); 
        Session::put('message','Thêm nhóm học phần thành công');
        return Redirect()->back();   
    }
    public function show_edit_phancong (Request $request){
        $nhomhp_id= $request->nhomhp_id;
        $nhomhp_id = Nhomhp::find($nhomhp_id);
        $output['user_id'] = $nhomhp_id->user_id;
        $output['subject_name'] = $nhomhp_id->subject_name;    
        $output['mahocphan'] = $nhomhp_id->mahocphan;      
        $output['soluong'] = $nhomhp_id->soluong;      
        $output['nhom'] = $nhomhp_id->nhom;      
        echo json_encode($output);
    }

    //frontend ============================================================================================
    public function dang_nhap(){
        return view('pages.home');
    }
    public function tkb( Request $request){
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $ds_tkb = DB::table('tbl_ds_tkb')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_ds_tkb.hoc_ki')->get();
        $count_room=DB::table('tbl_room')->get()->count();
        $all_schedule = DB::table('tbl_schedule')->where('schedule_status','1')->orderBy('schedule_id','desc')->paginate(1);
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_room = DB::table('tbl_room')->orderby('room_name','asc')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $all_buoi = Buoi::get();
        $all_thu = Thu::get();
       
        
        $all_dki_phong = DB::table('tbl_dki_phong')->join('tbl_nhomhp','tbl_nhomhp.nhomhp_id','=','tbl_dki_phong.nhomhp_id')->join('tbl_user','tbl_user.user_id','=','tbl_dki_phong.id_user')->get();
         
              
          
       

        $manager_schedule = view('pages.tkb')->with('all_schedule',$all_schedule)->with('all_week',$all_week)->with('all_room',$all_room)->with('all_subject',$all_subject)->with('count_room',$count_room)->with('hoc_ki',$hoc_ki)->with('ds_tkb',$ds_tkb)->with('all_thu',$all_thu)->with('all_buoi',$all_buoi)->with('all_dki_phong',$all_dki_phong);
        return view ('welcome')->with('pages.tkb',$manager_schedule);
    }

    public function dangki_tkb(){
        $this->AuthLoginUser();
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $ds_tkb = DB::table('tbl_ds_tkb')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_ds_tkb.hoc_ki')->get();
        $count_room=DB::table('tbl_room')->get()->count();
        $all_schedule = DB::table('tbl_schedule')->where('schedule_status','1')->orderBy('schedule_id','desc')->paginate(1);
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_room = DB::table('tbl_room')->orderby('room_name','asc')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $user_id = Session::get('user_id');
        $all_software = DB::table('tbl_software')->orderBy('software_id','DESC')->get();

        $all_subject_user = DB::table('tbl_nhomhp')->where('user_id',$user_id)->get()
        // ->dd()
        ;
      
        $get_subject_name = $all_subject_user->pluck('subject_id', 'subject_name')->unique()
        // ->dd()
        ;
        // dd($all_subject_user);
      
        
        $all_buoi = Buoi::get();
        $all_thu = Thu::get();
        $all_dki_phong= Dkiphong::get();
        $manager_schedule = view('pages.dangkitkb')->with('get_subject_name',$get_subject_name)->with('all_software',$all_software)->with('all_schedule',$all_schedule)->with('all_week',$all_week)->with('all_room',$all_room)->with('all_subject',$all_subject)->with('all_subject_user',$all_subject_user)->with('count_room',$count_room)->with('hoc_ki',$hoc_ki)->with('ds_tkb',$ds_tkb)->with('all_thu',$all_thu)->with('all_buoi',$all_buoi)->with('all_dki_phong',$all_dki_phong);
       
        return view ('welcome')->with('pages.dangkitkb',$manager_schedule);
    }
    public function dang_ki_phong(Request $request ){
        $room_id= $request->room_id;
        $room_id = Room::find($room_id);
        $output['room_id'] = $room_id->room_id;
        $output['room_name'] = $room_id->room_name;    
       
        $detail_semester_id = $request->detail_semester_id ;
        $detail_semester_id  = DetailSemester::find($detail_semester_id ); 
        $output['detail_semester_id'] = $detail_semester_id->detail_semester_id; 
        $output['week'] = $detail_semester_id->week; 

        $id_buoi = $request->id_buoi ;
        $id_buoi  = Buoi::find($id_buoi); 
        $output['id_buoi'] = $id_buoi->id_buoi; 
        $output['buoi'] = $id_buoi->buoi; 

        $id_thu = $request->id_thu ;
        $id_thu  = Thu::find($id_thu); 
        $output['id_thu'] = $id_thu->id_thu; 
        $output['thu'] = $id_thu->thu; 

        echo json_encode($output);
    }

    public function select_hocphan(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="subject_name"){
                $user_id = Session::get('user_id');
                $select_nhomhp = Nhomhp::where('subject_id',$data['ma_id'])->where('user_id',$user_id)->orderby('nhom','ASC')->get();
    			$output.='<option>---Chọn nhóm học phần---</option>';
    			foreach($select_nhomhp as $key => $nhomhp){
    				$output.='<option value="'.$nhomhp->nhomhp_id.'">'.$nhomhp->nhom.'</option>';
    			}
              
    		}else{
                $user_id = Session::get('user_id');
                $id = Nhomhp::where('nhomhp_id',$data['ma_id'])->where('user_id',$user_id)->get();
    			
                    foreach($id as $key => $id_hp){
                        $output.='<option value="'.$id_hp->nhomhp_id.'">'.$id_hp->nhomhp_id.'</option>';    
                    
                    } 
    		}
    		echo $output;
    	}
    }

    public function dki_phong_th(Request $request){
        $data= array();
        
       
        $data['detail_semester_id']= $request->detail_semester_id;
        
        $data['nhomhp_id']= $request->nhomhp_id;

        $nhomhp_check = DB::table('tbl_nhomhp')->where('nhomhp_id',$data['nhomhp_id'])->get(); 
      
        if ($nhomhp_check->nhomhp_status = 1 ){
            Session::put('message','Học phần này đã được đăng kí, Vui lòng xem lại trong lịch của bạn');
            return Redirect()->back();   


        } else {
            $get_tuan_hki = DB::table('tbl_detail_semester')->where('detail_semester_id',$data['detail_semester_id'])->orderby('detail_semester_id','desc')->first();
            $id_hki = $get_tuan_hki->schedule_id;
            $get_tuan_dau= DB::table('tbl_detail_semester')->where('schedule_id',$id_hki)->orderby('detail_semester_id','asc')->first();
            $get_tuan_dau_id = $get_tuan_dau->detail_semester_id;
            $get_tuan_cuoi= DB::table('tbl_detail_semester')->where('schedule_id',$id_hki)->orderby('detail_semester_id','desc')->first();
            $get_tuan_cuoi_id = $get_tuan_cuoi->detail_semester_id;
        
        

        for ($i = $get_tuan_dau_id; $i <= $get_tuan_cuoi_id; $i++){
            $data2 =  array();
            $data2['id_user']= $request->id_user;
            $data2['room_id']= $request->room_id;
            $data2['id_thu']= $request->id_thu;
            $data2['id_buoi']= $request->id_buoi;
            $data2['nhomhp_id']= $request->nhomhp_id;
            $data2['detail_semester_id'] = $i;
            DB::table('tbl_dki_phong')->insert($data2); 
            DB::table('tbl_nhomhp')->where('nhomhp_id',$data2['nhomhp_id'])->update(['nhomhp_status'=>1]);
            Session::put('message','Đăng ký phòng thực hành thành công');
            return Redirect()->back();   
        }
        
      
        
        }

      
        
    }
    public function load_tkb(Request $request ){
        // $room_id= $request->room_id;
        // $room_id = Dkiphong::find($room_id);
        // $output['room_id'] = $room_id->room_id;
        // $output['room_name'] = $room_id->room_name;    
       
        $detail_semester_id = $request->detail_semester_id ;
        $detail_semester_id  = DetailSemester::find($detail_semester_id ); 
        $output['detail_semester_id'] = $detail_semester_id->detail_semester_id; 
        $output['week'] = $detail_semester_id->week; 
    

        // $id_buoi = $request->id_buoi ;
        // $id_buoi  = Dkiphong::find($id_buoi); 
        // $output['id_buoi'] = $id_buoi->id_buoi; 
        // $output['buoi'] = $id_buoi->buoi; 

        // $id_thu = $request->id_thu ;
        // $id_thu  = Dkiphong::find($id_thu); 
        // $output['id_thu'] = $id_thu->id_thu; 
        // $output['thu'] = $id_thu->thu; 

        echo json_encode($output);
    }

    public function delete_nhomhp ($dki_phong_id){
        $this->AuthLoginUser();
        Dkiphong::where('dki_phong_id',$dki_phong_id)->delete();
        Session::put('message','Xóa nhóm đăng kí thành công');
        return Redirect()->back();
    }
    public function delete_all_nhomhp ($dki_phong_id){
        $this->AuthLoginUser();
        $get_dki = Dkiphong::where('dki_phong_id',$dki_phong_id)->get();
        foreach ( $get_dki as $key => $get){
            $get_buoi = $get->id_buoi;
            $get_thu  = $get->id_thu;
            $get_user  = $get->id_user;
            $get_nhomhp_id = $get->nhomhp_id;
          
        Dkiphong::where('dki_phong_id',$dki_phong_id)->where('id_user',$get_user)->where('id_thu',$get_thu)->where('id_buoi',$get_buoi)->where('nhomhp_id',$get_nhomhp_id)->delete();
           
        }
        Session::put('message','Xóa nhóm all đăng kí thành công');
        return Redirect()->back();
    }
}
