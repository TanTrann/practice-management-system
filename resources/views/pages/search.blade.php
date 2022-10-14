@section('content')
@extends('welcome')

<section class="">
    <div class="row">
        <div class="col-sm-12">
            <div class="showback"  style="background-color: white;">  
                <h2 style="text-align: center; color:blue"> <strong>KẾT QUẢ TÌM KIẾM</strong></h2>
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
            <div class="row">
            <div class="col-sm-12" style="">
               
            <div class="showback"  style="background-color: white;text-align: center;" >  
            <h4 style="padding-bottom: 20px;color:blue; text-align: center;"><strong>TÌM KIẾM</strong></h4>

                        <form action="{{URL::to('/tim-kiem')}}" method="post">
                            {{csrf_field()}}
                                        <label for="" style="padding-right: 5px;" >Chọn phần mềm:</label>
                                        <select style="width: 150px;height: 30px; "  name="software_id" id="software_name" class=" choose software_name">   
                                        @foreach ($all_software as $key => $soft)
                                        <option name="software_id" value="{{($soft -> software_id)}}">{{($soft -> software_name)}}</option>
                                        
                                        @endforeach   
                                        </select>
                                            <label for="" style="padding-right: 5px;">Chọn phiên bản:</label>
                                                <select style="width: 150px;height: 30px; " name="version_number" id="version_number" class=" choose version_number  ">   
                                                
                                                </select>
                                            <label for="" style="padding-right: 5px;">Nhập số lượng máy:</label>
                                                <input type="text" name="room_quantity" id="room_quantity"  style="width: 150px;height: 30px; ">
                                                    <label for="" style="padding-right: 5px;">CPU:</label>
                                                <input type="text" name="cpu"   style="width: 150px;height: 30px; ">
                                             <button type="submit" class="" style="height: 30px; width: 60px;"><i class="fa fa-search"></i></button>
                             </form>
            </div>
                 
            
                <div class="showback"  style="background-color: white;">  
                    <div class="row mt">
                        <div class="col-sm-12">
                               
                            <table>
                                @foreach($oneweek as $key => $oweek)
                                <button type="button" class="btn btn-primary tkb"  data-detail_semester_id="{{$oweek->detail_semester_id}}"  data-toggle="modal" data-target="#allki" style="float: right;background-color: blue;">Đăng kí toàn bộ học kì</button> 
                                    @endforeach
                                <h3><strong>Lịch Thực Hành</strong></h3> 
                               
                                    @foreach ($all_schedule as $key => $value)
                                        <tr>
                                            <td>Học kì</td>
                                            <td style="color:green;font-size: 14px;">{{$value->hoc_ki}}</td>
                                        </tr>
                                        <tr>
                                            <td>Ngày bắt đầu:</td>
                                            <td style="color:green;font-size: 14px;">{{date('d-m-Y', strtotime($value->date_start))}}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td> Ngày kết thúc:</td>
                                            <td style="color:green;font-size: 14px;">{{date('d-m-Y', strtotime($value->date_end))}}</td>   
                                        </tr>
                                    @endforeach
                                    
                                  
                                
                            </table>
                                   
                                    <div class="showback45" >  
                                    <!-- Nav tabs -->
                                            <ul class="nav nav-tabs  tabs" role="tablist">
                                                    @foreach ($all_week as $key => $week)
                                                        <li class="nav-item">
                                                            <a class="nav-link tkb" data-detail_semester_id="{{$week->detail_semester_id}}" data-toggle="tab" href="#{{$week->detail_semester_id}}" data-toggle="tab"  name="tuan">{{$week->week}}</a>
                                                        </li>
                                                    @endforeach          
                                            </ul>  
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs card-block" style="background-color: white;">  
                                            @foreach ($all_week as $key => $week)
                                                <div class= " tab-pane" id="{{$week->detail_semester_id}}" role="tabpanel">  
                                                    <table class="table tab-pane"  id="{{$week->detail_semester_id}}" role="tabpanel" border="solid 1px" >
                                                        <thead style="background-color: #4285f4;">
                                                            <tr> 
                                                                <th rowspan="3">Buổi</th>
                                                                <th>Phòng</th>
                                                                @foreach( $all_thu as $key => $thu)
                                                                <th>{{($thu -> thu)}}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach( $all_buoi as $key => $buoi)
                                                                <tr>
                                                                    <th rowspan="{{$count_room_search +1}}" name="buoi">{{($buoi-> buoi)}}</th> 
                                                                </tr>
                                                                @foreach ($r_name as $key=> $room)
                                                                    <tr>
                                                                        
                                                                        <td name="phong">
                                                                            {{($room->room_name)}}
                                                                        </td> 
                                                                        @foreach( $all_thu as $key => $thu)               
                                                                        <th>
                                                                               
                                                                         <button class="btn dangkyphong" data-toggle="modal" data-detail_semester_id="{{$week->detail_semester_id}}" data-id_room="{{($room->room_id)}}" data-id_buoi="{{($buoi->id_buoi)}}" data-id_thu="{{($thu->id_thu)}}" data-target="#thut"> <i class="fa fa-calendar-plus-o" style="color:green"></i> </button>
                                                                                
                                                                        @foreach( $all_dki_phong as $key => $dki) 
                                                                                
                                                                                <!-- Dieu kien 1 --> 
                                                                                <?php if($week->detail_semester_id == $dki->detail_semester_id ){ ?>
                                                                                        <!-- Dieu kien 2 -->
                                                                                        <?php if( $room->room_id == $dki->room_id ){ ?>
                                                                                            <!-- Dieu kien 3 -->
                                                                                            <?php if( $buoi->id_buoi == $dki->id_buoi){ ?>
                                                                                                <!-- Dieu kien 4 -->
                                                                                                <?php if( $thu->id_thu == $dki->id_thu){ ?>
                                                                                                    <div class="thongtindki" style="position: relative;margin-top: -35px;background-color: white;">
                                                                                                            {{($dki -> mahocphan)}} - {{($dki -> subject_name)}} <br>
                                                                                                            Nhóm: {{($dki -> nhom)}} <br>
                                                                                                            GV: {{($dki -> user_name)}} <br>
                                                                                                            <?php 
                                                                                                             $name = Session::get('user_id');
                                                                                                            if( $name == $dki->user_id){ 
                                                                                                            ?>
                                                                                                           
                                                                                                        
                                                                                                            <a href="{{URL::to('/delete-nhomhp/'.$dki->dki_phong_id)}}" onclick="return confirm('Bạn có chắc là muốn xóa học phần đã đăng ký?')"><button class="btn"><i class="fa fa-trash-o " style="color: red;"> Xóa</i></button></a>
                                                                                                          
                                                                                                            <?php }else{ ?> 
                                                                                                                
                                                                                                            <?php } ?>
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
</section>  

<!-- Modal t2 -->
<div class="modal fade" id="thut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{URL::to('dki-phong-th')}}" method="post">
                        @csrf
                        <div class="" hidden>
                            <label class="">ID user:</label>
                            <div class="">
                                <input type="text" id="" name="id_user" class="form-control" value="<?php
                                    $name = Session::get('user_id');
                                    if ($name){
                                        echo $name;
                                    }
                                ?>"
                                >
                            <p name="id_user"> 
                                
                            </p>
                            </div>
                        </div>
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
                            <label class=" ">Tên học phần:</label>
                            <div class="">
                                <select name="subject_name" id="subject_name" class="form-control choose subject_name"> 
                                        <option> --Chọn học phần--</option>
                                        @foreach ($get_subject_name as $subname => $id)
                                        
                                        <option value="{{$id}}"><p name="subject_name">{{$subname}}</p> </option>
                                      
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Nhóm học phần:</label>
                            <div class="">
                                <select name="nhom" id="nhom" class="form-control  choose nhom ">      
                                </select>
                            </div>
                        </div>
                        
                        <div class="" hidden>
                            <label class=" ">Nhóm học phần ID:</label>
                            <div class="" >
                                <select name="nhomhp_id" id="nhomhp_id" class="form-control  choose nhomhp_id ">        
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
<div class="modal fade" id="allki" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{URL::to('dki-phong-th-all-hki')}}" method="post">
                        @csrf
                        <div class="" hidden>
                            <label class="">ID user:</label>
                            <div class="">
                                <input type="text" id="" name="id_user" class="form-control" value="<?php
                                    $name = Session::get('user_id');
                                    if ($name){
                                        echo $name;
                                    }
                                ?>"
                                >
                            <p name="id_user"> 
                                
                            </p>
                            </div>
                        </div>
                        
                        
                      
                        <div class=" "  style="" hidden>
                            <label class="Phòng">ID Tuần + HKI:</label>
                            <div class="">
                                <input type="text" id="detail_semester_id2" name="detail_semester_id" class="form-control"
                                >
                            </div>
                        </div>
                        <div class="" style="" >
                            <label class="">Buổi:</label>
                            <div class="">
                                <select name="id_buoi" class="form-control"> 
                                        <option> --Chọn buổi--</option>
                                      
                                        
                                        <option value="1">Sáng</option>
                                      
                                      
                                        <option value="2">Chiều</option>
                                </select>
                                    
                            </div>
                        </div>  
                        <div class=" "  style="" >
                            <label class="">Thứ:</label>
                            <div class="">
                                <select name="id_thu" class="form-control"> 
                                    <option> --Chọn thứ--</option>
                                      
                                        
                                      <option value="1">Thứ 2</option>
                                    
                                    
                                      <option value="2">Thứ 3</option>
                                      <option value="3">Thứ 4</option>
                                      <option value="4">Thứ 5</option>
                                      <option value="5">Thứ 6</option>
                                      <option value="6">Thứ 7</option>
                                      <option value="7">Chủ nhật</option>
                                     


                                </select>
                            </div>
                        </div>
                        <div class=" "  style="" >
                            <label class="">Thứ:</label>
                            <div class="">
                                <select name="room_id" class="form-control"> 
                                    <option> --Chọn phòng--</option>
                                      
                                    @foreach ($all_room as $key=> $room)
                                    <option name="room_id" value="{{$room->room_id}}">{{$room->room_name}} </option>
                                     
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Tên học phần:</label>
                            <div class="">
                                <select name="subject_name" id="subject_name2" class="form-control choose2 subject_name2"> 
                                        <option> --Chọn học phần--</option>
                                        @foreach ($get_subject_name as $subname => $id)
                                        
                                        <option value="{{$id}}"><p name="subject_name2">{{$subname}}</p> </option>
                                      
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Nhóm học phần:</label>
                            <div class="">
                                <select name="nhom" id="nhom2" class="form-control  choose2 nhom2 ">      
                                </select>
                            </div>
                        </div>
                        
                        <div class="" hidden >
                            <label class=" ">Nhóm học phần ID:</label>
                            <div class="" >
                                <select name="nhomhp_id" id="nhomhp_id2" class="form-control  choose2 nhomhp_id2 ">        
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

@endsection
