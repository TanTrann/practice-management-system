@section('admin_content')
@extends('admin_layout')
  <!-- Material tab card start -->
  <div class="pcoded-inner-content">

    <div class="card">
    <div class="pcoded-inner-content"><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add-room" style="float: right;">Thêm phòng</button>    <div class="card-header-left">
        <div class="card-header">
                                <h3>Quản lí phòng</h3>
                                <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                            </div>
        <?php
            $message = Session::get('message');
            if ($message){
            echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                Session::put('message',null);
                }
        ?>
    <div class="card-block">
        <div class="row">
        @foreach($all_room as $key => $room)
            <div class="col-lg-4 col-xl-3 col-sm-6">
              
                <div class="badge-box ">
                    <div class="sub-title">{{$room->room_name}} 
                        <a href="{{URL::to('/delete-room/'.$room->room_id)}}" style="float: right;">
                        <button onclick="return confirm('Bạn có chắc là muốn xóa phòng này?')"  type="submit" name="delete_room" style="padding-top: 5px;padding-right: 5px; margin-top: -5px;">
                            <i class="ti-trash" style="color:red;padding-top: 11px;"></i>
                        </button>
                    </a>
                    </div>
                    <div> 
                   <p style="text-align: center;"> <i class="ti-desktop" style="font-size: 103px"></i></p>
                    <p style="font-size: 14px;">Tổng số: <label class="badge badge-warning"style="font-size: 14px;">{{$room->pc_quantity}}</label> máy tính</p>
                        
                    </div>
                    <div style="text-decoration: flex;">
                    
                    <button class="btn btn-primary btn-icon showeditroom " data-toggle="modal" data-target="#showeditroom"    data-id_room="{{$room->room_id}}" ><i class="ti-pencil " ></i></button>
                    <a href="{{URL::to('/room-detail/'.$room->room_id)}}">
                    <button class="btn btn-primary btn-round" style="float:right;">Chi tiết</button>
                    </a>
                    </div>
                </div>
                
            </div>
            @endforeach
    </div>
</div>

           
                        <!-- Modal thêm phòng-->
   <div class="modal fade" id="add-room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title data_service_quickview_title" id="">
                                <Strong>Thêm phòng    </Strong>           
                <span id="data_service_quickview_title"></span>
                
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL::to('save-room')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tên phòng:</label>
                            <div class="col-sm-10">
                                <input name="room_name" type="text" class="form-control"
                                placeholder="Nhập tên phòng">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Số lượng máy:</label>
                            <div class="col-sm-10">
                                <input name="pc_quantity" type="text" class="form-control"
                                placeholder="Nhập số lượng">
                            </div>
                        </div>
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="add-room">Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phòng-->
                         <!-- Modal show edit room-->
      
       <div class="modal fade" id="showeditroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title data_service_quickview_title" id="">
                                <Strong>Cập nhật phòng    </Strong>           
                <span id="data_service_quickview_title"></span>
                
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL('/update-room')}}" method="post">
                        @csrf
                        <div class="form-group row">
                        <input type="hidden" name="room_id" id="room_quickview_id" >
                        <span id="room_quickview_id"></span>
                            <label class="col-sm-3 col-form-label">Tên phòng:</label>
                            <div class="col-sm-10">
                                <input name="room_name" type="text" class="form-control" id="room_quickview_title"
                                placeholder="Nhập tên phòng">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Số lượng máy:</label>
                            <div class="col-sm-10">
                                <input name="pc_quantity" type="text" class="form-control" id="room_quickview_quantity"
                                placeholder="Nhập số lượng">
                            </div>
                        </div>
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary editbtn" >Cập nhật</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>

    </div>
      <!-- Modal show edit room-->
@endsection