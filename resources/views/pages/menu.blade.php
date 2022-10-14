@section('content')
@extends('welcome')


    <!-- blogs -->
    <div class="section">
        <div class="container">
        
            <div class="blog row-revere" style="width: 87%;margin-left: 76px; background: url('public/frontend/images/lock-bg.jpg'); background-repeat: no-repeat; background-size: 100%  100%;">
           
                <div class="blog-img" style="padding: 5px 5px;" >
                      
                    <table class="menu" >  
                        
                        <tr  > 
                            <th style="padding: 5px 5px;">    
                            <button class="btn-lg" style="width:210px; height:220px;" >
                                <a href="{{URL::to('/tkb')}}" style=" text-decoration: none;" class="icon-menu">
                                <img src="public\frontend\images\Calendar_perspective_matte.png" alt="schedule-icon" >
                                <p>Lịch thực hành</p>
                                </a>
                            </button>
                            </th>
                            <th>
                             <button class="btn-lg" style="width:210px; height:220px; ">
                                <a href="{{URL::to('/dangki-nhomth')}}" style=" text-decoration: none;" class="icon-menu">
                                <img src="public\frontend\images\Notebook_perspective_matte.png" alt="user-icon" >
                                <p>Đăng kí nhóm</p>
                                </a>
                            </button>
                            </th>                       
                        </tr>  
                        <tr>
                            <th>
                                <button class="btn-lg" style="width:210px; height:220px; ">
                                <a href="{{URL::to('/my-calendar')}}" style=" text-decoration: none;" class="icon-menu">
                                <img src="public\frontend\images\Clipboard_perspective_matte.png" alt="user-icon" >
                                <p>Nhóm của bạn</p>
                                </a>
                                </button>
                            </th>
                            <th>
                                <button class="btn-lg" style="width:210px; height:220px; ">
                                <a href="{{URL::to('/su-co')}}" style=" text-decoration: none;">
                                <img src="public\frontend\images\caution.png" alt="user-icon" >
                                <p>Báo cáo sự cố</p>
                                </a>
                                </button>
                            </th>
                         
                        </tr>
                       
                        
                    </table>
                </div>
                <div class="info-canbo" style="">
        
                    <th style="padding: 5px 5px;">
                        <div class="showback" style="border: 1px solid; background-color: #fff; width: 458px;margin: 9px 13px 0 0; height: 445px;">
                        
                       
                        <h3 style="text-align: center;padding-bottom: 45px;"><strong>THÔNG TIN CÁN BỘ</strong></h3>
                            <table class="table tab-pane"  >
                                @foreach($in4 as $key => $inf)
                                <tr>
                                    <th style="padding: 10px;">
                                       Họ tên:
                                    </th>
                                    <td style="padding: 10px;">
                                        {{$inf->user_name}} 
                                    </td>
                                </tr>
                                <tr>
                                    <th style="padding: 10px;">
                                       Email:
                                    </th>
                                    <td  style="padding: 10px;">
                                        {{$inf->user_email}} 
                                    </td>
                                </tr>
                                <tr>
                                    <th  style="padding: 10px;">
                                        Mã cán bộ:
                                    </th>
                                    <td  style="padding: 10px;">
                                        {{$inf->id_user}} 
                                    </td>
                                </tr>
                                <tr>
                                    <th  style="padding: 10px;">Thuộc khoa:</th>
                                    <td  style="padding: 10px;"> {{$inf->khoa}} </td>
                                </tr>

                                <tr>
                                    <th  style="padding: 10px;">
                                        SĐT:
                                    </th>
                                    <td  style="padding: 10px;">
                                    {{$inf->user_phone}}
                                    </td>
                                </tr>
                                <tr>
                                    <th  style="padding: 10px;">
                                        Quê quán:
                                    </th>
                                    <td  style="padding: 10px;">
                                    {{$inf->user_address}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </th>
                       
                </div>
            
        </div>
@endsection