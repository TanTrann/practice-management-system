@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
<div class="row mt">

<div class="col-sm-12"  >
            <div class="showback" style="background-color: white;"> 
            <table class="table table-striped table-advance table-hover" id="mytable">
                <h3><i class="fa fa-angle-right"></i>Quản lý sự cố</h3>
                <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?>
               
               <p>Danh sách sự cố</p>
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
                    <td>
                    {{$suco->noidung}}
                    </td>
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
                    <td>  
                         @if($suco->trangthai== 0)
                         <button class="btn-sm update-suco" data-toggle="modal"  data-target="#showsuco"  data-id_suco="{{$suco->suco_id}}" style="color: green;"> Xử lý</button>
                        @else
                        <button class="btn-sm update-suco" data-toggle="modal"  data-target="#showsuco"  data-id_suco="{{$suco->suco_id}}" style="color: green;"><i class="fa fa-pencil"></i></button>
                      
                        @endif
                        <a href="{{URL::to('/delete-suco/'.$suco->suco_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa báo cáo này?')"  >

                        <button class="btn-sm"> <i  class="fa fa-trash" style="color: red;"></i></button>
                        </a>
                    </td>
                  </tr>
                     @endforeach
                </tbody>
              </table>
              
            </div>
        </div>   
</div>
</section>


   
<div class="modal fade" id="showsuco" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
            <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Chỉnh sửa nội dung sự cố</h4>
                </div>
                
                <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 97px;">
                    
                
                    <form action="{{url('/edit-su-co')}}" method="post">
                        @csrf
                        <div class="form-group row" hidden>
                            <label class="col-sm-3 col-form-label">ID:</label>
                            <div class="col-sm-11">
                               <input type="text" name="suco_id" id="suco_id2" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phòng:</label>
                            <div class="col-sm-10">
                                <select name="room_id" id="room_id2" class="form-control" disabled>
                                    @foreach($all_room as $key => $room_val )
                                  <option value="{{$room_val->room_id}}">{{ $room_val -> room_name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nội dung phản ảnh:</label>
                            <div class="col-sm-10">
                               <input type="text" name="noidung" id="noidung2" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-3 col-form-label">Trạng thái:</label>
                            <div class="col-sm-10">
                               <input type="text" name="trangthai" value="1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ngày phản ảnh:</label>
                            <div class="col-sm-10">
                               <input type="text" name="ngayphananh" id="ngayphananh2" value="" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ngày khắc phục:</label>
                            <div class="col-sm-10">
                               <input type="text" name="ngaykhacphuc" id="ngaykhacphuc2" value="{{$ngay_khac_phuc}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nội dung khắc phục:</label>
                            <div class="col-sm-10">
                               <input type="text" name="noidungkhacphuc" id="noidungkhacphuc2" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Ghi chú khác:</label>
                            <div class="col-sm-10">
                              <textarea name="ghichukhac" id="ghichukhac2" rows="8" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row" hidden>
                            <label class="col-sm-3 col-form-label">id user:</label>
                            <div class="col-sm-10">
                            <input type="text" name="id_user" id="id_user2" value="" class="form-control">
                              
                            </div>
                        </div>
                        
                </div>
            </div>      
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="">Xử lý</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                    </form>
                </div>
        </div>
        </div>
    </div> </div>
@endsection