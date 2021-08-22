<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomDetails;
use App\Models\Software;
use App\Models\Version;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\support\facades\redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class RoomController extends Controller
{   
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }

    public function all_room(){
        $this->AuthLogin();
        $all_room = DB::table('tbl_room')->get();
        $all_software = Software::get();
        
        $manager_room = view('admin.room.all_room')->with('all_room',$all_room)->with('all_software',$all_software);
        return view ('admin_layout')->with('admin.room.all_room',$manager_room);
    }

    public function save_room(Request $Request){
        $this->AuthLogin();
        $data =  array();
        $data['room_name']= $Request->room_name;
        $data['pc_quantity']= $Request->pc_quantity;
        
        DB::table('tbl_room')->insert($data);
        Session::put('message','Thêm phòng thành công');
        return Redirect()->back();
    }

    public function add_product(){
        $this->AuthLogin();
        return Redirect()->back();   
    }

    public function delete_room($room_id){
        $this->AuthLogin();
        DB::table('tbl_room')->where('room_id',$room_id)->delete();
        Session::put('message','Xóa room thành công');
        return Redirect('all-room');
    }

    public function update_room(Request $Request){
        $data =  array();
        $room_id=$Request->room_id;
        $data['room_name']= $Request->room_name;
        $data['pc_quantity']= $Request->pc_quantity; 
        DB::table('tbl_room')->where('room_id', $room_id)->update($data);
        Session::put('message','Cập nhật phòng thành công');
        return Redirect()->back();
    }

    public function show_edit_room (Request $request){
        $room_id = $request->room_id;
        $room = Room::find($room_id);
        $output['room_name'] = $room->room_name;
        $output['room_id'] = $room->room_id;
        $output['pc_quantity'] = $room->pc_quantity;
        echo json_encode($output);   
    }

   

    public function room_detail($room_id){
        $this->AuthLogin();
        $count_software=  RoomDetails::where('room_id',$room_id)->get()->count();
        $room_detail = DB::table('tbl_room')->where('room_id',$room_id)->get();
        $all_software = Software::get();
        $ver_detail = DB::table('tbl_room_details')->where('room_id',$room_id)->join('tbl_version','tbl_version.version_id','=','tbl_room_details.version_id')
        ->join('tbl_software','tbl_software.software_id','=','tbl_version.software_id')->select('tbl_software.*','tbl_version.*','tbl_room_details.*')
        ->get();
        
        $manager_room  = view('admin.room.room_detail')->with('count_software',$count_software)->with('room_detail',$room_detail)->with('all_software',$all_software)->with('ver_detail',$ver_detail);
        return view('admin_layout')->with('admin.edit_room', $manager_room);
    }

    public function select_software(Request $request){
        $this->AuthLogin();
    	$data = $request->all();
    	if($data['action']){
    		$output = '';
    		if($data['action']=="software_name"){
                $select_version = Version::where('software_id',$data['ma_id'])->orderby('version_number','ASC')->get();
    			$output.='<option>---Chọn phiên bản---</option>';
    			foreach($select_version as $key => $soft){
    				$output.='<option value="'.$soft->version_id.'">'.$soft->version_number.'</option>';
    			}
              
    		}else{

               
                $id = Version::where('version_id',$data['ma_id'])->orderby('version_number','ASC')->get();
    			
                    foreach($id as $key => $soft){
                        $output.='<option value="'.$soft->version_id.'">'.$soft->version_id.'</option>';    
                    
                    } 
    		}
    		echo $output;
    	}
    	
    }

    public function save_software_room(Request $request){
        $this->AuthLogin();
		$data = $request->all();
		$details = new RoomDetails();
		$details->room_id = $data['room_id'];
		$details->version_id = $data['version_id'];		

		$details->save();
        Session::put('message','Thêm phần mềm thành công');
        return Redirect()->back();
	}
    

}
