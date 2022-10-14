@section('admin_content')
@extends('admin_layout')
<section class="wrapper">
    <div class="row mt">
        <div class="col-sm-12">
            <div class="showback"> 
            <!-- <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#dangkyphong" style="float: right;">Đăng ký phòng</button>   -->
               <table>
            <h4><strong>LỊCH THỰC HÀNH</strong></h4> 
             @foreach ($all_schedule as $key => $value)
            <tr>
                <td>Năm học: </td>
                <td style="color:green;font-size: 14px;">{{$value->namhoc}}</td>
            </tr>
            <tr>
                <td>Học kì: </td>
                <td style="color:green;font-size: 14px;">{{$value->hoc_ki}}</td>
            </tr>
            <tr>
                <td>Tổng số tuần: </td>
                <td style="color:green;font-size: 14px;">{{$value->week_quantity}} tuần</td>
            </tr>
           
            <button class="btn btn-defaul" style="float: right;" data-toggle="modal" data-target="#intkb">In thời khóa biểu</button>
        </table>
            @endforeach
                <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?>
            </div>
        </div>
        <div class="col-sm-12">
        <div class="showback">  
               <!-- Nav tabs -->
               <ul class="nav nav-tabs  tabs" role="tablist">
                        @foreach ($all_week as $key => $week)
                            <li class="nav-item">
                                <a class="nav-link tkb" data-detail_semester_id="{{$week->detail_semester_id}}" data-toggle="tab" href="#{{$week->detail_semester_id}}" role="tab" name="tuan">{{$week->week}}</a>
                                @csrf
                            </li>
                        @endforeach          
                </ul>  <!-- Tab panes -->
                                        <div class="tab-content tabs card-block" style="background-color: white;">  
                                            @foreach ($all_week as $key => $week)
                                                <div class= " tab-pane" id="{{$week->detail_semester_id}}" role="tabpanel">  
                                                    <table class="table tab-pane"  id="{{$week->detail_semester_id}}" role="tabpanel" style="text-align: center;" border="1px solid" >
                                                        
                                                        <thead style="background-color: #4285f4;" style="text-align: center;">
                                                            <tr style="text-align: center;background-color: #4285f4;color: white;"> 
                                                                <th rowspan="3">Buổi</th>
                                                                <th>Phòng</th>
                                                                @foreach( $all_thu as $key => $thu)
                                                                <th name="thu" style="text-align: center;" >{{($thu -> thu)}}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody style="text-align: center;">
                                                            @foreach( $all_buoi as $key => $buoi)
                                                                <tr>
                                                                    <th rowspan="{{$count_room +1}}" name="buoi">{{($buoi-> buoi)}}</th> 
                                                                </tr>
                                                                @foreach ($all_room as $key=> $room)
                                                                    <tr>
                                                                        <td name="phong" >
                                                                            {{($room->room_name)}}
                                                                        </td> 
                                                                        @foreach( $all_thu as $key => $thu) 
                                                                          
                                                                        <th style="text-align: center;">
                                                                       
                                                                        @foreach( $all_dki_phong as $key => $dki) 
                                                                                        
                                                                                        <!-- Dieu kien 1 --> 
                                                                                        <?php if($week->detail_semester_id == $dki->detail_semester_id ){ ?>
                                                                                                <!-- Dieu kien 2 -->
                                                                                                <?php if( $room->room_id == $dki->room_id ){ ?>
                                                                                                    <!-- Dieu kien 3 -->
                                                                                                    <?php if( $buoi->id_buoi == $dki->id_buoi){ ?>
                                                                                                        <!-- Dieu kien 4 -->
                                                                                                        <?php if( $thu->id_thu == $dki->id_thu){ ?>
                                                                                                            <div class="thongtindki" style="background-color: white;">
                                                                                                                    {{($dki -> mahp)}} - {{($dki -> tenhp)}} <br>
                                                                                                                    Nhóm: {{($dki -> nhom_id)}} <br>
                                                                                                                    Cán bộ: {{$dki -> user_name}}<br>
                                                                                                                    Thời gian: {{$dki->gio_bd}} - {{$dki->gio_kt}} <br>
                                                                                                                   <!-- {{$dki -> gio_bd}} - {{$dki -> gio_kt}} -->
                                                                                                                   
                                                                                                           
                                                                                                                   
                                                                                                                
                                                                                                                  
                                                                                                                   
                                                                                                            </div>
                                                                                                        <?php }else{ ?> 
                                                                                                              
                                                                                                        <?php } ?>
                                                                                                        <!-- End-Dieu kien 4 -->
                                                                                                    <?php }else{ ?> 
                                                                                                     
                                                                                                    <?php } ?>
                                                                                                    <!-- End-Dieu kien 3 -->
                                                                                                <?php }else{ ?>  
                                                                                                    
                                                                                                <?php } ?>
                                                                                                <!-- End-Dieu kien 2 -->
                                                                                        <?php }else{ ?>  
        
                                                                                        <?php } ?>
                                                                                        <!-- End-Dieu kien 1 -->
                                                                                    @endforeach     
                                                                                    
                                                                           
                                                                        </th>
                                                                       
                                                                        @endforeach
                                                                    </tr>
                                                                @endforeach 
                                                            @endforeach
                                                        </tbody>
                                                    </table>     
                                                </div>
                                            @endforeach 
                                        </div>
                                    </div> 
                                    </div>
        
            
        </div>
    </div>
