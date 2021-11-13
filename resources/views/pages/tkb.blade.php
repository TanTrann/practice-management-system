@section('content')
@extends('welcome')

<section class="">
    <div class="row">
        <div class="col-sm-12">
            <div class="showback"> 
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
                                                    <table class="table tab-pane"  id="{{$week->detail_semester_id}}" role="tabpanel" border="solid 1px" >
                                                        
                                                        <thead style="background-color: #4285f4;">
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
                                                                                
                                                                                
                                                                                
                                                                                @foreach( $all_dki_phong as $key => $dki) 
                                                                                
                                                                                        <!-- Dieu kien 1 --> 
                                                                                        <?php if($week->detail_semester_id == $dki->detail_semester_id ){ ?>
                                                                                                <!-- Dieu kien 2 -->
                                                                                                <?php if( $room->room_id == $dki->room_id ){ ?>
                                                                                                    <!-- Dieu kien 3 -->
                                                                                                    <?php if( $buoi->id_buoi == $dki->id_buoi){ ?>
                                                                                                        <!-- Dieu kien 4 -->
                                                                                                        <?php if( $thu->id_thu == $dki->id_thu){ ?>
                                                                                                            <div class="thongtindki">
                                                                                                                    Mã HP: {{($dki -> mahocphan)}} <br>
                                                                                                                    Nhóm: {{($dki -> nhom)}} <br>
                                                                                                                    GV: {{($dki -> user_name)}} <br>
                                                                                                                    
                                                                                                                  
                                                                                                                   <button class="btn"  data-toggle="modal" data-target="#xoahp"><i class="fa fa-pencil" style="color: green;"></i></button></a>
                                                                                                                
                                                                                                                    <a href="{{URL::to('/delete-nhomhp/'.$dki->dki_phong_id)}}" onclick="return confirm('Bạn có chắc là muốn xóa học phần đã đăng ký?')"><button class="btn"><i class="fa fa-trash-o " style="color: red;"></i></button></a>
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



@endsection