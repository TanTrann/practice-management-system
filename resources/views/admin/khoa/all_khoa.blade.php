@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
        <div class="row mt">
        <div class="col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            <div class="card-header">
            <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#add-software" style="float: right;">Thêm khoa</button> 
            <div class="card-header">
                <h3>>Quản lý đơn vị</h3>
                    <?php
                                $message = Session::get('message');
                                if ($message){
                                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                    Session::put('message',null);
                                    }
                            ?>
                </div>
       <p>Danh sách đơn vị</p>
                
                            <!-- Hover table card start -->
                         
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                            <div class="card-block">
                                            <table class="table table-striped b-t b-light" id="mytable">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Mã đơn vị</th>
                                                    <th>Tên đơn vị</th>
                                                    <th >Quản lý</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($all_khoa as $key => $value)
                                                    
                                                    @csrf
                                                    <tr>
                                                        <td>{{ $value->khoa_id}}</td>
                                                        <td>{{ $value->ma_khoa}}</td>
                                                        <td>{{ $value->ten_khoa }}</td>
                                                        <td>
                                                        <button class="btn-sm btn-primary btn-outline-primary showeditkhoa" data-toggle="modal" data-target="#showeditkhoa" data-id_khoa="{{$value->khoa_id}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                            <a href="{{URL::to('/delete-khoa/'.$value->khoa_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa khoa này?')"  >
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
                      <h4 class="modal-title" id="myModalLabel">Thêm đơn vị</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('insert-khoa')}}" method="post">
                        @csrf
                       
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã đơn vị:</label>
                            <div class="col-sm-7">
                                <input type="text" name="ma_khoa" class="form-control"
                                placeholder="Nhập mã đơn vị">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tên đơn vị:</label>
                            <div class="col-sm-7">
                                <input type="text" name="ten_khoa" class="form-control"
                                placeholder="Nhập tên đơn vị">
                            </div>
                        </div>
                       
                      
               
                       
                       
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-khoa" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
   
       <!-- Modal update software-->
      
    <div class="modal fade" id="showeditkhoa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Cập nhật thông tin đơn vị</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL('/update-khoa')}}" method="post">
                        @csrf
                                <input type="hidden" id="khoa_id" name="khoa_id">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mã đơn vị:</label>
                            <div class="col-sm-7">
                                <input type="text" name="ma_khoa" id="ma_khoa" class="form-control"
                              >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tên đơn vị:</label>
                            <div class="col-sm-7">
                                <input type="text" name="ten_khoa" id="ten_khoa" class="form-control"
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