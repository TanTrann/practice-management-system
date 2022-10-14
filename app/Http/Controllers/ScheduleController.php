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
use App\Models\hocky;
use App\Models\hocphan;
use App\Models\lophp;
use App\Models\namhoc;
use App\Models\Nhomhp;
use App\Models\nhomth;
use App\Models\Software;
use App\Models\Subject;
use App\Models\suco;
use App\Models\Thu;
use Carbon\Carbon;
use TblNhomhp;
Use PDF;

class ScheduleController extends Controller
{

    public function AuthLogin(){
        $user_id = Session::get('user_id');
        $id_chucvu = Session::get('id_chucvu');
        if($user_id && $id_chucvu <> 1){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }
    public function print_tkb($detail_semester_id){

		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHTML($this->print_tkb_convert($detail_semester_id))
        ;
		
		return $pdf->stream();
	}
    public function print_tkb_convert($detail_semester_id){
        $get_tuan = DetailSemester::where('detail_semester_id', $detail_semester_id)->get();
        foreach($get_tuan as $key => $val_tuan){

        $get_schedule = $val_tuan -> schedule_id;
       
        $get_id_schedule = Schedule::where('Schedule_id',$get_schedule)->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_schedule.nam_hoc')->get();
        }
        $all_room = Room::get();
        $count_room = Room::count()+1;
        $all_thu = Thu::get();
        $all_buoi = Buoi::get();
        $cong = +1;
        $all_week = DetailSemester::where('detail_semester_id',$detail_semester_id)->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_dki_phong = DB::table('tbl_dki_phong')->join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_lophp','tbl_lophp.sttlophp','=','tbl_nhomth.sttlophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->get();


        
        $output= '';
       
        $output.='<style>body{
            font-family: DejaVu Sans, sans-serif;
		}
        
		</style>
        ';
        foreach($get_id_schedule as $key => $schedule){
        $output.='
        <h2  style="text-align: center;">LỊCH THỰC HÀNH</h2>
        <table style="font-size:13px;">
            <thead>
                <tr >
                    <td style="padding-right:10px;">Năm học: </td>
                    <th>'.$schedule->namhoc.'</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Học kỳ:</td>
                    <th>'.$schedule->hoc_ki.' </th>  
                </tr>
                <tr>
                    <td>Tuần:</td>
                    <th>'.$val_tuan->week.' </th>  
                </tr>

            </tbody>
        </table>
        ';
        }   
        $output.='
        <div class="tab-content tabs card-block" style="background-color: white;">  
        ';
        foreach ($all_week as $key => $week){
            $output.='
        <div class= " tab-pane" id="{{$week->detail_semester_id}}" role="tabpanel">  
        <table class=""  role="tabpanel" style="text-align: center;font-size:8px" border="1px">           
                                                        <thead style="" style="text-align: center;">
                                                            <tr style="text-align: center;"> 
                                                                <th rowspan="">Buổi</th>
                                                                <th>Phòng</th>
                                                            
        ';
        
                                                        foreach( $all_thu as $key => $thu){
                                                            $output.='
                                                                <th>'.$thu -> thu.'</th>
                                                            ';
                                                            }
                                                            $output.='
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;">
                                                            ';
                                                           
                                                            foreach( $all_buoi as $key => $buoi){
                                                            $output.='
                                                                <tr>
                                                                    <td rowspan="'.$count_room.'+1" name="buoi">'.$buoi-> buoi.'</td> 
                                                                </tr>
                                                            ';
                                                            
                                                                foreach ($all_room as $key=> $room){
                                                                $output.='
                                                                    <tr>
                                                                        <td name="phong" >
                                                                            '.$room->room_name.'
                                                                        </td> 
                                                                ';
                                                                
                                                               
                                                                        foreach( $all_thu as $key => $thu) {
                                                                            $output.='     
                                                                                    <td style="text-align: center;">
                                                                            ';
                                                                                    foreach( $all_dki_phong as $key => $dki) {
                                                                                                 
                                                                                // <!-- Dieu kien 1 --> 
                                                                                if($week->detail_semester_id == $dki->detail_semester_id ){
                                                                                        // <!-- Dieu kien 2 -->
                                                                                        if( $room->room_id == $dki->room_id ){ 
                                                                                                // <!-- Dieu kien 3 -->
                                                                                                if( $buoi->id_buoi == $dki->id_buoi){ 
                                                                                                    // <!-- Dieu kien 4 -->
                                                                                                    if( $thu->id_thu == $dki->id_thu){ 
                                                                                                        $output.='    
                                                                                                        <div class="thongtindki" style="background-color: white;text-align: center;">
                                                                                                                '.$dki -> mahp.' - '.$dki -> tenhp.' <br>
                                                                                                                Nhóm: '.$dki -> nhom_id.' <br>
                                                                                                             
                                                                                                            
                                                                                                        </div>
                                                                                                        ';
                                                                                                        }else{     
                                                                                                        
                                                                                                         }
                                                                                                    // <!-- End-Dieu kien 4 -->
                                                                                                     }else{ 
                                                                                                
                                                                                                     } 
                                                                                                // <!-- End-Dieu kien 3 -->
                                                                                                 }else{ 
                                                                                                
                                                                                                 } 
                                                                                            // <!-- End-Dieu kien 2 -->
                                                                                         }else{

                                                                                        } 
                                                                                    // <!-- End-Dieu kien 1 -->
                                                                                } 
                                                                                
                                                                          
                                                                         
                                                                                $output.='   
                                                                        
                                                                        </td>
                                                                        ';
                                                                       
                                                                         }
                                                                        $output.='     
                                                                       
                                                                    
                                                                    </tr>
                                                                    ';
                                                                        }
                                                                    }
                                                                
                                                                $output.='     

                                                        </tbody>
                                                    </table>  
                                                    </div>
                                                    ';
                                                }
                                    $output.='
                                                </div>
                                    ';
  return $output;

       
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
        $all_hocphan=hocphan::get();
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $ds_tkb = DB::table('tbl_ds_tkb')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_ds_tkb.hoc_ki')->get();
        $count_room=DB::table('tbl_room')->get()->count();
        $all_schedule = DB::table('tbl_schedule')->where('schedule_status','1')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_schedule.nam_hoc')->orderBy('schedule_id','desc')->paginate(1);
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();

        $all_room = DB::table('tbl_room')->orderby('room_id','asc')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $all_buoi = Buoi::get();
        $all_thu = Thu::get();
        $all_user = DB::table('tbl_user')->where('id_chucvu',1)->get();
        
        $all_dki_phong = DB::table('tbl_dki_phong')->join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_lophp','tbl_lophp.sttlophp','=','tbl_nhomth.sttlophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->get();
       
        $manager_schedule = view('admin.schedule.schedule_list')->with('all_user',$all_user)->with('all_hocphan',$all_hocphan)->with('all_dki_phong',$all_dki_phong)->with('all_buoi',$all_buoi)->with('all_thu',$all_thu)->with('all_schedule',$all_schedule)->with('all_week',$all_week)->with('all_room',$all_room)->with('all_subject',$all_subject)->with('count_room',$count_room)->with('hoc_ki',$hoc_ki)->with('ds_tkb',$ds_tkb);
        return view ('admin_layout')->with('admin.schedule_list',$manager_schedule);
    }
    public function list_schedule_admin(){
        $this->AuthLogin();
        $all_hocphan=hocphan::get();
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $ds_tkb = DB::table('tbl_ds_tkb')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_ds_tkb.hoc_ki')->get();
        $count_room=DB::table('tbl_room')->get()->count();
        $all_schedule = DB::table('tbl_schedule')->where('schedule_status','1')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_schedule.nam_hoc')->orderBy('schedule_id','desc')->paginate(1);
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_room = DB::table('tbl_room')->orderby('room_name','asc')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $all_buoi = Buoi::get();
        $all_thu = Thu::get();
        $all_user = DB::table('tbl_user')->where('id_chucvu',1)->get();
        $all_dki_phong = DB::table('tbl_dki_phong')->join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->get();
        $manager_schedule = view('admin.schedule.schedule_list_admin')->with('all_user',$all_user)->with('all_hocphan',$all_hocphan)->with('all_dki_phong',$all_dki_phong)->with('all_buoi',$all_buoi)->with('all_thu',$all_thu)->with('all_schedule',$all_schedule)->with('all_week',$all_week)->with('all_room',$all_room)->with('all_subject',$all_subject)->with('count_room',$count_room)->with('hoc_ki',$hoc_ki)->with('ds_tkb',$ds_tkb);
        return view ('admin_layout')->with('admin.schedule_list_admin',$manager_schedule);
    }

