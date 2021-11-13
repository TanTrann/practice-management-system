@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
    <div class="row mt">
        <div class="col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            <div class="card-header">
            <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#add-software" style="float: right;">Thêm học phần</button> 
            <div class="card-header">
                <h3>Danh sách học phần</h3>
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
                                        <table class="table table-hover"  id="mytable" >
                                          
                                            <thead>
                                                <tr>    
                                                    <th>ID</th>   
                                                    <th>Mã học phần</th> 
                                                    <th>Tên học phần</th>  
                                                    <th>Quản lý</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                        @foreach($all_subject as $key => $val)
                                                           
                                                            <td>{{$val->subject_id}}</td>
                                                            <td>{{$val->subject_name}}</td>
                                                            <td>{{$val->mahocphan}}</td>
                                                            <td>
                                                                <a href="{{URL::to('/qli-phan-cong/'.$val->subject_id)}}"><button class="btn" data-toggle="modal" ><i class="fa fa-info-circle" ></i></button></a>
                                                                <button class="btn show-edit-subject" data-toggle="modal" data-target="#suahp"    data-id_subject="{{$val->subject_id}}" ><i class="fa fa-pencil " style="color: green;" ></i></button>
                                                                    <a href="{{URL::to('/delete-subject/'.$val->subject_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa học phần này?')"  >
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
 <div class="modal fade" id="phancong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Phân công giảng dạy</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('phan-cong')}}" method="post">
                        @csrf
                       
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã - Tên cán bộ:</label>
                            <div class="col-sm-7">
                                
                                <select class="form-control">
                                    <option>Chọn cán bộ</option>
                                    @foreach($all_user as $key => $user )
                                        <option name="user_id" value="{{$user -> user_id}}">{{$user -> id_user}} - {{$user -> user_name}} </option>
                                    @endforeach
                                </select>
                                    
                            </div>
                        </div>  
                       
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tên học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" name="subject_name" class="form-control"
                                placeholder="Nhập học phần"  disable>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nhóm:</label>
                            <div class="col-sm-7">
                                <input type="text" name="Nhom" class="form-control"
                                placeholder="Nhập nhóm">
                            </div>
                        </div>           
                                      
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary phan-cong" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
     
 <!-- Modal thêm phần mềm-->
 <div class="modal fade" id="add-software" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm học phần</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('insert-subject')}}" method="post">
                        @csrf
                       
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" name="mahocphan" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tên học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" name="subject_name" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                       
                                      
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-subject" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
       <!--Xem thêm ver software-->
      
       <div class="modal fade" id="suahp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg"  role="document">
                <div class="modal-content">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Chỉnh sửa học phần</h4>
                    </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-10" style="margin-left: 60px;">
                            <!-- form nhập tkb -->
                            <form action="{{URL::to('/update-subject')}}" method="post">
                                @csrf
                                <input type="hidden" name="subject_id"  id="subject_id" class="form-control">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Mã học phần:</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="mahocphan"  id="mahocphan" class="form-control"
                                        placeholder="Nhập học phần">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Tên học phần:</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="subject_name" id="subject_name" class="form-control"
                                        placeholder="Nhập học phần">
                                    </div>
                                </div>
                            
                                            
                                    <!-- form nhập tkb end -->
                        </div>        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary update-subject" >Chỉnh sửa</button>
                        <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                                </form>
                    </div>
                </div>
            </div>
        </div> 
    
     <!-- Xem thêm ver software-->      









@endsection