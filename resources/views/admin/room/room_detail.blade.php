@section('admin_content')
@extends('admin_layout')
<section class="wrapper">


<div class="row mt">
    <div class="col-sm-12">
            <div class="showback">
            @foreach ($room_detail as $key => $value) 
              <h3><i class="fa fa-home" style="padding-right: 10px;width: 29px;"></i>{{$value->room_name}} </h3>
             
                            @endforeach
                <span id="session"> 
                    <?php
                    $message = Session::get('message');
                    if ($message){
                    echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                        Session::put('message',null);
                        }
                    ?>
                </span>
            </div>
            
           
    </div>
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            
            <h3>Thông tin phòng</h3>  
          <hr>
            <div class="showback">
            <strong> <h4> Tổng số máy : <strong style="color: red;">{{$value->pc_quantity}} </strong> máy</h4> </strong>
            <strong> <h4> Tổng số phần mềm: <strong style="color: red;">{{$count_software}}</strong> phần mềm </h4> </strong>
            </div>
            </div>
            <!--/showback -->
          
            
            
            
          </div>
          <!-- /col-lg-6 -->
          <div class="col-lg-6 col-md-6 col-sm-12">
            <!--  ALERTS EXAMPLES -->
            <div class="showback">
                <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add-software-room" style="float: right;">Thêm phần mềm</button> 
                    <h3> Thông tin phần mềm</h3>
                        <div class="card-header-left ">
                            Tất cả phần mềm
                        </div>
                            <table class="table table-hover"  id="mytable" >
                                <thead>
                                    <tr>
                                        
                                        <th>Tên phần mềm</th>
                                        <th>Phiên bản</th>
                                        <th>Quản lý</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ver_detail as $key => $sdetails)
                                    <tr>
                                        
                                        <td>{{$sdetails->software_name}}</td>
                                        
                                        <td>{{number_format((float)$sdetails->version_number, 1, '.', '')}}</td>
                                        <td>
                                        <a href="{{URL::to('/delete-soft-room/'.$sdetails->room_details_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa phần mềm này?')"  >
                                            <button class="btn-sm btn-danger btn-outline-danger">
                                                        <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                        </td>
                                        @endforeach
                                    </tr>
                                    
                                    
                                </tbody>
                            </table>
            </div>
            <!-- /showback -->

          
          
          <!-- /col-lg-6 -->
        </div>
        <!--/ row -->
      </section>
             <!-- Modal thêm phần mềm-->
<div class="modal fade" id="add-software-room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm máy </h4>
            </div>
          
            
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{url('/save-software-room')}}" method="">
                        @csrf
                            @foreach ($room_detail as $key => $value)   
                            <input type="hidden" name="room_id" id="" value="{{$value->room_id}}">
                            @endforeach
                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">Tên phần mềm:</label>
                            <div class="col-sm-10">
                                <select name="software_name" id="software_name" class="form-control choose software_name">
                                
                                    <option> --Chọn phần mềm--</option>
                                    @foreach ($all_software as $key => $soft)
                                    <option value="{{$soft->software_id}}"><p name="software_name">{{$soft->software_name}}</p> </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">Phiên bản:</label>
                            <div class="col-sm-10">
                                        <select name="version_number" id="version_number" class="form-control choose version_number  ">
                                            
                                        <option> --Chọn phiên bản--</option>
                                           
                                            
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row"  hidden >                           
                            <label class="col-sm-3 col-form-label">id version:</label>
                            <div class="col-sm-10">
                                        <select name="version_id" id="version_id" class="form-control version_id choose ">
                                           
                                            
                                    </select>
                            </div>
                        </div>
                        
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="">Thêm phần mềm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->                     
        <!-- Modal thêm phần mềm-->
 <div class="modal fade" id="them-may" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm máy </h4>
            </div>
          
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL::to('/save-pc')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tên máy:</label>
                            <div class="col-sm-10">
                                <input name="computer_name" type="text" class="form-control"
                                placeholder="Nhập tên máy">
                            </div>
                        </div>
                                                @foreach($room_detail as $key => $roomval)
                                <input name="room_id" type="hidden" class="form-control" value="{{$roomval->room_id}}">
                                                @endforeach
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="">Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>
       <!-- Modal add pc-->          
           <!-- Modal edit pc-->
 <div class="modal fade" id="edit-pc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Cập nhật máy </h4>
            </div>
          
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL::to('/update-pc')}}" method="post">
                        @csrf
                        <div class="form-group row">
                               
                            <label class="col-sm-3 col-form-label">Tên máy:</label>
                            <div class="col-sm-10">
                                <input name="computer_name" type="text" class="form-control" id="computer_name">
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                               
                               <label class="col-sm-3 col-form-label">ID:</label>
                               <div class="col-sm-10">
                                   <input name="computer_id" type="text" class="form-control" id="computer_id">
                               </div>
                           </div>
                        
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="">Cập nhật</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->      
@endsection