    public function manage_semester(){
        $this->AuthLogin();
        $all_schedule = DB::table('tbl_schedule')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_schedule.nam_hoc')->get();
        $all_namhoc = namhoc::get();
        $manager_semester = view('admin.schedule.manage_semester')->with('all_namhoc',$all_namhoc)->with('all_schedule',$all_schedule);
        return view ('admin_layout')->with('admin.manage_semester',$manager_semester);
    }











    //====================================NĂM HỌC==============================================
    public function manage_namhoc(){
        $this->AuthLogin();
        $all_namhoc = DB::table('tbl_namhoc')->get();
        $manager_namhoc = view('admin.namhoc.all_namhoc')->with('all_namhoc',$all_namhoc);
        return view ('admin_layout')->with('admin.namhoc.all_namhoc',$manager_namhoc);
    }
    public function insert_schedule(Request $request){
    
       
        $this->AuthLogin();
        $data =  array();
        $data= array();
        $data['hoc_ki']= $request->hki;
        $data['nam_hoc']= $request->nam_hoc;
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
        Session::put('message','Thêm học kì thành công');
        return Redirect()->back();
        
    }
    public function insert_namhoc(Request $request){
    
       
        $this->AuthLogin();
        
        $data= array();
       
        $data['namhoc']= $request->namhoc;
       
        DB::table('tbl_namhoc')->insert($data);
        Session::put('message','Thêm năm học thành công');
        return Redirect()->back();
        
    }
    public function update_schedule(Request $request){
        $this->AuthLogin();
        $data= array();
        $schedule_id=$request->schedule_id;
        $data['schedule_id']= $request->schedule_id;
        $data['nam_hoc']= $request->nam_hoc;
        $data['hoc_ki']= $request->hki;
        $data['week_quantity']= $request->week_quantity;
        $data['schedule_status']= $request->schedule_status;

        DB::table('tbl_schedule')->where('schedule_id',$schedule_id)->update($data); 
        
        Session::put('message','Cập nhật học kì thành công');
        return Redirect()->back();   
    }
    public function update_namhoc(Request $request){
        $this->AuthLogin();
        $data= array();
        $namhoc_id=$request->namhoc_id;
        
        $data['namhoc']= $request->namhoc;
       

        DB::table('tbl_namhoc')->where('namhoc_id',$namhoc_id)->update($data); 
        
        Session::put('message','Cập nhật năm học thành công');
        return Redirect()->back();   
    }
    
