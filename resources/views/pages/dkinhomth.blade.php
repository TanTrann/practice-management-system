@section('content')
@extends('welcome')
<section class="">   
   
    <div class="row">
        <div class="col-sm-12">
            <div class="showback" style="background-color: white;"> 
                <h2 style="text-align: center; color: blue;"><strong>QUẢN LÝ ĐĂNG KÝ NHÓM THỰC HÀNH    </strong> </h2>
                <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?>
            </div>
        </div>   
    
            <div class="col-sm-12"  >
                <div class="showback" style="background-color: white;"> 
                    <h3>>Danh sách lớp học phần</h3>
                        <table class="table table-striped " border="1px solid" style="text-align: center;"  id="mytable22" >
                            <thead>
                                <tr>
                                  
                                    <th>ID</th>
                                    <th>Học phần</th>
                                    <th>Năm học</th>
                                    <th>Học kỳ</th>
                                    <th>Thứ</th>
                                    <th>Tiết bắt đầu</th>
                                    <th>Số tiết</th>
                                   
                                    <th>Trạng thái</th>
                                    <th>Tổng số nhóm</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($all_lophp as $key => $lophp)
                                <tr>
                               
                                <td>{{$lophp->sttlophp}}</td>
                                <td>{{$lophp->mahp}} - {{$lophp->tenhp}}</td>
                                <td>{{$lophp->namhoc}}</td>
                                <td>{{$lophp->hocky}}</td>
                                <td>{{$lophp->thu}}</td>
                                <td>{{$lophp->tietbd_lophp}}</td>
                                <td>{{$lophp->sotiet_lophp}}</td>
                                @if($lophp->status_lophp == 0)
                                <td style="background-color: orange; color: white;">Chưa đăng ký</td>
                                @else
                                <td style="background-color: green; color: white;">Đã đăng ký</td>
                                @endif
                                <td>
                                
                                    <a href="{{URL::to('/chitiet-nhomth/'.$lophp->sttlophp)}}" >
                                        <button class="btn-sm" style="background-color:#01303f;color: white;"> Chi tiết</button>
                                    </a>
                                
                                </td>
                              
                                 
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
<div class="modal fade" id="showdangkynhomhp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
            <div class="modal-content">
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Đăng ký nhóm học phần</h4>
                </div>
                <div class="modal-body">
            
                <div class="row">
                    <div class="col-sm-11" style="margin-left: 35px;">
                    
                
                        <!-- form nhập tkb -->
                        <form action="{{URL::to('insert-lophp')}}" method="post">
                            @csrf
                            <div class="">
                                <label class="">Mã học phần:</label>
                                <div class="">
                                    <select name="mahp_lophp"  id="mahp_lophp"   class="form-control choosehp mahp_lophp">
                                        @foreach($all_lophp as $key => $lophp)
                                        <option   value="{{$lophp->sttlophp}}" >{{$lophp->tenhp}} - Nhóm:{{$lophp->sttlophp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label class="">Năm học:</label>
                                <div class="">
                                    <select name="namhoc_lophp" id="namhoc_lophp" class="form-control namhoc_lophp choosehp">
                                        @foreach($all_namhoc as $key => $nn)
                                        <option value="{{$nn->namhoc_id}}">{{$nn->namhoc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label class="">Học kỳ:</label>
                                <div class="">
                                    <select name="hocky_lophp" id="hocky_lophp" class="form-control hocky_lophp choose-lophp">
                                        @foreach($all_hocky as $key => $hky)
                                        <option value="{{$hky->hocky_id}}">{{$hky->hocky}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label class="">Mã học phần:</label>
                                <div class="">
                                    <select name="mahp_lophp" id="mahp_lophp" class="form-control mahp_lophp choose-lophp">
                                        @foreach($all_hocphan as $key => $hp)
                                        <option value="{{$hp->hocphan_id}}">{{$hp->mahp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="">
                                <label class="">Số lượng:</label>
                                <div class="">
                                    <input type="text" name="soluong" id="" class="form-control" >
                                </div>
                            </div> 
                            <div class="">
                                <label class="">Yêu cầu phần mềm</label>
                                <div class="">
                                    
                                    <select name="ycpm" id="ycpm" class="form-control">
                                        @foreach($all_software as $key => $soft)
                                        <option name="ycpm"  value="{{$soft->software_id}}">{{$soft->software_name}} - Ver: {{$soft->software_version}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 
                           
                            <!-- form nhập tkb end -->
                        </div>          
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" style="background-color: blue;">Cập nhật</button>
                            <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    
       <!-- Modal thêm phần mềm-->

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


<!-- Modal thêm phần mềm-->
<div class="modal fade" id="showeditnhomth" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Chi tiết nhóm học phần</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-4" style="margin-left: 35px;">
                   
                <h4>Thông tin lóp học phần:</h4>
                    <!-- form nhập tkb -->
                    STT:
                        
                    <form action="{{URL::to('insert-nhomth')}}" method="post">
                        @csrf
                        <input type="text" id="sttlophp3" name="sttlophp">
                       
                        <div class="">
                            <label class="">Học phần:</label>
                                <div class="">
                                    <select id="mahp_lophp3" class="form-control" disabled>
                                        @foreach($all_hocphan as $key => $hp)
                                        <option  name="mahp_lophp" value="{{$hp->hocphan_id}}">{{$hp->mahp}} - {{$hp->tenhp}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="">
                            <label class="">Năm học:</label>
                            <div class="">  
                                <select  id="namhoc_lophp3" class="form-control" disabled>
                                    @foreach($all_namhoc as $key => $nn)
                                        <option name="namhoc_lophp" value="{{$nn->namhoc_id}}">{{$nn->namhoc}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="">
                            <label class="">Học kỳ:</label>
                                <div class="">
                                    <select  id="hocky_lophp3" class="form-control" disabled>
                                        @foreach($all_hocky as $key => $hky)
                                        <option name="hocky_lophp" value="{{$hky->hocky_id}}">{{$hky->hocky}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="">
                            <label class="">Tiết bắt đầu:</label>
                                <div class="">
                                    <select name="tietbd_lophp" id="tietbd_lophp3" class="form-control" disabled>
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
                                <select  id="sotiet_lophp3" class="form-control" disabled>
                                     <option name="sotiet" value="1">1</option>
                                     <option name="sotiet" value="2">2</option>
                                     <option name="sotiet" value="3">3</option>
                                     <option name="sotiet" value="4">4</option>
                                     <option name="sotiet" value="5">5</option>
                                    

                                 </select>
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-7" style="margin-left: 25px;">
                    <button class="btn-sm" style="float: right;color:white;background-color: blue;">Thêm nhóm</button>
                        <h4>Danh sách nhóm học phần </h4>
                        <table class="table">
                            <tr>
                                <td>Nhóm</td>
                                <td>Số lượng</td>
                                <td>Phần mềm</td>
                                <td>Xóa</td>
                            </tr>
                            <!-- <tr>
                                <td><p id="nhom_id"></p></td>
                                <td ><p id="soluong"></p></td>
                                <td ><p id="ycpm2"></p></td>
                                <td><button class="btn-xs"><i class="fa fa-trash" style="color: red;"></i></button></td>
                            </tr> -->
                            @foreach($all_nhomth as $key => $nhomth)
                            <tr>
                                <td><p id="">{{$nhomth->nhom_id}}</p></td>
                                <td ><p id="">{{$nhomth->soluong}}</p></td>
                                <td ><p id="">{{$nhomth->ycpm}}</p></td>
                                <td><button class="btn-xs"><i class="fa fa-trash" style="color: red;"></i></button></td>
                            </tr>
                            @endforeach
                        </table>
                        <!-- <div class="">
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
                        </div>  -->
                            <!-- form nhập tkb end -->
                    </div>
            <style></style>
            
        </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->



@endsection