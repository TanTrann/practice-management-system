@section('content')
@extends('welcome')

<section class="">
    <div class="row">
        <div class="col-sm-12">
            <div class="showback">  
                <h3> Đăng kí giảng dạy</h3>
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
          
                 

                <div class="showback">  
                    <div class="row mt">
                        <div class="col-sm-12">
                               
                            <table>
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
                                    <div class="" style="float: right;">
                                        <label for="" >Chọn phần mềm:</label>
                                        <select style="width: 200px;height: 30px; ">   
                                        @foreach ($all_software as $key => $soft)
                                        <option value="{{($soft -> software_id)}}">{{($soft -> software_name)}}</option>
                                        
                                        @endforeach   
                                        </select>
                                        <label for="" >Chọn số lượng máy:</label>
                                        <input type="text"  style="width: 200px;height: 30px; ">
                                        <button type="but" class="" style="height: 30px; width: 60px;"><i class="fa fa-search"></i></button>
                                </div>
                            </table>
                                   
                                    <div class="showback45" >  
                                    <!-- Nav tabs -->
                                            <ul class="nav nav-tabs  tabs" role="tablist">
                                                    @foreach ($all_week as $key => $week)
                                                        <li class="nav-item">
                                                            <a class="nav-link" data-toggle="tab" href="#{{$week->detail_semester_id}}" role="tab">{{$week->week}}</a>
                                                        </li>
                                                    @endforeach          
                                            </ul>  
                                        <!-- Tab panes -->
                                        <div class="tab-content tabs card-block">  
                                            @foreach ($all_week as $key => $week)
                                                <div class= " tab-pane" id="{{$week->detail_semester_id}}" role="tabpanel">  
                                                    <table class="table tab-pane"  id="{{$week->detail_semester_id}}" role="tabpanel" >
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
                                                                    <th rowspan="{{$count_room +1}}">{{($buoi-> buoi)}}</th> 
                                                                </tr>
                                                                @foreach ($all_room as $key=> $room)
                                                                    <tr>
                                                                        <td>
                                                                            {{($room->room_name)}}
                                                                        </td> 
                                                                        @foreach( $all_thu as $key => $thu)               
                                                                        <th>
                                                                            <button class="btn dangkyphong" data-toggle="modal" data-detail_semester_id="{{$week->detail_semester_id}}" data-id_room="{{($room->room_id)}}" data-id_buoi="{{($buoi->id_buoi)}}" data-id_thu="{{($thu->id_thu)}}" data-target="#thut"> <i class="fa fa-calendar-plus-o" style="color:green"></i> </button>
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
                            <div class="">
                                <select name="nhomhp_id" id="nhomhp_id" class="form-control  choose nhomhp_id ">        
                                </select>
                            </div>
                        </div>
                        
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="background-color:#1107db; " >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->

@endsection