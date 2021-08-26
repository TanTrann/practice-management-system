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
                      
                            <h4><strong>Thời khóa biểu</strong></h4>
                            
                            <h6> Học kì : <strong style="color: red;"> </strong>
                            Ngày bắt đầu : <strong style="color: red;"> </strong>
                             Ngày kết thúc : <strong style="color: red;"> </strong></h6>
                           
                            
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
                <div class="card-header-left">
                <h4>Cập nhật lịch</h4>
                            </div>                         
                   
                        <!-- form nhập tkb -->
                        <form action="{{URL::to('update-schedule')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Học kì:</label>
                            <div class="col-sm-7">
                                 <select name="hki" id="" class="form-control">
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                 </select>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ngày bắt đầu:</label>
                            <div class="col-sm-7">
                                <input type="date" name="date_start" class="form-control"
                                placeholder="Nhập Ngày bắt đầu">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Ngày kết thúc:</label>
                            <div class="col-sm-7">
                                <input type="date" name="date_end" class="form-control"
                                placeholder="Nhập Ngày kết thúc">
                            </div>
                        </div>
                        <div class="form-group row col-sm-4 " >
                        <button type="submit" class="btn btn-primary update-schedule" >Cập nhật</button>
                        </div>
                        </form>
                            <!-- form nhập tkb end -->
                    </div>
                
            </div>
                <!-- Row end -->          
        </div>
        <!-- Material tab card end -->
  <!-- Material tab card start -->

       
                        <div class="card">
                        <div class="card-header">
                                                        <table>
                                                        <h4>THỜI KHÓA BIỂU</h4> 
                                                        @foreach ($all_schedule as $key => $value)
                                                            <tr>
                                                                <td>Học kì</td>
                                                                <td style="color:green;font-size: 14px;">{{$value->hoc_ki}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Ngày bắt đầu:</td>
                                                                <td style="color:green;font-size: 14px;">{{date('d-m-Y', strtotime($value->date_start))}}</td>
                                                                
                                                            </tr>
                                                            <tr>
                                                                <td> Ngày kết thúc:</td>
                                                                <td style="color:green;font-size: 14px;">{{date('d-m-Y', strtotime($value->date_end))}}</td>
                                                               
                                                                
                                                            </tr>

                                                        </table>
                                                        @endforeach
                                                       
                                                       
                                                       
                                                      
                                                    </div>
                            <div class="card-block">
                                
                                <!-- Row start -->
                                <div class="row m-b-30">
                                            
                                    <div class="col-lg-12 ">
                                       
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs md-tabs" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">Tuần 1</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Tuần 2</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#messages3" role="tab">Tuần 3</a>
                                                <div class="slide"></div>
                                            </li>
                                            
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content card-block">
                                            
                                            <div class="tab-pane active" id="home3" role="tabpanel">
                                            <div class="card-block table-border-style">
                                                
                                            <div class="table-responsive">
                                                
                                            <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            
                                                                            <th>Buổi</th>
                                                                            <th>Phòng</th>
                                                                            <th>Thứ 2</th>
                                                                            <th>Thứ 3</th>
                                                                            <th>Thứ 4</th>
                                                                            <th>Thứ 5</th>
                                                                            <th>Thứ 6</th>
                                                                            <th>Thứ 7</th>
                                                                            <th>Chủ nhật</th> 
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th rowspan="3">Sáng</th> 
                                                                            <td>Phong 1</td>   
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>phong 2</td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>phong 3</td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th rowspan="3">Chiều</th> 
                                                                            <td>phong 1</td>   
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>phong 2</td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>phong 3</td>
                                                                            <td></td>
                                                                            <td></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                            </div>
                                        </div>
                                            </div>
                                            <div class="tab-pane" id="profile3" role="tabpanel">
                                            <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                            <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Username</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>@fat</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td>the Bird</td>
                                                            <td>@twitter</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                            </div>
                                            <div class="tab-pane" id="messages3" role="tabpanel">
                                            <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                            <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Username</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td>Otto</td>
                                                            <td>@mdo</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td>Thornton</td>
                                                            <td>@fat</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td>the Bird</td>
                                                            <td>@twitter</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                            </div>
                                          
                                        </div>
                                    </div>
                                
                                <!-- Row end -->   
                            </div>
                        </div>
                        <!-- Material tab card end -->
                        </div>
           
        </div>  
@endsection