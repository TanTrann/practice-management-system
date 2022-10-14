@section('admin_content')
@extends('admin_layout')
<section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i>Quản lí phòng</h3>
            <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
            ?>
          
        <div class="row mt">
          <div class="col-lg-12">
            <!-- The file upload form used as target for the file upload widget -->
            <span class="btn  ">
                  
            <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add-room" style="float: right;">Thêm phòng</button> 
            </span>
       
            <div class="content-panel">
           
              <div class="panel-body">
              @foreach($all_room as $key => $room)
              <div class="col-md-3 col-sm-3 mb">
                  
            
                <div class="grey-panel pn donut-chart">
           
                  <div class="grey-header">
                    <h5>{{$room->room_name}} </h5>
                  </div>
                  <h5>Số lượng máy : <strong>{{$room->pc_quantity}}</strong> máy </h5>
                  <i class="fa fa-desktop" style="font-size: 103px; padding-bottom: 30px;"></i>
                  <script>
                    var doughnutData = [{
                        value: 70,
                        color: "#FF6B6B"
                      },
                      {
                        value: 30,
                        color: "#fdfdfd"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <div class="row">
                    <div class="col-md-6">
                    <button class="btn btn-primary btn-icon showeditroom " data-toggle="modal" data-target="#showeditroom"    data-id_room="{{$room->room_id}}" ><i class="fa fa-pencil " ></i></button>
                        <a href="{{URL::to('/delete-room/'.$room->room_id)}}" >
                        <button onclick="return confirm('Bạn có chắc là muốn xóa phòng này?')"  type="submit" name="delete_room" class="btn btn-theme04 delete">
                            <i class="glyphicon glyphicon-trash"></i>
                            
                        </button>
                       
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{URL::to('/room-detail/'.$room->room_id)}}">
                            <button class="btn btn-primary">Chi tiết</button>
                        </a>
                    </div>
                  </div>
                 
                </div>
                <!-- /grey-panel -->
                
              </div>
              @endforeach
              </div>
              
            </div>
            
            <!-- /panel -->
            <!-- The blueimp Gallery widget -->
            
          </div>
        </div>
                    
                        <!-- Modal thêm phòng-->
   <div class="modal fade" id="add-room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">                 
            <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm phòng </h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL::to('save-room')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tên phòng:</label>
                            <div class="col-sm-10">
                                <input name="room_name" type="text" class="form-control" placeholder="Nhập tên phòng">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Số lượng máy:</label>
                            <div class="col-sm-10">
                                <input name="pc_quantity" type="text" class="form-control" placeholder="Nhập số lượng">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >CPU:</label>
                            <div class="col-sm-10">
                              <input name="cpu" type="text" class="form-control" placeholder="Nhập tên CPU">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >RAM:</label>
                            <div class="col-sm-10">
                              <input name="ram" type="text" class="form-control" placeholder="Nhập RAM">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label" >Ghi chú:</label>
                            <div class="col-sm-10">
                            <textarea name="ghichu" class="form-control"  rows="7"></textarea>
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
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title" id="myModalLabel">Cập nhật phòng</h4>
                               
       
            
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL('/update-room')}}" method="post">
                        @csrf
                        <input type="hidden" name="room_id" id="room_quickview_id" >
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tên phòng:</label>
                            <div class="col-sm-10">
                                <input name="room_name" type="text" class="form-control" id="room_quickview_title"
                                placeholder="Nhập tên phòng">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Số lượng:</label>
                            <div class="col-sm-10">
                                <input name="pc_quantity" type="text" class="form-control" id="pc_quantity"
                               >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">CPU:</label>
                            <div class="col-sm-10">
                            <input name="cpu" type="text" class="form-control" id="cpu">
                        </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">RAM:</label>
                            <div class="col-sm-10">
                            <input name="ram" type="text" class="form-control" id="ram">
                        </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ghi chú:</label>
                            <div class="col-sm-10">
                            <textarea name="ghichu" class="form-control"  rows="7" id="ghichu"></textarea>
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
      </section>
 
@endsection