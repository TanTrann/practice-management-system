@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
    <div class="row mt">
        <div class="col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            <div class="card-header">
            <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#add-software" style="float: right;">Thêm học kì</button> 
            <div class="card-header">
                <h3>Danh sách học kì</h3>
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
                                                    <th>Tên học phần</th>
                                                    <th>Số buổi</th>
                                                    <th>Ngày bắt đầu</th>
                                                    <th>Ngày kết thúc</th>
                                                    <th>Quản lý</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                        @foreach($all_subject as $key => $val)
                                                           
                                                            <td>{{$val->subject_id}}</td>
                                                            <td>{{$val->subject_name}}</td>
                                                            <td>{{$val->so_buoi}}</td>
                                                            <td>{{$val->ngay_bd}}</td>
                                                            <td>{{$val->ngay_kt}}</td>
                                                            <td>
                                                                <button class="btn showeditsemester " data-toggle="modal" data-target="#showeditsemester"    data-id_subject="{{$val->subject_id}}" ><i class="fa fa-pencil " style="color: green;" ></i></button>
                                                                <button class="btn" style="color: red;">
                                                                <i class="fa fa-trash"></i>
                                                                </button>
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
                            <label class="col-sm-4 col-form-label">Tên học phần:</label>
                            <div class="col-sm-7">
                                <input type="text" name="subject_name" class="form-control"
                                placeholder="Nhập học phần">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số buổi:</label>
                            <div class="col-sm-7">
                                <input type="text" name="so_buoi" class="form-control"
                                placeholder="Nhập số buổi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ngày bắt đầu:</label>
                            <div class="col-sm-7">
                                <input type="date" name="ngay_bd" class="form-control"
                                >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ngày kết thúc:</label>
                            <div class="col-sm-7">
                                <input type="date" name="ngay_kt" class="form-control"
                                >
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
        
       <!-- Modal add version software-->
      
    <div class="modal fade" id="addversionsoftware" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title data_service_quickview_title" id="">
                                <Strong>Thêm phiên bản</Strong>           
                <span id="data_service_quickview_title"></span>
                
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL('/add-ver-software')}}" method="post">
                        @csrf
                        <div class="form-group row">
                        <input type="hidden" name="software_id" id="software_id" >
                        <span id="software_quickview_id"></span>
                            <label class="col-sm-3 col-form-label">Tên phần mềm:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="software_title"
                                placeholder="Nhập tên phần mềm" disabled>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phiên bản:</label>
                            <div class="col-sm-10">
                                <input name="version_number" type="text" class="form-control" id="version_number"
                                placeholder="Nhập phiên bản">
                            </div>
                        </div>
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary editbtn" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>

    </div>
     <!-- Modal add version software-->
       <!--Xem thêm ver software-->
      
       <div class="modal fade" id="xemthem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title " >
                  
             Lịch sử phiên bản     
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-10" style="margin-left: 60px;">
                    
                
                    <form action="" method="post">
                        @csrf
                          <!-- Hover table card start -->
                          <input type="hidden" name="software_id" id="software_id" >   
                          <div class="card">
                                      
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="mytable2">
                                              
                                                    <thead>
                                                        <tr>
                                                            <th>Tên phần mềm</th>
                                                            <th>Phiên bản</th>
                                                            <th>Xóa</th> 
                                                        </tr>
                                                        
                                                    </thead>
                                                    <tbody>
                                                      
                                                        <tr>
                                                            
                                                            <th id="software_title" ></th>
                                                          
                                                            <th id="software_number"></th>
                                                        
                                                            <td>  <a href=""  onclick="return confirm('Bạn có chắc là muốn xóa phiên bản này?')"  style="float: right;">
                                                              <i class="fa fa-trash" style="color:red"></i>
                                                            </a></td>
                                                          
                                                        </tr>
                                                       
                                                      
                                                    </tbody>
                                                  
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                   
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
       
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>

    </div>
     <!-- Xem thêm ver software-->      









@endsection