</section>
<!-- 
<table border="1px solid">
    <thead>
        <tr>
            <th>Buổi</th>
            <th >Phong</th>
            <th>T2</th>
            <th>T3</th>
            <th>T4</th>
            <th>T5</th>
            <th>T6</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Sang</th>

            <th>P2</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th>Chieu</th>
            
            <th>P1</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>
            <th>Toi</th>
            
            <th>P3</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </tbody>
 
</table> -->
 <!-- Modal add version software-->
      
 <div class="modal fade" id="dangkyphong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Thêm học phần</h4>
                </div>
                
                <div class="modal-body">
            
            <div class="row">
                <<div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{url('/save-subject-schedule')}}" method="post">
                        @csrf
                         
                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">Tên học phần:</label>
                            <div class="col-sm-10">
                                        <select name="subject_name" class="form-control">
                                        
                                            <option> --Chọn học phần--</option>
                                            @foreach ($all_subject as $key => $sub)
                                            <option value="{{$sub->subject_id}}"><p name="subject_name">{{$sub->subject_name}}</p> </option>
                                            @endforeach
                                            
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">Buổi: </label>
                            <div class="col-sm-10">
                                        <select name="buoi" class="form-control">
                                        
                                            <option> --Chọn buổi--</option>
                                            
                                            <option value="0"><p name="buoi">Sáng</p> </option>
                                            <option value="1"><p name="buoi">Chiều</p> </option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">Tuần:</label>
                            <div class="col-sm-10">
                                        <select name="week" class="form-control">
                                        
                                            <option> --Chọn tuần--</option>
                                            @foreach ($all_week as $key => $week)
                                            <option value="{{$week->detail_semester_id}}"><p name="week">{{$week->week}}</p> </option>
                                            @endforeach
                                            
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">Thứ:</label>
                            <div class="col-sm-10">
                                        <select name="thu"  class="form-control">
                                        
                                            <option> --Chọn thứ--</option>
                                           
                                            <option value="0"><p name="thu">Thứ 2</p> </option>
                                            <option value="1"><p name="thu">Thứ 3</p> </option>
                                            <option value="2"><p name="thu">Thứ 4</p> </option>
                                            <option value="3"><p name="thu">Thứ 5</p> </option>
                                            <option value="4"><p name="thu">Thứ 6</p> </option>
                                            <option value="5"><p name="thu">Thứ 7</p> </option>
                                            <option value="6"><p name="thu">Thứ CN</p> </option>
                                         
                                            
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">Học kì: </label>
                            <div class="col-sm-10">
                            @foreach ($hoc_ki as $key => $hien)
                                <input type="text" name="hoc_ki" class="form-control" value="{{$hien->schedule_id}}">
                              @endforeach          
                                         
                                            
                                    
                            </div>
                        </div>
                       
                       
                      
                    
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
     <!-- Modal add version software-->
     
