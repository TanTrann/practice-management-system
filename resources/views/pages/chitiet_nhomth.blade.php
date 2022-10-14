@section('content')
@extends('welcome')
<section class="">   
   
    <div class="row">
        <div class="col-sm-12">
            <div class="showback" style="background-color: white;"> 
                <h2 style="text-align: center; color: blue;"><strong>CHI TIẾT NHÓM THỰC HÀNH</strong> </h2>
               
            </div>
        </div>   
    
            <div class="col-sm-12"  >
                <div class="showback" style="background-color: white;"> 
                    <h3>>Danh sách nhóm thực hành</h3>
                    <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?>
                    @foreach($nhomtho as $key => $lophp1)
                   
                    <p>Tên học phần: {{$lophp1->tenhp}}</p>
                 
                 <p>Tổng số nhóm: {{$count_nhomth}}</p>
                 <button class="btn show-edit-lophp" data-toggle="modal" data-target="#showeditschedule"   data-sttlophp="{{$lophp1->sttlophp}}" style="background-color: blue;color: white;margin-bottom: 10px;"> Đăng ký nhóm</button>

                    @endforeach
                        <table class="table table-striped " border="1px solid" style="text-align: center;">
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
                               
                                
                            @foreach($nhomth as $key => $lophp)
                                <tr>
                               
                                <td>{{$lophp->nhom_id}}</td>
                                <td>{{$lophp->namhoc}}</td>
                                <td>{{$lophp->hocky}}</td>
                                <td>{{$lophp->mahp}} - {{$lophp->tenhp}}</td>
                                <td>{{$lophp->sttlophp}}</td>
                                <td>{{$lophp->tietbd_lophp}}</td>
                                <td>{{$lophp->sotiet_lophp}}</td>
                                <td>{{$lophp->soluong}}</td>

                                
                                <td>{{$lophp->software_name}} - Ver: {{$lophp->software_version}}</td>
                                <td>
                                
                                @foreach($lk_tuan as $key => $val_tuan)
                                @if($lophp->nhom_id == $val_tuan->nhom_id)
                                {{$val_tuan->tuan_id}}
                                @else
                                @endif
                                @endforeach
                                </td>
                                <td>
                                
                                @foreach($all_nhomth as $key => $val_nhom)
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
                                    
                                    <td> 
                                    <a href="{{URL::to('/delete-nhomth/'.$lophp->nhom_id)}}" onclick="return confirm('Bạn có chắc là muốn xóa nhóm thực hành đã đăng ký?')">
                                        <button class="btn-sm" data-toggle="modal"  style="background-color: red;color: white;"><i class="fa fa-trash"></i></button>
                                    </a>

                                    </td>
                                    @else
                                    <td>
                                    <button class="btn-sm" disabled><i class="fa fa-lock"></i></button>
                           
                                   
                                 
                            
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


<!-- Modal thêm phần mềm-->
<div class="modal fade" id="showeditschedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Đăng ký nhóm</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-5" style="margin-left: 35px;">
                    
                <h4>Thông tin lớp học phần:</h4>
                    <!-- form nhập tkb -->
                    STT:
                        
                    <form action="{{URL::to('/insert-nhomth')}}" method="post">
                        @csrf
                        <input type="text" id="sttlophp2" name="sttlophp">
                       
                        <div class="">
                            <label class="">Học phần:</label>
                                <div class="">
                                    <select id="mahp_lophp2" class="form-control" disabled>
                                        @foreach($all_hocphan as $key => $hp)
                                        <option  name="mahp_lophp" value="{{$hp->hocphan_id}}">{{$hp->mahp}} - {{$hp->tenhp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="">
                            <label class="">Năm học:</label>
                            <div class="">  
                                <select  id="namhoc_lophp2" class="form-control" disabled>
                                    @foreach($all_namhoc as $key => $nn)
                                        <option name="namhoc_lophp" value="{{$nn->namhoc_id}}">{{$nn->namhoc}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="">
                            <label class="">Học kỳ:</label>
                                <div class="">
                                    <select  id="hocky_lophp2" class="form-control" disabled>
                                        @foreach($all_hocky as $key => $hky)
                                        <option name="hocky_lophp" value="{{$hky->hocky_id}}">{{$hky->hocky}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="">
                            <label class="">Tiết bắt đầu:</label>
                                <div class="">
                                    <select name="tietbd_lophp" id="tietbd_lophp2" class="form-control" disabled>
                                        <option name="tietbd_lophp" value="1">Tiết 1</option>
                                        <option name="tietbd_lophp" value="2">Tiết 2</option>
                                        <option name="tietbd_lophp" value="3">Tiết 3</option>
                                        <option name="tietbd_lophp" value="4">Tiết 4</option>
                                        <option name="tietbd_lophp" value="5">Tiết 5</option>
                                        <option name="tietbd_lophp" value="6">Tiết 6</option>
                                        <option name="tietbd_lophp" value="7">Tiết 7</option>
                                        <option name="tietbd_lophp" value="8">Tiết 8</option>
                                        <option name="tietbd_lophp" value="9">Tiết 9</option>  
                                    </select>
                                </div>
                        </div>
                        <div class="">
                            <label class="">Số tiết:</label>
                            <div class="">
                                <select  id="sotiet_lophp2" class="form-control" disabled>
                                     <option name="sotiet" value="1">1</option>
                                     <option name="sotiet" value="2">2</option>
                                     <option name="sotiet" value="3">3</option>
                                     <option name="sotiet" value="4">4</option>
                                     <option name="sotiet" value="5">5</option>
                                    

                                 </select>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-5" style="margin-left: 35px;">
                        <h4>Thông tin đăng ký</h4>
                        <div class="">
                            <label class="">Số lượng:</label>
                            <div class="" style="text-decoration: none;">
                                <input type="text" name="soluong" id="" class="form-control" >
                            </div>
                        </div> 
                        <div class="">
                            <label class="">Yêu cầu phần mềm:</label>
                            <div class="" style="text-decoration: none;">
                                    <select name="ycpm" id="ycpm" class="form-control">
                                        @foreach($all_software as $key => $soft)
                                        <option value="{{$soft->software_id}}">{{$soft->software_name}} - Ver: {{$soft->software_version}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div> 
                        
                        <div class="" hidden>
                            <label class="">check dki:</label>
                            <div class="" style="text-decoration: none;">
                                   <input type="text" name="check_dki" id="check_id" value="0">
                            </div>
                        </div> 
                            <!-- form nhập tkb end -->
                    </div>
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-nhomth" style="background-color: blue;">Đăng ký</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->


@endsection