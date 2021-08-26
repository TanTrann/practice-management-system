@extends('admin_layout')
@section('admin_content')


<div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                        <div class="row">
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class=" ti-server bg-c-blue card1-icon"></i>
                                                        <span class="text-c-blue f-w-600">Số phòng</span>
                                                        <h4>{{$count_room}} phòng</h4>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="ti-microsoft-alt bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Số phần mềm</span>
                                                        <h4>{{$count_software}} phần mềm</h4>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="ti-desktop bg-c-green card1-icon"></i>
                                                        <span class="text-c-green f-w-600">Số máy</span>
                                                        <h4>{{$count_pc}} máy</h4>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                                                        <span class="text-c-yellow f-w-600">Số cán bộ</span>
                                                        <h4>+562</h4>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- Statestics Start -->
                                            <div class="col-md-12 col-xl-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>THỜI KHÓA BIỂU</h3> 
                                                        <h5>Học kỳ: </h5>
                                                        <br>
                                                       <h5>Ngày bắt đầu: </h5> 
                                                       <br>
                                                       <h5> Ngày kết thúc:</h5>
                                                    </div>
                                                    <div class="card-block">
                                                       <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs md-tabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#home3" role="tab">Tuần1</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Tuần2</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#messages3" role="tab">Tuần3</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#settings3" role="tab">Tuần4</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                        </ul>
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
                                                                            <td>phong 1</td>   
                                                                            <td>Otto</td>
                                                                            <td>@mdo</td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>phong 2</td>
                                                                            <td>Thornton</td>
                                                                            <td>@fat</td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>phong 3</td>
                                                                            <td>the Bird</td>
                                                                            <td>@twitter</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th rowspan="3">Chiều</th> 
                                                                            <td>phong 1</td>   
                                                                            <td>Otto</td>
                                                                            <td>@mdo</td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>phong 2</td>
                                                                            <td>Thornton</td>
                                                                            <td>@fat</td>
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>phong 3</td>
                                                                            <td>the Bird</td>
                                                                            <td>@twitter</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                            </div>
                                                            <div class="tab-pane" id="profile3" role="tabpanel">
                                                                <p class="m-0">2.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                                            </div>
                                                            <div class="tab-pane" id="messages3" role="tabpanel">
                                                                <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
                                                            </div>
                                                            <div class="tab-pane" id="settings3" role="tabpanel">
                                                                <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                            
                                           
                                           

@endsection