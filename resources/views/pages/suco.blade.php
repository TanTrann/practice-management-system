@section('content')
@extends('welcome')
<div class="row">
        <div class="col-sm-12">
            <div class="showback" style="background-color: white;"> 
                <h2 style="text-align: center; color: blue;"><strong>BÁO CÁO SỰ CỐ</strong> </h2>
                <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?>
            </div>
        </div>   
        <div class="col-sm-12" style="width: 600px;top: -50px">
            <div class="showback" style="background-color: white;"> 
            <h3  style="text-align: center;"><strong>Thông tin báo cáo sự cố</strong> </h3>
                    <div class="" style="width: 500px;">
                    <form action="{{URL::to('/bao-cao-su-co')}}" method="get">
                        <div class=""  style="">
                            <label class="">Phòng:</label>
                            <div class="">
                            <select name="room_id" id="room_id" class="form-control">
                                @foreach ($all_room as $key => $room)
                            <option value="{{$room->room_id}}"> {{$room->room_name}}</option>
                            @endforeach
                            </select>
                        
                               
                            </div>
                        </div>
                        <div class=""  style="">
                            <label class="">Ngày phản ánh:</label>
                            <div class="">

                            <input type="text" name="ngayphananh" id="" class="form-control" value="{{$ngay_phan_anh}}" >
                               
                            </div>
                        </div>
                        <div class=""  style="" >
                            <label class="">Nội dung phản ánh:</label>
                            <div class="">
                            <textarea class="form-control" rows="6" name="noidung" ></textarea> 
                               
                            </div>
                        </div>
                        <div hidden>
                            <input type="text" name="id_user" id="" value="<?php
                                        $name = Session::get('user_id');

                                        if ($name){
                                            echo $name;
                                        }
                                        ?>">   
                        
                        </div>
                     
                        
                        <div class=""  style="" hidden >
                            <label class="">trang thái:</label>
                            <div class="">
                            <input type="text" name="trangthai" id="" value="0">
                               
                            </div>
                        </div>
                      
                        <div class=""  style="" hidden >
                            <label class="">noi dung khac phuc:</label>
                            <div class="">
                            <input type="text" name="noidungkhacphuc" id="" value="Trống">
                               
                            </div>
                        </div>
                        <div class=""  style="" hidden>
                            <label class="">ghichukhac:</label>
                            <div class="">
                            <input type="text" name="ghichukhac" id="" value="Trống">
                               
                            </div>
                        </div>
                       
                        <div class=""  style="" hidden>
                            <label class="">ngaykhacphuc:</label>
                            <div class="">
                            <input type="text" name="ngaykhacphuc" id="" value="Trống">
                               
                            </div>
                        </div>
                        <div class=" "  style="padding-bottom: 40px;padding-top: 10px;" >
                          
                            <div class="" style="float: right">
                                <input type="submit" class="btn btn-primary btn-sm" style="background-color: blue;" value="Báo cáo" 
                                 >
                            </div>
                        </div>
                        </form>
                    </div>
            </div>
        </div>  
        
        <div class="col-sm-12"  style="top: -70px">
            <div class="showback" style="background-color: white;"> 
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Danh sách sự cố</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-"></i>Phòng</th>             
                    <th><i class="fa fa-bullhorn"></i> Nội dung phản ảnh</th>
                    <th><i class=" fa fa-calendar"></i> Ngày phản ánh</th>
                    <th class="hidden-phone"><i class="fa fa-question-circle"></i> Trang thái</th>
                    <th><i class="fa fa-info"></i> Nội dung khắc phục</th>
                    <th><i class=" fa fa-comment"></i> Ghi chú khác</th>
                   
                    <th><i class=" fa fa-calendar"></i> Ngày khắc phục</th>
                    <th><i class=" fa fa-user"></i> GV phản ánh</th>
                    <th>Quản lý</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      @foreach ($all_suco as $key => $suco)
                    <td>{{$suco->room_name}}</td>
                    <td>{{$suco->noidung}}</td>
                    <td>{{$suco->ngayphananh}}</td>
                    <td>
                        @if($suco->trangthai== 0)
                        <span class="label label-warning label">Đang xử lý</span>
                        @else
                        <span class="label label-warning label" style="background-color: green;">Đã xử lý</span>
                        @endif
                    </td>
                    <td>{{$suco->noidungkhacphuc}}</td>
                    <td>{{$suco->ghichukhac}}</td>
                   
                    <td>{{$suco->ngaykhacphuc}}</td>
                    <td>{{$suco->user_name}}</td>
                    @if($suco->trangthai== 0)
                    <td>
                        <a href="{{URL::to('/delete-suco/'.$suco->suco_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa báo cáo này?')"  >
                            <button class="btn"> <i  class="fa fa-trash" style="color: red;"></i></button>
                        </a>
                    </td>
                    @else
                    <td><button class="btn" disabled> <i  class="fa fa-lock" ></i></button></td>
                    @endif
                  </tr>
                     @endforeach
                </tbody>
              </table>
              
            </div>
        </div>   
</div>

            
@endsection
