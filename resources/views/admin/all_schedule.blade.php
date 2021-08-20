@section('admin_content')
@extends('admin_layout')
  <!-- Material tab card start -->
  <div class="pcoded-inner-content">
       
                        <div class="card">
                            <div class="card-header">
                                <h3>Thời khóa biểu</h3>
                                <div class="card-header-right">    <ul class="list-unstyled card-option">        <li><i class="icofont icofont-simple-left "></i></li>        <li><i class="icofont icofont-maximize full-card"></i></li>        <li><i class="icofont icofont-minus minimize-card"></i></li>        <li><i class="icofont icofont-refresh reload-card"></i></li>        <li><i class="icofont icofont-error close-card"></i></li>    </ul></div>
                            </div>
                            <div class="card-block">
                                <!-- Row start -->
                                <div class="row m-b-30">
                                    <div class="col-lg-12 ">
                                       
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
                                
                                <!-- Row end -->   
                            </div>
                        </div>
                        <!-- Material tab card end -->
                        </div>
           
                        
@endsection