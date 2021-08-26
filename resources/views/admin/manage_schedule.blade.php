@section('admin_content')
@extends('admin_layout')

<div class="main-body">
    <div class="page-wrapper">
        <div class="page-body">
<!-- Front-icon Breadcrumb card start -->
<div class="card page-header p-0">
                <div class="card-block front-icon-breadcrumb row align-items-end">
                    <div class="breadcrumb-header col">
                        <div class="big-icon">
                            <i class="ti-notepad"></i>
                        </div>  
                        <div class="d-inline-block">
                      
                            <h4><strong>Quản lý thời khóa biểu</strong></h4>
                            
                            <h6> Cập nhật thời khóa biểu</h6>
                           
                            
                        </div>
                        <br>
                        <span id="session"> 
                                            <?php
                                            $message = Session::get('message');
                                            if ($message){
                                            echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                                Session::put('message',null);
                                                }
                                            ?>
                            </span>
                    </div>
                </div>
            </div>
            <!-- Front-icon Breadcrumb card end -->
  <!-- Material tab card start -->

       
                        <div class="card col-sm-7">
                                            
                            <div class="card-block ">
                                <!-- Row start -->
                                
                                   
                                        <!-- form nhập tkb -->
                                        <form action="" method="post">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Học kì:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control"
                                                placeholder="Nhập học kì">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Ngày bắt đầu:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control"
                                                placeholder="Nhập Ngày bắt đầu">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Ngày kết thúc:</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control"
                                                placeholder="Nhập Ngày kết thúc">
                                            </div>
                                        </div>
                                        <div class="form-group row col-sm-4 " >
                                        <button type="submit" class="btn btn-primary" >Cập nhật</button>
                                        </div>
                                        </form>
                                         <!-- form nhập tkb end -->
                                    </div>
                                
                            </div>
                                <!-- Row end -->          
                        </div>
                        <!-- Material tab card end -->
        </div>
</div>  
@endsection