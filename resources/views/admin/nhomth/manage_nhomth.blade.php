@section('admin_content')
@extends('admin_layout')
<section class="wrapper">   
   
    <div class="row mt">
        
    
            <div class="col-sm-12"  >
                <div class="showback" style="background-color: white;"> 
                    <h3>>Quản lý sắp lịch thực hành</h3>
                    <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?> 
                <p>Danh sách nhóm thực hành</p>
                        <table class="table table-striped " style="text-align: center;" id="mytable" > 
                            <thead>
                                <tr>
                                  
                                    <th>Nhóm</th>
                                    <th>Năm học</th>
                                    <th>Học kỳ</th>
                                    <th>Học phần</th>
                                    <th>STT lớp học phần</th>
                                    <th>Tiết bắt đầu</th>
                                    <th>Số tiết</th>    
                                    <th>Số lượng</th>
                                    <th>Yêu cầu phần mềm</th>
                                    <th>Tuần</th>
                                    <th>Phòng</th>
                                    <th>Trạng thái</th>
                                    <th>Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($all_nhomth as $key => $lophp)
                                <tr>
                               
                                    <td>{{$lophp->nhom_id}}</td>
                                    <td>{{$lophp->namhoc}}</td>
                                    <td>{{$lophp->hocky}}</td>
                                    <td>{{$lophp->mahp}} - {{$lophp->tenhp}}</td>
                                    <td>{{$lophp->sttlophp}}</td>
                                    <td>{{$lophp->tietbd_lophp}}</td>
                                    <td>{{$lophp->sotiet_lophp}}</td>
                                    <td>{{$lophp->soluong}}</td>
                                    <td>{{$lophp->software_name}} - Ver {{$lophp->software_version}}</td>
                                   
                                    
                                    <td>
                                   
                                    @foreach($lk_tuan as $key => $val_tuan)
                                    @if($lophp->nhom_id == $val_tuan->nhom_id)
                                    {{$val_tuan->tuan_id}}
                                    @else
                                    @endif
                                    @endforeach
                                    </td>
                                         <td>
                                    
                                    @foreach($all_nhom as $key => $val_nhom)
                                    @if($lophp->nhom_id == $val_nhom->nhom_id)
                                        {{$val_nhom->room_name}}
                                        @else
                                    @endif 
                                    @endforeach
                                    </td>
                                    @if($lophp->check_dki == 0)
                                    <td style="background-color: orange; color: white;">Chưa sắp lịch</td>
                                    @else
                                    <td style="background-color: green; color: white;">Đã sắp lịch</td>
                                    @endif
                                    @if($lophp->check_dki == 0)

                                    <td><button class="btn-sm dkylich"  data-toggle="modal" data-target="#dkilich" data-nhom_id="{{$lophp->nhom_id}}" style="color: green;">Đăng ký lịch</button></td>
                                    @else
                                    <td style="">
                                    <a href="{{URL::to('/huy-dki-nhom/'.$lophp->nhom_id)}}"  onclick="return confirm('Bạn có chắc là muốn hủy đăng ký nhóm học phần này?')"  >
                                        <button class="btn-sm" style="color: red;">Hủy đăng ký</button>
                                    </a>
                                    </td>
                                    @endif
                               
                                </tr>
                                @endforeach  
                            </tbody>
                        </table>
                </div>
            </div>   
        </div>
    </div>
</section>



