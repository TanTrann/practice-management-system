@section('admin_content')
@extends('admin_layout')

<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
             <!-- Front-icon Breadcrumb card start -->
             <div class="card page-header p-0">
                <div class="card-block front-icon-breadcrumb row align-items-end">
                    <div class="breadcrumb-header col">
                        <div class="big-icon">
                            <i class="icofont icofont-home"></i>
                        </div>
                        <div class="d-inline-block">
                        @foreach ($room_detail as $key => $value)  
                            <h5><strong>{{$value->room_name}}</strong></h5>
                            
                            <h6> Tổng số máy : <strong style="color: red;">{{$count_pc}} </strong>|| Tổng số phần mềm: <strong style="color: red;">{{$count_software}}</strong> </h6>
                            @endforeach
                           
                            
                        </div>
                        <br>
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
            </div>
            <!-- Front-icon Breadcrumb card end -->
            <div class="row">    
                <div class="col-md-12 col-xl-6">
                <div class="card">
                <div class="card-header">
                <div class="pcoded-inner-content"><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#them-may" style="float: right;">Thêm máy</button>    </div>
                
                            <h4> Thông tin máy</h4>
                           
                                        
                            <div class="card-header-right ">
                               
                            </div>
                            <br>
                            <div class="card-header-left">
                                Tất cả máy
                            </div>
                            
                        </div>
                    
                        <div class="card-block">
                            <div id="statestics-chart" style="height:517px;">
                                <table class="table table-hover"  id="mytable2" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tên máy</th>
                                            <th>Quản lí</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pc_list as $key => $pc)
                                        <tr>
                                            <th scope="row">{{$pc->computer_id}}</th>
                                            <td>{{$pc->computer_name}}</td>
                                          
                                           
                                            <td>

                                            <button class="btn-sm btn-primary btn-outline-primary edit-pc" data-toggle="modal" data-target="#edit-pc" data-id_computer="{{$pc->computer_id}}">
                                                            <i class="ti-pencil"></i>
                                                        </button>    
                                            <a href="{{URL::to('/delete-pc/'.$pc->computer_id)}}"   onclick="return confirm('Bạn có chắc là muốn xóa phần mềm này?')"  >
                                                <button class="btn-sm btn-danger btn-outline-danger">
                                                            <i class="ti-trash"></i>
                                                </button>
                                            </a>
                                            </td>
                                            @endforeach
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
               
            
                <!-- Statestics Start -->
                <div class="col-md-12 col-xl-6">
                <div class="card">
                <div class="card-header">
                <div class="pcoded-inner-content"><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add-software-room" style="float: right;">Thêm phần mềm</button>    </div>
                
                            <h4> Thông tin phần mềm</h4>
                            <span id="data_service_quickview_title"> 
                                            <?php
                                            $message = Session::get('message');
                                            if ($message){
                                            echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                                Session::put('message',null);
                                                }
                                            ?>
                                        </span>
                            <br>
                                        
                            <div class="card-header-right ">
                               
                            </div>
                            <div class="card-header-left ">
                                Tất cả phần mềm
                            </div>
                            
                        </div>
                
                        <div class="card-block">
                            <div id="statestics-chart" style="height:517px;">
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
                                                            <i class="ti-trash"></i>
                                                </button>
                                            </a>
                                            </td>
                                            @endforeach
                                        </tr>
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



         
        </div>
    </div>
</div>
                    <!-- Modal thêm phần mềm-->
<div class="modal fade" id="add-software-room" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title data_service_quickview_title" id="">
                                <Strong>Thêm phần mềm</Strong>           
           
               
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
            <h5 class="modal-title data_service_quickview_title" id="">
                                <Strong>Thêm máy</Strong>           
                <span id="data_service_quickview_title"></span>
                
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
                                <input name="room_id" type="text" class="form-control" value="{{$roomval->room_id}}">
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
            <h5 class="modal-title data_service_quickview_title" id="">
                                <Strong>Cập nhật máy</Strong>           
                <span id="data_service_quickview_title"></span>
                
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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