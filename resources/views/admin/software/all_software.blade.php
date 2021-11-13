@section('admin_content')
@extends('admin_layout')
<section class="wrapper">
<div class="row mt">
<div class="col-sm-12">
    <div class="showback">
         
    <div class="pcoded-inner-content"><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#add-software" style="float: right;">Thêm phần mềm</button>    <div class="card-header-left">
                                            <!-- <button type="button" class=" btn btn-info  xemthem" data-toggle="modal" data-target="#xemthem" style="float: right;margin-right: 23px;" >Lịch sử thêm phiên bản</button><div class="card-header-left"> -->
            <div class="card-header">
                <h3>Quản lý phần mềm</h3>
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
                                        <table class="table table-hover"  id="mytable" >
                                          
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên phần mềm</th>
                                                    <th>Phiên bản</th>
                                                    <th style="width: 200px;">Quản lý</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($all_software as $key => $value)
                                                <tr>
                                                    <th>{{$value->software_id}}</th>
                                                    <td>{{$value->software_name}}</td>
                                                   
                                                    <td> <a href="{{URL::to('/chi-tiet-phan-mem/'.$value->software_id)}}"> <button>Xem chi tiết</button></a></td>
                                                 
                                                    <td>
                                                        <button class="btn-sm btn-success btn-outline-success addversionsoftware" data-toggle="modal" data-target="#addversionsoftware" data-id_software="{{$value->software_id}}">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                        <button class="btn-sm btn-primary btn-outline-primary showeditsoftware" data-toggle="modal" data-target="#showeditsoftware" data-id_software="{{$value->software_id}}">
                                                            <i class="fa fa-pencil"></i>
                                                        </button>
                                                        <a href="{{URL::to('/delete-software/'.$value->software_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa phần mềm này?')"  >

                                                            <button class="btn-sm btn-danger btn-outline-danger" >
                                                                <i class="fa fa-trash"></i>
                                                            </button>        
                                                        </a>
                                                    @endforeach
                                                </tr>
                                               
                                                
                                            </tbody>
                                        </table>
                                    </div>
                              
                            <!-- Hover table card end -->
                    
                </div>
    </div>
            
           
    
 <!-- Modal thêm phần mềm-->
 <div class="modal fade" id="add-software" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            
            <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm phần mềm </h4>
            </div>
       
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL::to('save-software')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            
                            <label class="col-sm-3 col-form-label">Tên phần mềm:</label>
                            <div class="col-sm-10">
                                <input name="software_name" type="text" class="form-control"
                                placeholder="Nhập tên phần mềm">
                            </div>
                        </div>
                        
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="">Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
        <!-- Modal update software-->
      
    <div class="modal fade" id="showeditsoftware" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Cập nhật tên phần mềm </h4>
          
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <form action="{{URL('/update-software')}}" method="post">
                        @csrf
                        <div class="form-group row">
                        <input type="hidden" name="software_id" id="software_quickview_id" >
                        <span id="software_quickview_id"></span>
                            <label class="col-sm-3 col-form-label">Tên phần mềm:</label>
                            <div class="col-sm-10">
                                <input name="software_name" type="text" class="form-control" id="software_quickview_title"
                                placeholder="Nhập tên phần mềm">
                            </div>
                        </div>
                        
                        
                    
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary editbtn" >Cập nhật</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>

    </div>
      <!-- Modal show edit software-->
       <!-- Modal add version software-->
      
    <div class="modal fade" id="addversionsoftware" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm phiên bản </h4>
                
            
           
              
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
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Lịch sử phiên bản </h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-10" style="margin-left: 60px;padding-bottom: 203px;">
                    
                
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
                                                @foreach($all_version as $key => $version)
                                                <tr>
                                                    
                                                    <th id="software_title" >{{$version->software_name}}</th>
                                                    
                                                    <th id="software_number">{{number_format((float)$version->version_number, 1, '.', '')}}</th>
                                                
                                                    <td>  <a href="{{URL::to('/delete-version/'.$version->version_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa phiên bản này?')"  style="float: right;">
                                                        <i class="fa fa-trash" style="color:red"></i>
                                                    </a></td>
                                                    @endforeach
                                                </tr>
                                                
                                                
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </form>              
                    
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
    
                                </section>
@endsection







