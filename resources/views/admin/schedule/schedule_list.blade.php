@section('admin_content')
@extends('admin_layout')
<section class="wrapper">
    <div class="row mt">
        <div class="col-sm-12">
            <div class="showback"> 
            <!-- <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#dangkyphong" style="float: right;">Đăng ký phòng</button>   -->
               <table>
            <h4><strong>THỜI KHÓA BIỂU</strong></h4> 
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
                                                    <table class="table tab-pane"  id="{{$week->detail_semester_id}}" role="tabpanel" >
                                                        
                                                        <thead>
                                                            <tr> 
                                                                <th rowspan="3">Buổi</th>
                                                                <th>Phòng</th>
                                                                @foreach( $all_thu as $key => $thu)
                                                                <th name="thu">{{($thu -> thu)}}</th>
                                                                @endforeach
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach( $all_buoi as $key => $buoi)
                                                                <tr>
                                                                    <th rowspan="{{$count_room +1}}" name="buoi">{{($buoi-> buoi)}}</th> 
                                                                </tr>
                                                                @foreach ($all_room as $key=> $room)
                                                                    <tr>
                                                                        <td name="phong">
                                                                            {{($room->room_name)}}
                                                                        </td> 
                                                                        @foreach( $all_thu as $key => $thu) 
                                                                          
                                                                        <th>
                                                                            <div>
                                                                                @foreach( $all_dki_phong as $key => $dki) 
                                                                                
                                                                                        <!-- Dieu kien 1 --> 
                                                                                        <?php if($week->detail_semester_id == $dki->detail_semester_id ){ ?>
                                                                                                <!-- Dieu kien 2 -->
                                                                                                <?php if( $room->room_id == $dki->room_id ){ ?>
                                                                                                    <!-- Dieu kien 3 -->
                                                                                                    <?php if( $buoi->id_buoi == $dki->id_buoi){ ?>
                                                                                                        <!-- Dieu kien 4 -->
                                                                                                        <?php if( $thu->id_thu == $dki->id_thu){ ?>
                                                                                                                Đã đăng kí
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
                                                                            </div>
                                                                           
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
                                        
                                            <option> --Chọn phần mềm--</option>
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
@endsection