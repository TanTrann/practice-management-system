@section('admin_content')
@extends('admin_layout')

<div class="pcoded-inner-content">
    <div class="card">
        <div class="pcoded-inner-content">
            <div class="card-header">
                <h3>Chi tiết phần mềm</h3>
                    <?php
                        $message = Session::get('message');
                        if ($message){
                        echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                            Session::put('message',null);
                        }
                    ?>
            </div>
                
<div class="page-body">
    <div class="row">   
        <!-- Hover table card start -->
        <div class="col-md-8 col-xl-8">
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
                                        <i class="ti-plus"></i>
                                    </button>
                                    <button class="btn-sm btn-primary btn-outline-primary showeditsoftware" data-toggle="modal" data-target="#showeditsoftware" data-id_software="{{$value->software_id}}">
                                        <i class="ti-pencil"></i>
                                    </button>
                                    <button class="btn-sm btn-danger btn-outline-danger"  data-toggle="modal" data-target="#showeditsoftware" data-id_software="{{$value->software_id}}">
                                        <i class="ti-trash"></i>
                                    </button>                         
                        @endforeach
                            </tr>                                                
                    </tbody>
                </table>
            </div>
        </div>

    <div class="col-md-10 col-xl-4">                 
        <div class="card-block table-border-style">
                <div class="table-responsive">
                    <div class="card fb-card">
                        <div class="card-header">
                            <div class="d-inline-block">
                                @foreach( $detail_software as $key => $detail)
                                    <h5>Tên phần mềm: {{$detail->software_name}}</h5>
                                @endforeach
                                <span>Tất cả phiên bản</span>
                            </div>
                        </div>
                    
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Phiên bản</th>
                                        <th style="width: 200px;">Quản lý</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $detail_ver as $key => $ver)
                                        <tr>
                                            <th>{{$ver->version_number}}</th>
                                            <th> <button class="btn-sm btn-danger btn-outline-danger" >
                                                    <i class="ti-trash"></i>
                                                </button></th>   
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    
                    </div> 
                </div>
            </div>                                    
        </div>
    </div>
</div> 


<!-- Modal thêm phần mềm-->
<div class="modal fade" id="add-software" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title data_service_quickview_title" id="">
                                <Strong>Thêm phần mềm</Strong>           
                <span id="data_service_quickview_title"></span>
                
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
            <h5 class="modal-title data_service_quickview_title" id="">
                                <Strong>Cập nhật tên phần mềm</Strong>           
                <span id="data_service_quickview_title"></span>
                
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
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
                                                        @foreach($all_version as $key => $version)
                                                        <tr>
                                                            
                                                            <th id="software_title" >{{$version->software_name}}</th>
                                                          
                                                            <th id="software_number">{{$version->version_number}}</th>
                                                        
                                                            <td>  <a href="{{URL::to('/delete-version/'.$version->version_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa phiên bản này?')"  style="float: right;">
                                                              <i class="ti-trash" style="color:red"></i>
                                                            </a></td>
                                                          @endforeach
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







