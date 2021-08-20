@section('admin_content')
@extends('admin_layout')

<div class="main-body">
    <div class="page-wrapper">

        <div class="page-body">
            <div class="row">
            <div class="col-md-10 col-xl-3">
                       
                            <div class="card-header">
                            @foreach ($room_detail as $key => $value)   
                            <h4><i class="btn btn-success btn-icon ti-home"></i>{{$value->room_name}}</h4>
                            </div>
                            <div class="card-block text-center">
                                <div class="row">
                                    <div class="col-6 b-r-default">
                                        <p class="text-muted">Số máy</p>
                                        <h2>{{$value->pc_quantity}}</h2>  
                                    </div>
                                    <div class="col-6">
                                        <p class="text-muted">Phần mềm</p>
                                        <h2>{{$value->pc_quantity}}</h2>
                                      
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            
                        
                    </div>
               
            
                <!-- Statestics Start -->
                <div class="col-md-12 col-xl-9">
                    <div class="card">
                    <div class="pcoded-inner-content"><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add-software-room" style="float: right;">Thêm phần mềm</button>    <div class="card-header-left">

                        <div class="card-header">
                            <h4> Thông tin phòng</h4>
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
                                THÔNG TIN PHÒNG
                            </div>
                            
                        </div>
                        <div class="card-block">
                            <div id="statestics-chart" style="height:517px;">
                                <table class="table table-hover"  id="mytable" >
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên phần mềm</th>
                                            <th>Phiên bản</th>
                                            <th>Quản lý</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(@$all_room_details as $key => $rdetails)
                                        <tr>
                                            <th scope="row">{{$rdetails->room_details_id}}</th>
                                            <td>{{$rdetails->software_name}}</td>
                                            <td>{{$rdetails->software_number}}</td>
                                            <td>@mdo</td>
                                            @endforeach
                                        </tr>
                                        
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
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
                    
                
                    <form>
                        @csrf
                            @foreach ($room_detail as $key => $value)   
                            <input type="text" name="room_id" id="" value="{{$value->room_id}}">
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
                                        <select name="version_number" id="version_number" class="form-control version_number choose ">
                                            
                                        <option> --Chọn phiên bản--</option>
                                           
                                            
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row" >                           
                            <label class="col-sm-3 col-form-label">ID:</label>
                            <div class="col-sm-10">
                                        <select name="software_id" id="software_id" class="form-control software_id ">
                                           
                                            
                                    </select>
                            </div>
                        </div>
                        
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary add_soft_room" name="add_soft_room">Thêm phần mềm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->                        
@endsection