<!-- Modal t2 -->
<div class="modal fade" id="dkilich" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{URL::to('/dki-phong-th-all-hki')}}" method="post">
                        @csrf
                        ID:<input type="text" name="nhom_id" id="nhom_id">
                        <div class=" "  style="" >
                            <label class="">Học kỳ:</label>
                            <div class="">
                            <select name="hocky" id="hocky_lophp" class="form-control" disabled>
                            @foreach($all_hoc_ky as $key => $hky)

                           
                                <option value="{{$hky->hocky_id}}">{{$hky->hocky}}</option>
                           
                            @endforeach
                            </select>
                            </div> 
                        </div>
                       
                        
                        <div class=" "  style="" >
                            <label class="">Năm học:</label>
                            <div class=""> 
                            <select name="namhoc" id="namhoc_lophp2" class="form-control" disabled> 
                            @foreach($all_namhoc as $key => $nh)

                           
                                <option value="{{$nh->namhoc_id}}">{{$nh->namhoc}}</option>
                           
                            @endforeach
                            </select>
                            </div> 
                        </div>
                       
                       
                       
                        <div class=" "  style="" >
                            <label class="Phòng">Tên - Nhóm học phần:</label>
                            <div class="">
                                <select name="nhom_id" id="nhom_id2" class="form-control" disabled>
                                    @foreach($all_nhomth as $key => $th)
                                        <option value="{{$th->nhom_id}}">{{$th->tenhp}} - Nhóm: {{$th->nhom_id}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class=" "  style="" >
                            <label class="">Thứ:</label>
                            <div class="">
                            <select name="id_thu" id="thu2" class="form-control" >
                                @foreach($all_thu as $key => $thu)
                                    <option value="{{$thu->id_thu}}">{{$thu->thu}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="" style="" >
                            <label class="">Buổi:</label>
                            <div class="">
                             <select name="id_buoi" id="" class="form-control" >
                                @foreach($all_buoi as $key => $buoi)
                                    <option value="{{$buoi->id_buoi}}">{{$buoi->buoi}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>              
                     
                        
                        <div class="">
                            <label class=" ">Giờ bắt đầu:</label>
                            <div class="">
                                <select id="gio_bd2" name="gio_bd" class="form-control"> 
                                <option>Chọn giờ bắt đầu</option>

                                        <option value="07:00">07:00</option>
                                        <option value="07:50">07:50</option>
                                        <option value="08:50">08:50</option>
                                        <option value="09:50">09:50</option>
                                        <option value="10:40">10:40</option>
                                        <option value="13:30">13:30</option>
                                        <option value="14:20">14:20</option>
                                        <option value="15:20">15:20</option>
                                        <option value="16:10">16:10</option>
                                        <option value="18:30">18:30</option>
                                        <option value="19:20">19:20</option>
                                        <option value="20:20">20:20</option>

                                </select>
                            </div>
                        </div>
                        <div class="">
                            <label class=" ">Giờ kết thúc:</label>
                            <div class="">
                                <select id="gio_kt2" name="gio_kt" class="form-control"> 
                                <option>Chọn giờ kết thúc</option>
                                        <option value="07:50">07:50</option>
                                        <option value="08:40">08:40</option>
                                        <option value="09:40">09:40</option>
                                        <option value="10:40">10:40</option>
                                        <option value="11:30">11:30</option>
                                        <option value="14:20">14:20</option>
                                        <option value="15:10">15:10</option>
                                        <option value="16:10">16:10</option>
                                        <option value="17:10">17:10</option>
                                        <option value="19:20">19:20</option>
                                        <option value="20:10">20:10</option>
                                        <option value="19:20">19:20</option>
                                        
                                </select>
                            </div>
                        </div>
                        <div class=" "  style="" >
                            <label class="Phòng">Phòng:</label>
                            <div class="">
                                <select name="room_id" id="" class="form-control">
                                    @foreach($all_room as $key => $p)
                                        <option value="{{$p->room_id}}">{{$p->room_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <br>
                        <!-- <div class="">
                            <label class=" ">Tên học phần:</label>
                            <div class="">
                                <select id="mahp" name="mahp" class="form-control choose mahp"> 
                                        <option> --Chọn học phần--</option>
                                        @foreach ($all_hocphan as $key => $hp)
                                        
                                        <option value="{{$hp->hocphan_id}}">{{$hp->mahp}}</option>
                                      
                                        @endforeach
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="">
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
                        </div> -->
                        
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
@endsection