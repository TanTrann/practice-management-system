@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
        <div class="row mt">
        <div class="col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            <div class="card-header">
            <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#add-software" style="float: right;">Thêm lớp học phần</button> 
            <div class="card-header">
                <h3>>Quản lý lớp học phần</h3>
                    <?php
                                $message = Session::get('message');
                                if ($message){
                                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                    Session::put('message',null);
                                    }
                            ?>
                </div>
                                    <p>Danh sách lớp học phần</p>
                
                            <!-- Hover table card start -->
                         
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                            <div class="card-block">
                                        <table class="table table-hover"  id="mytable" >
                                          
                                            <thead>
                                                <tr>        
                                                    <th>STT lớp học phần</th>
                                                    <th>Năm học</th>
                                                    <th>Học kỳ</th>
                                                    <th>Mã học phần</th>
                                                    <th>Tiết bắt đầu</th>
                                                    <th>Số tiết</th>
                                                    <th>Thứ</th>
                                                    <th>Mã cán bộ</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng số nhóm</th>
                                                    <th>Quản lý</th>


                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                        @foreach($all_lophp as $key => $lophp)
                                                           
                                                          
                                                            <td>{{$lophp->sttlophp}}</td>
                                                            <td>{{$lophp->namhoc}}</td>
                                                            <td>{{$lophp->hocky}}</td>
                                                            <td>{{$lophp->mahp}}</td>
                                                            <td>{{$lophp->tietbd_lophp}}</td>
                                                            <td>{{$lophp->sotiet_lophp}}</td>
                                                            <td>{{$lophp->thu}}</td>
                                                            <td>{{$lophp->id_user}}</td>
                                                            @if($lophp->status_lophp == 0)
                                                            <td><p>Chưa đăng ký</p></td>
                                                            @else
                                                            <td><p style="color: green;">Đã đăng ký</p></td>
                                                            @endif
                                                            <td>
                                                                @if($lophp->status_lophp == 0)
                                                                Trống
                                                                @else
                                                                    <a href="{{URL::to('/chitiet-nhomth-admin/'.$lophp->sttlophp)}}" >
                                                                        <button class="btn-sm" style="background-color:#01303f;color: white;"> Chi tiết</button>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <button class="btn show-edit-lophp" data-toggle="modal" data-target="#showeditschedule"    data-sttlophp="{{$lophp->sttlophp}}" ><i class="fa fa-pencil " style="color: green;" ></i></button>
                                                                <a href="{{URL::to('/delete-lophp/'.$lophp->sttlophp)}}"  onclick="return confirm('Bạn có chắc là muốn xóa lớp học phần này?')"  >
                                                              
                                                                <button class="btn" style="color: red;">
                                                                <i class="fa fa-trash"></i>
                                                                </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                            <!-- Hover table card end -->
                    
                </div>
                        
            </div>
            </div>
            
            </div>
            <!--/showback -->
           
            
           
            
       
          </div>
                    </section>

 <!-- Modal thêm phần mềm-->
 <div class="modal fade" id="add-software" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm lớp học phần</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('insert-lophp')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Năm học:</label>
                            <div class="col-sm-7">
                                 <select name="namhoc_lophp" id="" class="form-control">
                                <option value="">Chọn năm học</option>

                                    @foreach($all_namhoc as $key => $nn)
                                     <option value="{{$nn->namhoc_id}}">{{$nn->namhoc}}</option>
                                    @endforeach
                                 </select>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Học kỳ:</label>
                            <div class="col-sm-7">
                                <select name="hocky_lophp" id="" class="form-control">
                                <option value="">Chọn học kỳ</option>

                                    @foreach($all_hocky as $key => $hky)
                                     <option value="{{$hky->hocky_id}}">{{$hky->hocky}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã học phần:</label>
                            <div class="col-sm-7">
                                <select name="mahp_lophp" id="" class="form-control">
                                <option value="">Chọn mã học phần</option>

                                    @foreach($all_hocphan as $key => $hp)
                                     <option value="{{$hp->hocphan_id}}">{{$hp->mahp}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tiết bắt đầu:</label>
                            <div class="col-sm-7">
                                <select name="tietbd_lophp" id="" class="form-control">
                                <option value="">Chọn tiết bắt đầu</option>
                                    
                                     <option value="1">Tiết 1</option>
                                     <option value="2">Tiết 2</option>
                                     <option value="3">Tiết 3</option>
                                     <option value="4">Tiết 4</option>
                                     <option value="5">Tiết 5</option>
                                     <option value="6">Tiết 6</option>
                                     <option value="7">Tiết 7</option>
                                     <option value="8">Tiết 8</option>
                                     <option value="9">Tiết 9</option>      
                                     <option value="11">Tiết 11</option>  
                                     <option value="12">Tiết 12</option>  
                                     <option value="13">Tiết 13</option>  
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số tiết:</label>
                            <div class="col-sm-7">
                                <select name="sotiet_lophp" id="" class="form-control">
                                <option value="">Chọn số tiết</option>
                                    
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                    

                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Thứ:</label>
                            <div class="col-sm-7">
                                <select name="thu_lophp" id="" class="form-control">
                                <option value="">Chọn thứ</option>
                                    @foreach($all_thu as $key => $thu)
                                     <option value="{{$thu->id_thu}}">{{$thu->thu}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã cán bộ:</label>
                            <div class="col-sm-7">
                                <select name="macb_lophp" id="" class="form-control">
                                <option value="">Chọn cán bộ</option>

                                    @foreach($all_user as $key => $user)
                                     <option name="macb_lophp"  value="{{$user->user_id}}">{{$user->id_user}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-4 col-form-label">status:</label>
                            <div class="col-sm-7">
                               <input type="text" name="status_lophp"  value="0">
                            </div>
                        </div>
                       
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-hocki" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
  

<!-- Modal thêm phần mềm-->
<div class="modal fade" id="showeditschedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Cập nhật lớp học phần</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('/update-lophp')}}" method="post">
                        @csrf

                        ID:<input type="text" name="sttlophp" id="sttlophp">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Năm học:</label>
                            <div class="col-sm-7">
                                <select name="namhoc_lophp" id="namhoc_lophp" class="form-control ">
                                    @foreach($all_namhoc as $key => $nn)
                                     <option value="{{$nn->namhoc_id}}">{{$nn->namhoc}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Học kỳ:</label>
                            <div class="col-sm-7">
                                <select name="hocky_lophp" id="hocky_lophp" class="form-control">
                                    @foreach($all_hocky as $key => $hky)
                                     <option value="{{$hky->hocky_id}}">{{$hky->hocky}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã học phần:</label>
                            <div class="col-sm-7">
                                <select name="mahp_lophp" id="mahp_lophp" class="form-control">
                                    @foreach($all_hocphan as $key => $hp)
                                     <option value="{{$hp->hocphan_id}}">{{$hp->mahp}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tiết bắt đầu:</label>
                            <div class="col-sm-7">
                                <select name="tietbd_lophp" id="tietbd_lophp" class="form-control">
                                    
                                     <option value="1">Tiết 1</option>
                                     <option value="2">Tiết 2</option>
                                     <option value="3">Tiết 3</option>
                                     <option value="4">Tiết 4</option>
                                     <option value="5">Tiết 5</option>
                                     <option value="6">Tiết 6</option>
                                     <option value="7">Tiết 7</option>
                                     <option value="8">Tiết 8</option>
                                     <option value="9">Tiết 9</option>  

                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số tiết:</label>
                            <div class="col-sm-7">
                                <select name="sotiet_lophp" id="sotiet_lophp" class="form-control">
                                    
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                    

                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Thứ:</label>
                            <div class="col-sm-7">
                                <select name="thu_lophp" id="thu_lophp" class="form-control">
                                    @foreach($all_thu as $key => $thu)
                                     <option value="{{$thu->id_thu}}">{{$thu->thu}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã cán bộ:</label>
                            <div class="col-sm-7">
                                <select name="macb_lophp" id="macb_lophp" class="form-control">
                                    @foreach($all_user as $key => $user)
                                     <option value="{{$user->user_id}}">{{$user->id_user}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-4 col-form-label">status:</label>
                            <div class="col-sm-7">
                               <input type="text" name="status_lophp" id="status_lophp">
                            </div>
                        </div>
                       
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Cập nhật</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->


@endsection