    public function unactive_hoc_ki($schedule_id){
        $this->AuthLogin();

        $get_status=DB::table('tbl_schedule')->where('schedule_status',1)->count();
     
        if($get_status == 1){
            Session::put('message','Lỗi kích hoạt học kỳ, chỉ được kích hoạt một học kì duy nhất');
            return redirect()->back();
        }
        else
        {
            DB::table('tbl_schedule')->where('schedule_id',$schedule_id)->update(['schedule_status'=>1]);
            Session::put('message','kích hoạt học kì thành công');
            return redirect()->back();
        }
       

    }
    public function active_hoc_ki($schedule_id){
        $this->AuthLogin();
        DB::table('tbl_schedule')->where('schedule_id',$schedule_id)->update(['schedule_status'=>0]);
        Session::put('message','Ẩn học kỳ thành công');
        return redirect()->back();
     
        
    
    }
    public function delete_schedule ($schedule_id){
        $this->AuthLogin();
        Schedule::where('schedule_id',$schedule_id)->delete();
        DetailSemester::where('schedule_id',$schedule_id)->delete();
        $get_schedule = DetailSemester::where('schedule_id',$schedule_id)->get();
        foreach($get_schedule as $key => $get_id)
        {
            $get_detail = $get_id -> detail_semester_id;
        
        Dkiphong::where('detail_semester_id',$get_detail)->delete();
        
    }
        Session::put('message','Xóa học kỳ thành công');
        return Redirect()->back();
    }

    
    public function show_edit_schedule (Request $request){
        $schedule_id = $request->schedule_id;
        $schedule_id = Schedule::find($schedule_id);
        $output['schedule_id'] = $schedule_id->schedule_id;
        $output['nam_hoc'] = $schedule_id->nam_hoc;
        $output['hoc_ki'] = $schedule_id->hoc_ki;
        $output['week_quantity'] = $schedule_id->week_quantity;
        $output['schedule_status'] = $schedule_id->schedule_status;

        echo json_encode($output);   
    }

    public function show_edit_namhoc (Request $request){
        $namhoc_id = $request->namhoc_id;
        $namhoc_id = namhoc::find($namhoc_id);
        $output['namhoc_id'] = $namhoc_id->namhoc_id;
        $output['namhoc'] = $namhoc_id->namhoc;
      

        echo json_encode($output);   
    }
    public function delete_namhoc ($namhoc_id){
        $this->AuthLogin();
        namhoc::where('namhoc_id',$namhoc_id)->delete();
        Session::put('message','Xóa năm học thành công');
        return Redirect()->back();
    }


    //Hoc ki -------------------------------------------------------------------------------------------
 
    public function manage_hocky(){
        $this->AuthLogin();
        $all_hocky = DB::table('tbl_hocky')->get();
        $manager_hocky = view('admin.hocky.manage_hocky')->with('all_hocky',$all_hocky);
        return view ('admin_layout')->with('admin.hocky.manage_hocky',$manager_hocky);
    }
   
    public function insert_hocky(Request $request){
    
       
        $this->AuthLogin();
        
        $data= array();
       
        $data['hocky']= $request->hocky;
       
        DB::table('tbl_hocky')->insert($data);
        Session::put('message','Thêm học kì thành công');
        return Redirect()->back();
        
    }
    
