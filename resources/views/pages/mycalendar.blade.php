@section('content')
@extends('welcome')
<section class="">
    <div class="row">
        <div class="col-sm-12">
            <div class="showback" style="background-color: white;"> 
                <h2 style="text-align: center; color: blue;"><strong>NHÓM CỦA BẠN</strong> </h2>
                <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?>
            </div>
        </div>             

        <div class="col-sm-12"  >
                <div class="showback" style="background-color: white;"> 
                    <h3>>Danh sách nhóm thực hành</h3>
                    <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?> 
                        <table class="table table-striped " style="text-align: center;" id="mytable22" > 
                            <thead>
                                <tr>
                                  
                                    <th>Nhóm</th>
                                    <th>Năm học</th>
                                    <th>Học kỳ</th>
                                    <th>Học phần</th>
                                    <th>STT lớp học phần</th>
                                    <th>Số lượng</th>
                                    <th>Tiết bắt đầu</th>
                                    <th>Số tiết</th>
                                    <th>Tuần</th>
                                    <th>Phòng</th>
                                    <th>Trạng thái</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                               
                                </tr>
                            @foreach($all_cal as $key => $lophp)
                                <tr>
                               
                                    <td name="nhom_id">{{$lophp->nhom_id}}</td>
                                    <td>{{$lophp->namhoc}}</td>
                                    <td>{{$lophp->hocky}}</td>
                                    <td>{{$lophp->mahp}} - {{$lophp->tenhp}}</td>
                                    <td>{{$lophp->sttlophp}}</td>
                                    <td>{{$lophp->soluong}}</td>
                                    <td>{{$lophp->tietbd_lophp}}</td>
                                    <td>{{$lophp->sotiet_lophp}}</td>
                                    <td>
                                   
                                    @foreach($lk_tuan as $key => $val_tuan)
                                    @if($lophp->nhom_id == $val_tuan->nhom_id)
                                    {{$val_tuan->tuan_id}}
                                    @else
                                    @endif
                                    @endforeach
                                    </td>
                                    <td>
                                    
                                    @foreach($all_nhom as $key => $val_nhom)
                                    @if($lophp->nhom_id == $val_nhom->nhom_id)
                                        {{$val_nhom->room_name}}
                                        @else
                                    @endif 
                                    @endforeach
                                    </td>
                                    @if($lophp->check_dki == 0)
                                    <td style="background-color: orange; color: white;">Chưa sắp lịch</td>
                                    @else
                                    <td style="background-color: green; color: white;">Đã sắp lịch</td>
                                    @endif
                                    @if($lophp->check_dki == 0)

                                    @else
                                   
                                    @endif
                               
                                </tr>
                                @endforeach  
                            </tbody>
                        </table>
                </div>
            </div>   


@endsection