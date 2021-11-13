@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
        <div class="row mt">
        <div class="col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            <div class="card-header">
            <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#add-software" style="float: right;">Thêm Giảng Viên</button> 
            <div class="card-header">
                <h3>Quản lý user</h3>
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
                                            <table class="table table-striped b-t b-light" id="myTable">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Mã CB</th>
                                                    <th>Tên CB</th>
                                                    <th>Email</th>
                                                    <th>SDT</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Chức vụ</th>
                                                    <th >Quản lý</th>
                                                  
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($all_user as $key => $value)
                                                    
                                                    @csrf
                                                    <tr>
                                                        <td>{{ $value->user_id}}</td>
                                                        <td>{{ $value->id_user}}</td>
                                                        <td>{{ $value->user_name }}</td>
                                                        <td>{{ $value->user_email }} </td>
                                                        <td>{{ $value->user_phone }}</td>
                                                        <td>{{ $value->user_address }}</td>
                                                       <?php 
                                                       if ( $value->id_chucvu == 0){
                                                        ?>
                                                            <td class="btn-danger btn-outline-danger ">{{ $value->ten_chucvu}}</td>
                                                       
                                                        <?php
                                                        }else{
                                                        ?>
                                                        
                                                            <td class="btn-primary btn-outline-primary">{{ $value->ten_chucvu}}</td>
                                                        
                                                        <?php
                                                        }
                                                        ?>
                                                       
                                                       
                                                        <td>
                                                        <button class="btn-sm btn-primary btn-outline-primary showedituser" data-toggle="modal" data-target="#showedituser" data-id_user="{{$value->user_id}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                            <a href="{{URL::to('/delete-user/'.$value->user_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa tài khoản này?')"  >
                                                                <button class="btn-sm btn-danger btn-outline-danger">
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
                      <h4 class="modal-title" id="myModalLabel">Thêm giảng viên</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('insert-user')}}" method="post">
                        @csrf
                       
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Họ tên:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_name" class="form-control"
                                placeholder="Nhập họ tên">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_email" class="form-control"
                                placeholder="Nhập họ tên">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã cán bộ:</label>
                            <div class="col-sm-7">
                                <input type="text" name="id_user" class="form-control"
                                placeholder="Nhập mã cán bộ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Password:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_password" class="form-control"
                                placeholder="Nhập password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">SĐT:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_phone" class="form-control"
                                placeholder="Nhập số điện thoại">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Địa chỉ:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_address" class="form-control"
                                placeholder="Nhập địa chỉ">
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-4 col-form-label">Chuc vu:</label>
                            <div class="col-sm-7">
                                <input type="text" name="id_chucvu" class="form-control"
                                value="1">
                            </div>
                        </div>
                      
               
                       
                       
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-user" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
   
       <!-- Modal update software-->
      
    <div class="modal fade" id="showedituser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Cập nhật thông tin giảng viên</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL('/update-user')}}" method="post">
                        @csrf
                                <input type="hidden" id="user_id" name="user_id">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Họ tên:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_name" id="user_name" class="form-control"
                              >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Email:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_email" id="user_email" class="form-control"
                              >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã cán bộ:</label>
                            <div class="col-sm-7">
                                <input type="text" name="id_user" id="id_user" class="form-control"
                                >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">SĐT:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_phone" id="user_phone" class="form-control"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Địa chỉ:</label>
                            <div class="col-sm-7">
                                <input type="text" name="user_address" id="user_address" class="form-control"
                                >
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
      <!-- Modal show edit software-->  
@endsection