    public function update_hocky(Request $request){
        $this->AuthLogin();
        $data= array();
        $hocky_id=$request->hocky_id;
        
        $data['hocky']= $request->hocky;
       

        DB::table('tbl_hocky')->where('hocky_id',$hocky_id)->update($data); 
        
        Session::put('message','Cập nhật học kì thành công');
        return Redirect()->back();   
    }
    
    

    public function show_edit_hocky (Request $request){
        $hocky_id = $request->hocky_id;
        $hocky_id = hocky::find($hocky_id);
        $output['hocky_id'] = $hocky_id->hocky_id;
        $output['hocky'] = $hocky_id->hocky;
      

        echo json_encode($output);   
    }
    public function delete_hocky ($hocky_id){
        $this->AuthLogin();
        hocky::where('hocky_id',$hocky_id)->delete();
        Session::put('message','Xóa năm học thành công');
        return Redirect()->back();
    }
    // Học phần -------------------------------------------------------------------------------------------
 
    public function manage_hocphan(){
        $this->AuthLogin();
        $all_hocphan = DB::table('tbl_hocphan')->get();
        $manager_hocphan = view('admin.hocphan.manage_hocphan')->with('all_hocphan',$all_hocphan);
        return view ('admin_layout')->with('admin.hocphan.manage_hocphan',$manager_hocphan);
    }
   
    public function insert_hocphan(Request $request){
    
       
        $this->AuthLogin();
        
        $data= array();
       
        $data['mahp']= $request->mahp;
        $data['tenhp']= $request->tenhp;
        DB::table('tbl_hocphan')->insert($data);
        Session::put('message','Thêm học kì thành công');
        return Redirect()->back();
        
    }
    
    public function update_hocphan(Request $request){
        $this->AuthLogin();
        $data= array();
        $hocphan_id=$request->hocphan_id;
        
        
        $data['mahp']= $request->mahp;
        $data['tenhp']= $request->tenhp;
        $data2['mahp']= $request->mahp;
        $data2['tenhp']= $request->tenhp;

        DB::table('tbl_hocphan')->where('hocphan_id',$hocphan_id)->update($data); 
        
        Session::put('message','Cập nhật học kì thành công');
        return Redirect()->back();   
    }
    
    

    public function show_edit_hocphan (Request $request){
        $hocphan_id = $request->hocphan_id;
        $hocphan_id = hocphan::find($hocphan_id);
        $output['hocphan_id'] = $hocphan_id->hocphan_id;
        $output['mahp'] = $hocphan_id->mahp;
        $output['tenhp'] = $hocphan_id->tenhp;

        echo json_encode($output);   
    }
    public function delete_hocphan ($hocphan_id){
        $this->AuthLogin();
        hocphan::where('hocphan_id',$hocphan_id)->delete();
        Session::put('message','Xóa năm học thành công');
        return Redirect()->back();
    }


//===============================LỚP HỌC PHẦN=======================================================
public function manage_lophp(){
    $this->AuthLogin();
    $all_namhoc = DB::table('tbl_namhoc')->get();
    $all_lophp = DB::table('tbl_lophp')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_lophp.namhoc_lophp')->join('tbl_thu','tbl_thu.id_thu','=','tbl_lophp.thu_lophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_lophp.mahp_lophp')->join('tbl_hocky','tbl_hocky.hocky_id','=','tbl_lophp.hocky_lophp')->get();
    $all_hocky = DB::table('tbl_hocky')->get();
    $all_thu = DB::table('tbl_thu')->get();  
    $all_hocphan = DB::table('tbl_hocphan')->get();
    $all_user = DB::table('tbl_user')->where('id_chucvu',1)->get();
    $manager_lophp = view('admin.lophp.manage_lophp')->with('all_lophp',$all_lophp)->with('all_namhoc',$all_namhoc)->with('all_hocky',$all_hocky)->with('all_thu',$all_thu)->with('all_user',$all_user)->with('all_hocphan',$all_hocphan);
    return view ('admin_layout')->with('admin.lophp.manage_lophp',$manager_lophp);
}


public function show_edit_lophp (Request $request){
    $sttlophp = $request->sttlophp;
     $sttlophp2 = nhomth::find($sttlophp);
    $sttlophp = lophp::find($sttlophp);
    $output['sttlophp'] = $sttlophp->sttlophp;
    $output['hocky_lophp'] = $sttlophp->hocky_lophp;
    $output['namhoc_lophp'] = $sttlophp->namhoc_lophp;
    $output['mahp_lophp'] = $sttlophp->mahp_lophp;
    $output['tietbd_lophp'] = $sttlophp->tietbd_lophp;

    $output['sotiet_lophp'] = $sttlophp->sotiet_lophp;
    $output['thu_lophp'] = $sttlophp->thu_lophp;
    $output['macb_lophp'] = $sttlophp->macb_lophp;
    $output['status_lophp'] = $sttlophp->status_lophp;
    
    echo json_encode($output);   
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
    //     Session::put('message','Đăng ký học phần thành công');
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
        DB::table('tbl_nhomhp')->where('subject_id',$subject_id)->update($data); 
        Session::put('message','Cập nhật học phần thành công');
        return Redirect()->back();   
    }
    public function delete_subject ($subject_id){
        $this->AuthLogin();
        Subject::where('subject_id',$subject_id)->delete();
        Nhomhp::where('subject_id',$subject_id)->delete(); 
        
        
        Session::put('message','Xóa học phần thành công');
        return Redirect()->back();
    }

    
    // Phan cong =====================================================================================
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
    public function delete_phancong ($nhomhp_id){
        $this->AuthLogin();
        Nhomhp::where('nhomhp_id',$nhomhp_id)->delete();
        Session::put('message','Xóa nhóm học phần thành công');
        return Redirect()->back();
    }

