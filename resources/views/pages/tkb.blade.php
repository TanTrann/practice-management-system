@section('content')
@extends('welcome')

<section class="">
    <div class="row">
        <div class="col-sm-12">
            <div class="showback" style="background-color: white;"> 
               <table>
            <h3><strong>Lịch Thực Hành</strong></h3> 
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
        <div class="showback" style="background-color: white;"  >  
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
                                                                                                            <div class="thongtindki" style="text-align: center;">
                                                                                                                    {{($dki -> mahp)}} - {{($dki -> tenhp)}} <br>
                                                                                                                    Nhóm: {{($dki -> nhom_id)}} <br>    
                                                                                                                    Cán bộ: {{$dki ->user_name}}  <br>  
                                                                                                                Thời gian:{{$dki ->gio_bd}} - {{$dki ->gio_kt}}
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