<!-- Modal t2 -->
<div class="modal fade" id="Sang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Đăng kí phòng</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 35px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('/dki-phong-th')}}" method="post">
                        @csrf
                        
                        <div class=" "  style="" >
                            <label class="">Tuần:</label>
                            <div class="">
                            <input type="text" id="week" name="week" class="form-control" disabled
                                >
                            </div>
                        </div>
                        <div class="" style="" hidden >
                            <label class="">ID Buổi:</label>
                            <div class="">
                                <input type="text" id="id_buoi" name="id_buoi" class="form-control"  >
                            </div>
                        </div>  
                        <div class="" style="" >
                            <label class="">Buổi:</label>
                            <div class="">
                                <input type="text" id="buoi" name="buoi" class="form-control" value="Sáng" disabled>
                            </div>
                        </div>  
                        <div class=" "  style="" hidden>
                            <label class="">ID Thứ:</label>
                            <div class="">
                                <input type="text" id="id_thu" name="id_thu" class="form-control" 
                                 >
                            </div>
                        </div>
                        <div class=" "  style="" >
                            <label class="">Thứ:</label>
                            <div class="">
                                <input type="text" id="thu" name="thu" class="form-control" disabled
                                 >
                            </div>
                        </div>
                        <div class=" "  style="" >
                            <label class="Phòng">Phòng:</label>
                            <div class="">
                                <input type="text" id="room_name" name="room_name" class="form-control" disabled
                                >
                            </div>
                        </div>
                        <div class=" "  style=""hidden >
                            <label class="Phòng">ID Phòng:</label>
                            <div class="">
                                <input type="text" id="room_id" name="room_id" class="form-control" 
                                >
                            </div>
                        </div>
                        <div class=" "  style="" hidden>
                            <label class="Phòng">ID Tuần + HKI:</label>
                            <div class="">
                                <input type="text" id="detail_semester_id" name="detail_semester_id" class="form-control"
                                >
                            </div>
                        </div>
                        
                        <div class="">
                            <label class=" ">Giờ bắt đầu:</label>
                            <div class="">
                                <select id="gio_bd" name="gio_bd" class="form-control"> 
                                <option>Chọn giờ bắt đầu</option>

                                        <option value="07:00">07:00</option>
                                        <option value="07:50">07:50</option>
                                        <option value="08:50">08:50</option>
                                        <option value="09:50">09:50</option>
                                        <option value="10:40">10:40</option>
                                       
                                       

                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Giờ kết thúc:</label>
                            <div class="">
                                <select id="gio_kt" name="gio_kt" class="form-control"> 
                                <option>Chọn giờ kết thúc</option>
                                        <option value="07:50">07:50</option>
                                        <option value="08:40">08:40</option>
                                        <option value="09:40">09:40</option>
                                        <option value="10:40">10:40</option>
                                        <option value="11:30">11:30</option>
                                        
                                        
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Tên học phần:</label>
                            <div class="">
                                <select id="mahp" name="mahp" class="form-control choose mahp"> 
                                        <option> --Chọn học phần--</option>
                                        @foreach ($all_hocphan as $key => $hp)
                                        
                                        <option value="{{$hp->hocphan_id}}">{{$hp->mahp}}</option>
                                      
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Nhóm học phần:</label>
                            <div class="">
                                <select name="nhom" id="nhom" class="form-control nhom choose ">      
                                </select>
                            </div>
                        </div>
                        
                        <div class="" hidden>
                            <label class=" ">Nhóm học phần ID:</label>
                            <div class="" >
                                <select name="nhom_id" id="nhom_id" class="form-control  nhom_id">        
                                </select>
                            </div>
                        </div>
                        
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary dki-phong-th" style="background-color: #6897BB; float: left;" >Đăng kí cả học kì</button> -->
                <button type="submit" class="btn btn-primary" style="background-color:#1107db; " >Đăng kí</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