    public function all_suco (){
        $all_suco = DB::table('tbl_suco')->join('tbl_room','tbl_room.room_id','=','tbl_suco.room_id')->join('tbl_user','tbl_user.user_id','=','tbl_suco.id_user')->get();
        $all_room = Room::get();
        $ngay_khac_phuc = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');

        $manager_schedule = view('admin.suco.all_suco')->with('ngay_khac_phuc',$ngay_khac_phuc)->with('all_room',$all_room)->with('all_suco',$all_suco);
        return view ('admin_layout')->with('admin.suco.all_suco',$manager_schedule);
    
    }
    public function show_update_suco (Request $request){
        $suco_id= $request->suco_id;
        $suco_id = suco::find($suco_id);
        $output['suco_id'] = $suco_id->suco_id;
        $output['noidung'] = $suco_id->noidung;    
        $output['trangthai'] = $suco_id->trangthai;      
        $output['noidungkhacphuc'] = $suco_id->noidungkhacphuc;      
        $output['ghichukhac'] = $suco_id->ghichukhac;      
        $output['ngayphananh'] = $suco_id->ngayphananh;      
        $output['ngaykhacphuc'] = $suco_id->ngaykhacphuc;      
        $output['id_user'] = $suco_id->id_user;      
        $output['room_id'] = $suco_id->room_id;      

        echo json_encode($output);
    }

