@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
        <div class="row mt">
        <div class="col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            <div class="card-header">
            <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#add-software" style="float: right;">Thêm học kỳ</button> 
            <div class="card-header">
                <h3>>Quản lý học kỳ</h3>
                    <?php
                                $message = Session::get('message');
                                if ($message){
                                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                    Session::put('message',null);
                                    }
                            ?>
                </div>
       
                <p>Danh sách học kỳ</p>
                            <!-- Hover table card start -->
                         
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                            <div class="card-block">
                                        <table class="table table-hover"  id="mytable" >
                                          
                                            <thead>
                                                <tr>       
                                                    <th>ID</th> 
                                                    <th>Năm học</th>
                                                    <th>Học kỳ</th>
                                                    <th>Số tuần</th>
                                                   
                                                    <th>Trạng thái</th>
                                                    <th>Quản lý</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                        @foreach($all_schedule as $key => $val)
                                                            <td>{{$val->schedule_id}}</td>
                                                            <td>{{$val->namhoc}}</td>
                                                            <td>{{$val->hoc_ki}}</td>
                                                            <td>{{$val->week_quantity}}</td>
                                                            

                                                            <td><span class="text-ellipsis">
                                                                <?php
                                                                if($val->schedule_status==0){
                                                                    ?>
                                                                    <a href="{{URL::to('/unactive-hoc-ki/'.$val->schedule_id)}}"><i class="fa fa-thumb-up" style="font-size: 30px; color:green;"></i><button class="btn">Ẩn</button></a>
                                                                    <?php
                                                                    }else{
                                                                    ?>  
                                                                    <a href="{{URL::to('/active-hoc-ki/'.$val->schedule_id)}}"><i class="fa fa-thumb-down" style="font-size: 30px; color:red;"></i><button class="btn">Hiện</button></a>
                                                                    <?php
                                                                }
                                                                ?>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <button class="btn edit-schedule" data-toggle="modal" data-target="#showeditschedule"    data-id_schedule="{{$val->schedule_id}}" ><i class="fa fa-pencil " style="color: green;" ></i></button>
                                                                <a href="{{URL::to('/delete-schedule/'.$val->schedule_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa học kỳ này?')"  >

                                                                <button class="btn" style="color: red;">
                                                                <i class="fa fa-trash"></i>
                                                                </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                            <!-- Hover table card end -->
                    
                </div>
                        
            </div>
            </div>
            
            </div>
            <!--/showback -->
           
            
           
            
       
          </div>
                    </section>

 <!-- Modal thêm phần mềm-->
 <div class="modal fade" id="add-software" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Thêm học kỳ</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('insert-schedule')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Học kỳ:</label>
                            <div class="col-sm-7">
                                 <select name="hki" id="" class="form-control">
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                 </select>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Năm học:</label>
                            <div class="col-sm-7">
                                <select name="nam_hoc" id="" class="form-control">
                                    @foreach($all_namhoc as $key => $nh)
                                     <option value="{{$nh->namhoc_id}}">{{$nh->namhoc}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số tuần:</label>
                            <div class="col-sm-7">
                                <input type="text" name="week_quantity" class="form-control"
                                placeholder="Nhập số tuần">
                            </div>
                        </div>
                      
                        <div class="form-group row" hidden>
                            <label class="col-sm-4 col-form-label">Hiển thị:</label>
                            <div class="col-sm-7">
                                 <select name="schedule_status" id="" class="form-control">
                                     <option value="0">Hiển thị</option>
                                     <option value="1">Ẩn</option>
                                   
                                 </select>
                               
                            </div>
                        </div>
                       
                       
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-schedule" >Thêm</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->
  

<!-- Modal thêm phần mềm-->
<div class="modal fade" id="showeditschedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  role="document">
        <div class="modal-content">
        <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">Cập nhật học kì</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('/update-schedule')}}" method="post">
                        @csrf
                        <input type="text" id="schedule_id" name="schedule_id" hidden>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Học kì:</label>
                            <div class="col-sm-7">
                                 <select name="hki" id="hoc_ki" class="form-control">
                                     <option   value="1">1</option>
                                     <option  value="2">2</option>
                                     <option  value="3">3</option>
                                 </select>
                               
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Năm học:</label>
                            <div class="col-sm-7">
                                <select name="nam_hoc"  id="nam_hoc"  class="form-control">
                                    @foreach($all_namhoc as $key => $nh)
                                     <option value="{{$nh->namhoc_id}}">{{$nh->namhoc}}</option>
                                    @endforeach
                                 </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Số tuần:</label>
                            <div class="col-sm-7">
                                <input type="text" id="week_quantity" name="week_quantity" class="form-control"
                                placeholder="Nhập số tuần">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Trạng thái:</label>
                            <div class="col-sm-7">
                                 <select name="schedule_status" id="schedule_status" class="form-control">
                                     <option value="0">Ẩn</option>
                                     <option value="1">Hiện</option>
                                 </select>
                               
                            </div>
                        </div>
                       
                       
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Cập nhật</button>
                <button type="button" class="btn btn-inverse" data-dismiss="modal">Đóng</button>
                </div>
                </form>
        </div>
        </div>
    </div> </div>
       <!-- Modal thêm phần mềm-->


@endsection