<!-- Modal t2 -->
<div class="modal fade" id="Chieu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Đăng kí phòng</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 35px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('/dki-phong-th')}}" method="post">
                        @csrf
                       
                        <div class=" "  style="" >
                            <label class="">Tuần:</label>
                            <div class="">
                            <input type="text" id="weekc" name="week" class="form-control" disabled
                                >
                            </div>
                        </div>
                        <div class="" style="" hidden >
                            <label class="">ID Buổi:</label>
                            <div class="">
                                <input type="text" id="id_buoic" name="id_buoi" class="form-control"  >
                            </div>
                        </div>  
                        <div class="" style="" >
                            <label class="">Buổi:</label>
                            <div class="">
                                <input type="text" id="buoic" name="buoi" class="form-control" value="Sáng" disabled>
                            </div>
                        </div>  
                        <div class=" "  style="" hidden>
                            <label class="">ID Thứ:</label>
                            <div class="">
                                <input type="text" id="id_thuc" name="id_thu" class="form-control" 
                                 >
                            </div>
                        </div>
                        <div class=" "  style="" >
                            <label class="">Thứ:</label>
                            <div class="">
                                <input type="text" id="thuc" name="thu" class="form-control" disabled
                                 >
                            </div>
                        </div>
                        <div class=" "  style="" >
                            <label class="Phòng">Phòng:</label>
                            <div class="">
                                <input type="text" id="room_namec" name="room_name" class="form-control" disabled
                                >
                            </div>
                        </div>
                        <div class=" "  style=""hidden >
                            <label class="Phòng">ID Phòng:</label>
                            <div class="">
                                <input type="text" id="room_idc" name="room_id" class="form-control" 
                                >
                            </div>
                        </div>
                        <div class=" "  style="" hidden>
                            <label class="Phòng">ID Tuần + HKI:</label>
                            <div class="">
                                <input type="text" id="detail_semester_idc" name="detail_semester_id" class="form-control"
                                >
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Giờ bắt đầu:</label>
                            <div class="">
                                <select id="giobdc" name="gio_bd" class="form-control"> 
                                        <option>Chọn giờ bắt đầu</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:20">14:20</option>
                                        <option value="15:20">15:20</option>
                                        <option value="16:10">16:10</option>
                                        

                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Giờ kết thúc:</label>
                            <div class="">
                                <select id="gioktc" name="gio_kt" class="form-control"> 
                                <option>Chọn giờ kết thúc</option>

                                         <option value="14:20">14:20</option>
                                        <option value="15:10">15:10</option>
                                        <option value="16:10">16:10</option>
                                        <option value="17:10">17:10</option>
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Tên học phần:</label>
                            <div class="">
                                <select id="mahpc" name="mahp" class="form-control choose mahpc"> 
                                        <option> --Chọn học phần--</option>
                                        @foreach ($all_hocphan as $key => $hp)
                                        
                                        <option value="{{$hp->hocphan_id}}">{{$hp->mahp}}</option>
                                      
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Nhóm học phần:</label>
                            <div class="">
                                <select id="nhomc" name="nhom"  class="form-control nhomc choose ">      
                                </select>
                            </div>
                        </div>
                        
                        <div class="" hidden>
                            <label class=" ">Nhóm học phần ID:</label>
                            <div class="" >
                                <select id="nhomhp_idc" name="nhomhp_id"  class="form-control  choose nhom_id ">        
                                </select>
                            </div>
                        </div>
                        
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary dki-phong-th" style="background-color: #6897BB; float: left;" >Đăng kí cả học kì</button> -->
                <button type="submit" class="btn btn-primary" style="background-color:#1107db; " >Đăng kí</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
       <!-- Modal t2 -->
