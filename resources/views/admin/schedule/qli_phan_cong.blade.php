@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
    <div class="row mt">
        <div class="col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            <div class="card-header">
            @foreach ($all_subject as $key => $sub)
            <button type="button" class="btn btn-primary show-edit-subject"  data-toggle="modal" data-target="#add-nhomhp"    data-id_subject="{{$sub->subject_id}}" style="float: right;">Thêm nhóm học phần</button>
            @endforeach 
            <div class="card-header">
                <h3>Phân công giảng dạy</h3>
                    @foreach ($all_subject as $key => $sub)
                    <table>
                        <tr>
                            <td><h4>Học phần:</h4></td>
                            <td><h4 style="color: blue;">{{$sub -> subject_name}}</h4></td>
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
       
                
                            <!-- Hover table card start -->
                         
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                            <div class="card-block">
                                            <table class="table table-bordered table-striped table-condensed" >
                                    <tr>
                                        <th>Tên học phần - Nhóm</th>
                                        <th>Nhóm</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Cán bộ quản lý</th>
                                        <th>Quản lý</th>
                                    </tr>
                                    @foreach ($all_nhomhp as $key => $hp)
                                    <tr>

                                        <td>{{$hp->mahocphan}} - {{$hp->subject_name}}</td>
                                        <td>{{$hp->nhom}}</td>
                                        <td>{{$hp->soluong}} sinh viên</td>                                          
                                        <?php
                                        if($hp->nhomhp_status==0){
                                            ?>
                                                <td style="color: white; background-color: blue;">Chưa đăng ký </td>
                                            <?php
                                            }else{
                                            ?>  
                                                <td style="color: white; background-color: green;">Đã đăng ký </td>
                                            <?php
                                        }
                                        ?>
                                        <td>{{$hp->user_name}}</td>
                                      
                                        <td> 

                                            <!-- <button class="btn btn-success btn-xs show-edit-subject" data-toggle="modal"  data-id_subject="{{$sub->subject_id}}" data-target="#phancong">Phân công</button> -->
                                            <!-- <button class="btn btn-primary btn-xs show-edit-phancong" data-toggle="modal" data-target="#edit-nhomhp" data-id_nhomhp="{{$hp->nhomhp_id}}" >Chỉnh sửa</button> -->
                                           
                                            <button class="btn btn-danger btn-xs">Xóa</button>
                                      
                                        </td>
                                    </tr>
                                    @endforeach
                           </table>          
                                    </div>
                                    </div>
                            <!-- Hover table card end -->
                    
                </div>
                        
            </div>
            </div>
            
            </div>
        </div>
    </div>
</section>
     <!-- Xem thêm ver software-->  
    
        
       <!-- Modal add version software-->
      
    <div class="modal fade" id="nhomhp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Thông tin học phần</h4>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-11" style="margin-left: 33px;">
                                    
                                 
                                    <button class="btn btn-primary show-phan-cong" style="float: right;margin-bottom: 10px;" data-toggle="modal"  data-id_subject="" data-target="#phancong">Phân công giảng dạy</button>
                                    <h4>Nhóm học phần</h4>
                           <table class="table table-bordered table-striped table-condensed">
                                    <tr>
                                        <th>Tên học phần - Nhóm</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                        <th>Cán bộ quản lý</th>
                                        <th>Quản lý</th>
                                    </tr>
                                    <tr>
                                        <td>LTDT - Nhóm 01</td>
                                        <td>40 Sinh viên</td>
                                        <td style="color: white; background-color: green;">Đã đăng ký </td>
                                        <td>Nguyễn văn A</td>
                                        <td> 
                                            <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                           
                                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                           
                                        </td>
                                    </tr>
                           </table>             
                    </div>            
                </div>
            </div>
        </div>
    </div> </div>

    </div>
     <!-- Modal add version software-->
        
 
     
 <!-- Modal thêm phần mềm-->
 <div class="modal fade" id="add-nhomhp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm nhóm học phần</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('insert-nhomhp')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã - Tên cán bộ:</label>
                            <div class="col-sm-7">
                                
                                <select class="form-control" id="user_id" name="user_id" >
                                    <option>Chọn cán bộ</option>
                                    @foreach($all_user as $key => $user )
                                        <option id="user_id" name="user_id" value="{{$user -> user_id}}"> {{$user -> id_user}} - {{$user -> user_name}} </option>
                                    @endforeach
                                </select>
                                    
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">ID học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" id="subject_id" name="subject_id" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" id="mahocphan" name="mahocphan" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tên học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" id="subject_name" name="subject_name" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số lượng:</label>
                            <div class="col-sm-7">
                                <input type="text" id="soluong" name="soluong" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nhóm:</label>
                            <div class="col-sm-7">
                                <input type="text" id="nhom" name="nhom" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-4 col-form-label">Trang thái</label>
                            <div class="col-sm-7">
                                <input type="text" name="nhomhp_status" class="form-control"
                                value="0">
                            </div>
                        </div>
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-nhomhp" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
           
 <!-- Modal thêm phần mềm-->
 <div class="modal fade" id="edit-nhomhp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Chỉnh sua nhóm học phần</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('insert-nhomhp')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã - Tên cán bộ:</label>
                            <div class="col-sm-7">
                                
                                <select class="form-control" id="user_id" name="user_id" >
                                    <option>Chọn cán bộ</option>
                                    @foreach($all_user as $key => $user )
                                        <option id="user_id" name="user_id" value="{{$user -> user_id}}"> {{$user -> id_user}} - {{$user -> user_name}} </option>
                                    @endforeach
                                </select>
                                    
                            </div>
                        </div>  
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">ID học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" id="subject_id" name="subject_id" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" id="mahocphan" name="mahocphan" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tên học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" id="subject_name" name="subject_name" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số lượng:</label>
                            <div class="col-sm-7">
                                <input type="text" id="soluong" name="soluong" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nhóm:</label>
                            <div class="col-sm-7">
                                <input type="text" id="nhom" name="nhom" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-4 col-form-label">Trang thái</label>
                            <div class="col-sm-7">
                                <input type="text" name="nhomhp_status" class="form-control"
                                value="0">
                            </div>
                        </div>
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-nhomhp" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->









@endsection