    public function xu_ly_su_co(Request $request){
        $this->AuthLogin();
        $data= array();
        $suco_id=$request->suco_id;
        $data['suco_id']= $request->suco_id;
        
        $data['trangthai']= $request->trangthai;
        $data['noidungkhacphuc']= $request->noidungkhacphuc;
        $data['ghichukhac']= $request->ghichukhac;
        
        $data['ngaykhacphuc']= $request->ngaykhacphuc;
        $data['id_user']= $request->id_user;
  
        DB::table('tbl_suco')->where('suco_id',$suco_id)->update($data); 
        
        Session::put('message','Xử lý sự cố thành công');
        return Redirect()->back();   
    }
    public function edit_su_co(Request $request){
        $this->AuthLogin();
        $data= array();
        $suco_id=$request->suco_id;
        $data['suco_id']= $request->suco_id;
        $data['noidungkhacphuc']= $request->noidungkhacphuc;
        $data['ghichukhac']= $request->ghichukhac;
        $data['trangthai']= $request->trangthai;
        
        $data['ngaykhacphuc']= $request->ngaykhacphuc;
        $data['id_user']= $request->id_user;
  
        DB::table('tbl_suco')->where('suco_id',$suco_id)->update($data); 
        
        Session::put('message','Chỉnh sửa thông tin sự cố thành công');
        return Redirect()->back();   
    }

    
    //frontend ============================================================================================
    public function dang_nhap(){
        return view('pages.home');
    }
    public function tkb( Request $request){
        $hoc_ki = DB::table('tbl_schedule')->where('schedule_status','1')->get();
        $ds_tkb = DB::table('tbl_ds_tkb')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_ds_tkb.hoc_ki')->get();
        $count_room=DB::table('tbl_room')->get()->count();
        $all_schedule = DB::table('tbl_schedule')->where('schedule_status','1')->orderBy('schedule_id','desc')->join('tbl_namhoc','tbl_namhoc.namhoc_id','=','tbl_schedule.nam_hoc')->paginate(1);
        $all_week = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->get();
        $all_room = DB::table('tbl_room')->orderby('room_name','asc')->get();
        $all_subject = DB::table('tbl_subject')->get();
        $all_buoi = Buoi::get();
        $all_thu = Thu::get();
       
        
        $all_dki_phong = DB::table('tbl_dki_phong')->join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->join('tbl_lophp','tbl_lophp.sttlophp','=','tbl_nhomth.sttlophp')->join('tbl_user','tbl_user.user_id','=','tbl_lophp.macb_lophp')->get();
         
              
          
       

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
        $all_dki_phong = DB::table('tbl_dki_phong')->join('tbl_nhomth','tbl_nhomth.nhom_id','=','tbl_dki_phong.nhom_id')->join('tbl_user','tbl_user.user_id','=','tbl_dki_phong.id_user')->get();

        $all_subject_user = DB::table('tbl_nhomhp')->where('user_id',$user_id)->get()
        // ->dd()
        ;
        
        $get_subject_name = $all_subject_user->pluck('subject_id', 'subject_name')->unique()
        // ->dd()
        ;
        // dd($all_subject_user);
        $oneweek = DB::table('tbl_detail_semester')->where('schedule_status','1')->join('tbl_schedule','tbl_schedule.schedule_id','=','tbl_detail_semester.schedule_id')->paginate(1);
        $all_hocphan=hocphan::get();
        $all_buoi = Buoi::get();
        $all_thu = Thu::get();
        $manager_schedule = view('pages.dangkitkb')->with('all_hocphan',$all_hocphan)->with('get_subject_name',$get_subject_name)->with('oneweek',$oneweek)->with('all_software',$all_software)->with('all_schedule',$all_schedule)->with('all_week',$all_week)->with('all_room',$all_room)->with('all_subject',$all_subject)->with('all_subject_user',$all_subject_user)->with('count_room',$count_room)->with('hoc_ki',$hoc_ki)->with('ds_tkb',$ds_tkb)->with('all_thu',$all_thu)->with('all_buoi',$all_buoi)->with('all_dki_phong',$all_dki_phong);
       
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
    		if($data['action']=="mahp"){
                
                
                $hocky = Schedule::where('schedule_status','1')->get();
                foreach($hocky as $key => $hki){
                    $check_hki = $hki->hoc_ki;
                    $check_namhoc = $hki->nam_hoc;
              
                $select_lophp = nhomth::where('namhoc_lophp',$check_namhoc)->where('hocky_lophp',$check_hki)->where('mahp_lophp',$data['ma_id'])->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->get();
                }
    			$output.='<option>---Chọn nhóm học phần---</option>';
    			foreach($select_lophp as $key => $lophp){
    				$output.='<option value="'.$lophp->nhom_id.'">'.$lophp->nhom_id.'</option>';
    			}
                
    		}else{
                $hocky = Schedule::where('schedule_status','1')->get();
                foreach($hocky as $key => $hki){
                    $check_hki = $hki->hoc_ki       ;
                    $check_namhoc = $hki->nam_hoc;
                }
                $id = nhomth::where('namhoc_lophp',$check_namhoc)->where('hocky_lophp',$check_hki)->where('mahp_lophp',$data['ma_id'])->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->get();
                $output.='<option>---Chọn nhóm học phần---</option>';
                    foreach($id as $key => $id_hp){
                        $output.='<option value="'.$id_hp->nhom_id.'">'.$id_hp->nhom_id.'</option>';    
                    
                    } 
    		}
    		echo $output;
    	}
    }

    public function select_hocphan2(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="subject_name2"){
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
    public function select_namhoc(Request $request){
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="namhoc"){
                
                
                $hocky = Schedule::get();
               
                $select_lophp = nhomth::where('namhoc_lophp', $data['namhoc'])->join('tbl_nhomth','tbl_nhomth.namhoc_lophp','=','tbl_namhoc.namhoc_id')->get();               
    			$output.='<option>---Chọn hoc ky---</option>';
    			foreach($select_lophp as $key => $lophp){
    				$output.='<option value="'.$lophp->nhom_id.'">'.$lophp->nhom_id.'</option>';
    			}
                
    		}else{
                $hocky = Schedule::where('schedule_status','1')->get();
                foreach($hocky as $key => $hki){
                    $check_hki = $hki->hoc_ki       ;
                    $check_namhoc = $hki->nam_hoc;
                }
                $id = nhomth::where('namhoc_lophp',$check_namhoc)->where('hocky_lophp',$check_hki)->where('mahp_lophp',$data['ma_id'])->join('tbl_hocphan','tbl_hocphan.hocphan_id','=','tbl_nhomth.mahp_lophp')->get();
                $output.='<option>---Chọn nhóm học phần---</option>';
                    foreach($id as $key => $id_hp){
                        $output.='<option value="'.$id_hp->nhom_id.'">'.$id_hp->nhom_id.'</option>';    
                    
                    } 
    		}
    		echo $output;
    	}
    }

    public function dki_phong_th(Request $request){
            $data1 =  array();
            $data2 =  array();
          
            $data2['room_id']= $request->room_id;
            $data2['id_thu']= $request->id_thu;
            $data2['id_buoi']= $request->id_buoi;
            $data2['gio_bd']= $request->gio_bd;
            $data2['gio_kt']= $request->gio_kt;
            $data2['nhom_id']= $request->nhom;
            $data2['detail_semester_id'] = $request->detail_semester_id;
            DB::table('tbl_dki_phong')->insert($data2); 
            DB::table('tbl_nhomth')->where('nhom_id',$data2['nhom_id'])->update(['check_dki'=>1]);

        Session::put('message','Đăng ký phòng thực hành thành công');
        return Redirect()->back(); 
   
        
    }
    public function dki_phong_th_chieu(Request $request){
        
        $data2 =  array();
     
        $data2['room_id']= $request->room_id;
        $data2['id_thu']= $request->id_thu;
        $data2['id_buoi']= $request->id_buoi;
        $data2['gio_bd']= $request->gio_bdc;
        $data2['gio_kt']= $request->gio_ktc;
        $data2['nhom_id']= $request->nhom;
        
        $data2['detail_semester_id'] = $request->detail_semester_id;
        DB::table('tbl_dki_phong')->insert($data2); 
        DB::table('tbl_nhomth')->where('nhom_id',$data2['nhom_id'])->update(['check_dki'=>1]);

    Session::put('message','Đăng ký phòng thực hành thành công');
    return Redirect()->back(); 

    
    }
    public function dki_phong_th_toi(Request $request){
        
        $data2 =  array();
     
        $data2['room_id']= $request->room_id;
        $data2['id_thu']= $request->id_thu;
        $data2['id_buoi']= $request->id_buoi;
        $data2['gio_bd']= $request->gio_bdt;
        $data2['gio_kt']= $request->gio_ktt;
        $data2['nhom_id']= $request->nhom;
        $data2['detail_semester_id'] = $request->detail_semester_id;
        DB::table('tbl_dki_phong')->insert($data2); 
        DB::table('tbl_nhomth')->where('nhom_id',$data2['nhom_id'])->update(['check_dki'=>1]);

    Session::put('message','Đăng ký phòng thực hành thành công');
    return Redirect()->back(); 

    
    }
    public function dki_phong_th_all_hki(Request $request){
        $data= array();
        
       
        $data['detail_semester_id']= $request->detail_semester_id;
        
        $data['nhom_id']= $request->nhom_id;
        $data['room_id']= $request->room_id;
     
        $data['id_buoi']= $request->id_buoi;
        $check_sttlophp=nhomth::where('nhom_id',$data['nhom_id'])->get();
            foreach($check_sttlophp as $key => $val_stt){
                $get_stt = $val_stt -> sttlophp;
                $check_thu = lophp::where('sttlophp',$get_stt)->get();
                foreach($check_thu as $key => $thu){

                }
            }
          
            $data['id_thu'] = $thu -> thu_lophp;
        $check_dangki= DB::table('tbl_dki_phong')->where('id_thu',$data['id_thu'])->where('id_buoi',$data['id_buoi'])->where('id_thu',$data['id_thu'])->where('room_id',$data['room_id'])->count();
        if($check_dangki>=1)
        {
            Session::put('message','Lỗi đăng ký,Phòng đã được đăng ký.');
            return Redirect()->back(); 
        }
        else
        {

            $data1['nhom_id']= $request->nhom_id;
            $get_id_hky = nhomth::where('nhom_id',$data1['nhom_id'])->get();
            foreach($get_id_hky as $key => $id){
                $get_hky = $id -> hocky_lophp;
                $get_nhoc = $id -> namhoc_lophp;
            $check_tuan = Schedule::where('nam_hoc',$get_nhoc)->where('hoc_ki',$get_hky)->get();

            }
            foreach($check_tuan as $key => $tuan){
                    $get_tuan = $tuan -> schedule_id;
            }
          
           
         
            $get_tuan_dau= DB::table('tbl_detail_semester')->where('schedule_id',$get_tuan)->orderby('detail_semester_id','asc')->first();
            $get_tuan_dau_id = $get_tuan_dau->detail_semester_id;
            $get_tuan_cuoi= DB::table('tbl_detail_semester')->where('schedule_id',$get_tuan)->orderby('detail_semester_id','desc')->first();
            $get_tuan_cuoi_id = $get_tuan_cuoi->detail_semester_id;
    
        

        for ($i = $get_tuan_dau_id; $i <= $get_tuan_cuoi_id; $i++){
            $data2 =  array();
            $data2['room_id']= $request->room_id;
            $data2['nhom_id']= $request->nhom_id;
            $check_sttlophp=nhomth::where('nhom_id',$data2['nhom_id'])->get();
            foreach($check_sttlophp as $key => $val_stt){
                $get_stt = $val_stt -> sttlophp;
                $check_thu = lophp::where('sttlophp',$get_stt)->get();
                foreach($check_thu as $key => $thu){

                }
            }
          
            $data2['id_thu'] = $thu -> thu_lophp;

            $data2['id_buoi']= $request->id_buoi;
            $data2['gio_bd']= $request->gio_bd;
            $data2['gio_kt']= $request->gio_kt;
            $data2['detail_semester_id'] = $i;
            $data4=array();
            $data4['sttphong']=$request->room_id;
            DB::table('tbl_dki_phong')->insert($data2); 
            DB::table('tbl_nhomth')->where('nhom_id',$data2['nhom_id'])->update(['check_dki'=>1]);
            DB::table('tbl_nhomth')->where('nhom_id',$data2['nhom_id'])->update($data4);
            
            Session::put('message','Đăng ký phòng thực hành thành công');
        
          
        
        }
        }
       

        
        return Redirect()->back(); 
   
        
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
        $this->AuthLogin();
      
    
        
        $all_dki_phong= Dkiphong::where('dki_phong_id',$dki_phong_id)->get();   
                    foreach( $all_dki_phong as $key =>$value ){
                    $get_id=$value->nhom_id;
                    $dem_dki_phong= Dkiphong::where('nhom_id',$get_id)->count();
                   
                }
        if($dem_dki_phong == 1){
            
            Dkiphong::where('dki_phong_id',$dki_phong_id)->delete();
            nhomth::where('nhom_id',$get_id)->update(['check_dki'=>0]);
            Session::put('message','Xóa nhóm đăng ký thành công');
            return Redirect()->back();
        }else{
            Dkiphong::where('dki_phong_id',$dki_phong_id)->delete();
            Session::put('message','Xóa nhóm đăng ký thành công');
            return Redirect()->back();
        }
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
        Session::put('message','Xóa nhóm all đăng ký thành công');
        return Redirect()->back();
    }
    public function huy_all_nhomhp ($nhomhp_id){
        $this->AuthLogin();
        Dkiphong::where('nhomhp_id',$nhomhp_id)->delete();
       
        
        Nhomhp::where('nhomhp_id',$nhomhp_id)->update(['nhomhp_status'=>0]);
        Session::put('message','Hủy nhóm học phần đã đăng ký thành công');
        return Redirect()->back();
    }

    public function su_co(){
        $this->AuthLoginUser();

        $all_room = Room::get();
        $all_suco = DB::table('tbl_suco')->join('tbl_room','tbl_room.room_id','=','tbl_suco.room_id')->join('tbl_user','tbl_user.user_id','=','tbl_suco.id_user')->get();
        $ngay_phan_anh = Carbon::now('Asia/Ho_Chi_Minh')->format('d/m/Y');
        $manager_schedule = view('pages.suco')->with('all_room',$all_room)->with('ngay_phan_anh',$ngay_phan_anh)->with('all_suco',$all_suco);
        return view ('welcome')->with('admin.schedule_list',$manager_schedule);
    }
    public function bao_cao_su_co(request $request){
        $data =  array();

        $data['noidung']= $request->noidung;
        $data['trangthai']= $request->trangthai;
        $data['noidungkhacphuc']= $request->noidungkhacphuc;
        $data['ghichukhac']= $request->ghichukhac;
        $data['ngayphananh']= $request->ngayphananh;
        $data['ngaykhacphuc']= $request->ngaykhacphuc;
        $data['id_user']= $request->id_user;
        $data['room_id']= $request->room_id;

        DB::table('tbl_suco')->insert($data); 

        Session::put('message','Báo cáo sự cố thành công');
        return Redirect()->back();
    }
    public function delete_suco($suco_id){
        DB::table('tbl_suco')->where('suco_id',$suco_id)->delete(); 
        Session::put('message','Xóa báo cáo thành công');
        return Redirect()->back();
    }
    public function all_tuan(){
            $all_tuan = DB::table('tbl_tuan')->get();
            $manager_tuan = view('admin.tuan.all_tuan')->with('all_tuan',$all_tuan);
            return view ('admin_layout')->with('admin.tuan.all_tuan',$manager_tuan);
    }
    public function insert_tuan(Request $Request){
        $this->AuthLogin();
        $data =  array();
        $data['tuan']= $Request->tuan;
        
        DB::table('tbl_tuan')->insert($data);
       
        Session::put('message','Thêm tuan thành công');
        return Redirect()->back();
    }
    public function delete_tuan($tuan_id){
        $this->AuthLogin();
        
        DB::table('tbl_tuan')->where('tuan_id',$tuan_id)->delete();
       
        Session::put('message','Xoas tuan thành công');
        return Redirect()->back();
    }
}