<div class="modal fade" id="Toi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Đăng kí phòng</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 35px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('/dki-phong-th')}}" method="post">
                        @csrf
                        
                        <div class=" "  style="" >
                            <label class="">Tuần:</label>
                            <div class="">
                            <input type="text" id="weekt" name="week" class="form-control" disabled
                                >
                            </div>
                        </div>
                        <div class="" style="" hidden >
                            <label class="">ID Buổi:</label>
                            <div class="">
                                <input type="text" id="id_buoit" name="id_buoi" class="form-control"  >
                            </div>
                        </div>  
                        <div class="" style="" >
                            <label class="">Buổi:</label>
                            <div class="">
                                <input type="text" id="buoit" name="buoi" class="form-control" value="Sáng" disabled>
                            </div>
                        </div>  
                        <div class=" "  style="" hidden>
                            <label class="">ID Thứ:</label>
                            <div class="">
                                <input type="text" id="id_thut" name="id_thu" class="form-control" 
                                 >
                            </div>
                        </div>
                        <div class=" "  style="" >
                            <label class="">Thứ:</label>
                            <div class="">
                                <input type="text" id="thut" name="thu" class="form-control" disabled
                                 >
                            </div>
                        </div>
                        <div class=" "  style="" >
                            <label class="Phòng">Phòng:</label>
                            <div class="">
                                <input type="text" id="room_namet" name="room_name" class="form-control" disabled
                                >
                            </div>
                        </div>
                        <div class=" "  style=""hidden >
                            <label class="Phòng">ID Phòng:</label>
                            <div class="">
                                <input type="text" id="room_idt" name="room_id" class="form-control" 
                                >
                            </div>
                        </div>
                        <div class=" "  style="" hidden>
                            <label class="Phòng">ID Tuần + HKI:</label>
                            <div class="">
                                <input type="text" id="detail_semester_idt" name="detail_semester_id" class="form-control"
                                >
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Giờ bắt đầu:</label>
                            <div class="">
                                <select id="giobdt" name="gio_bd" class="form-control"> 
                                <option>Chọn giờ bắt đầu</option>
                                         
                                        <option value="18:30">18:30</option>
                                        <option value="19:20">19:20</option>
                                        <option value="20:20">20:20</option>
                                        
                                       
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Giờ kết thúc:</label>
                            <div class="">
                                <select id="gioktt" name="gio_kt" class="form-control"> 
                                <option>Chọn giờ kết thúc</option>

                                    <option value="19:20">19:20</option>
                                        <option value="20:10">20:10</option>
                                        <option value="19:20">19:20</option>
                                        
                                      
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Tên học phần:</label>
                            <div class="">
                                <select id="mahpt" name="mahp" class="form-control  mahpt choose"> 
                                        <option> --Chọn học phần--</option>
                                        @foreach ($all_hocphan as $key => $hp)
                                        
                                        <option value="{{$hp->hocphan_id}}">{{$hp->mahp}}</option>
                                      
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Nhóm học phần:</label>
                            <div class="">
                                <select name="nhom" id="nhomt" class="form-control  choose nhomt ">      
                                </select>
                            </div>
                        </div>
                        
                        <div class="" hidden>
                            <label class=" ">Nhóm học phần ID:</label>
                            <div class="" >
                                <select name="nhomhp_id" id="nhomhp_idt" class="form-control  choose nhom_id ">        
                                </select>
                            </div>
                        </div>
                        
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary dki-phong-th" style="background-color: #6897BB; float: left;" >Đăng kí cả học kì</button> -->
                <button type="submit" class="btn btn-primary" style="background-color:#1107db; " >Đăng kí</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
         <!-- Modal t2 -->
<div class="modal fade" id="intkb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">In thời khóa biểu</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 26px;">
                    <table>
                    <tr>
                    <td>Năm học: </td>
                    <td style="color:green;font-size: 14px;">{{$value->namhoc}}</td>
                    </tr>
                    <tr>
                        <td>Học kì: </td>
                        <td style="color:green;font-size: 14px;">{{$value->hoc_ki}}</td>
                    </tr>
                    </table>
                    <p>Chọn tuần:</p>
                    <div class="">
                            <table class="table ">
                                
                                
                              
                                    <td>
                                        @foreach ($all_week as $key =>$val_w)
                                        <button class="btn" style="margin: 0 2px;" >
                                        <a target="_blank" href="{{url('/print-tkb/'.$val_w->detail_semester_id)}}">{{$val_w->week}}</a>
                                        </button>
                                        @endforeach
                                    </td>
                                
                                
                                

                            
                            
                            </table>
                    </div>
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-primary dki-phong-th" style="background-color: #6897BB; float: left;" >Đăng kí cả học kì</button> -->
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
@endsection