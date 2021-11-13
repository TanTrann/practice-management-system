@section('content')
@extends('welcome')




    <!-- blogs -->
    <div class="section">
        <div class="container">
          
           
            <div class="blog row-revere" style="width: 70%;margin-left: 161px; background-color: #EEEEEE">
                <div class="blog-img">
                      
                    <table class="menu" border="1px solid">  
                        
                        <tr>
                            <th>    
                                <a href="{{URL::to('/tkb')}}">
                                <img src="public\frontend\images\Calendar_perspective_matte.png" alt="schedule-icon" width="500" height="500">
                                <p>Lịch thực hành</p>
                                </a>
                            </th>
                            <th>
                                <a href="{{URL::to('/dangki-tkb')}}">
                                <img src="public\frontend\images\Notebook_perspective_matte.png" alt="user-icon" width="500" height="500">
                                <p>Đăng kí lịch</p>
                                </a>
                            </th>                       
                        </tr>  
                        <tr>
                            <th>
                                <a href="{{URL::to('/my-calendar')}}">
                                <img src="public\frontend\images\Clipboard_perspective_matte.png" alt="user-icon" width="500" height="500">
                                <p>Lịch của bạn</p>
                                </a>
                            </th>
                            <th>
                                <a href="#">
                                <img src="public\frontend\images\User_icon.png" alt="user-icon" width="500" height="500">
                                <p>Thông tin cán bộ</p>
                                </a>
                            </th>
                        </tr>
                        
                    </table>
                </div>
                <div class="blog-info">
                    <h3>Thông tin cán bộ</h3>
                    <hr>
                    <br>
					<div class="thongtin-form">	
						<table border="1px solid" class="in4">
                                @foreach($in4 as $key => $tt)
                                <tr>
                                    <th>Họ tên: </th>
                                    <td>{{$tt -> user_name}}</td>
                                </tr>
                                <tr>
                                    <th>Mã cán bộ:</th>
                                    <td>{{$tt -> id_user}}</td>
                                </tr>
                                <tr>
                                    <th>SDT:</th>
                                    <td>{{$tt -> user_phone}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$tt -> user_email}}</td>
                                </tr>
                                <tr>
                                    <th>Quê quán:</th>
                                    <td>{{$tt -> user_address}}</td>
                                </tr>
                                @endforeach

                                
                               
                                

                        </table>
					</div>
                </div>
            </div>
            
        </div>

@endsection