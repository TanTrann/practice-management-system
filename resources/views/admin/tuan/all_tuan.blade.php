@section('admin_content')
@extends('admin_layout')

<section class="wrapper">
        <div class="row mt">
        <div class="col-sm-12">
            <!--  BASIC PROGRESS BARS -->
            <div class="showback">
            <div class="card-header">
            <button type="button" class="btn btn-primary "  data-toggle="modal" data-target="#add-software" style="float: right;">Thêm tuan</button> 
            <div class="card-header">
                <h3>>Quản lý tuan</h3>
                    <?php
                                $message = Session::get('message');
                                if ($message){
                                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                                    Session::put('message',null);
                                    }
                            ?>
                </div>
       
                <p>Danh sách tuan</p>
                            <!-- Hover table card start -->
                         
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                            <div class="card-block">
                                        <table class="table table-hover"  id="mytable" >
                                          
                                            <thead>
                                                <tr>        
                                                    <th>ID</th>
                                                    <th>Tuan</th>
                                                    <th>Quản lý</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                        @foreach($all_tuan as $key => $val)
                                                           
                                                            <td>{{$val->tuan_id}}</td>
                                                            <td>{{$val->tuan}}</td>
                                                            

                                                          
                                                            <td>
                                                                <button class="btn show-edit-tuan" data-toggle="modal" data-target="#showeditschedule"    data-id_tuan="{{$val->tuan_id}}" ><i class="fa fa-pencil " style="color: green;" ></i></button>
                                                            <a href="{{URL::to('/delete-tuan/'.$val->tuan_id)}}"  onclick="return confirm('Bạn có chắc là muốn xóa học kỳ này?')"  >
                                                                
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
                      <h4 class="modal-title" id="myModalLabel">Thêm học kì</h4>
            </div>
            <div class="modal-body">
            
            <div class="row">
                <div class="col-sm-11" style="margin-left: 75px;">
                    
                
                    <!-- form nhập tkb -->
                    <form action="{{URL::to('insert-tuan')}}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Tuan:</label>
                            <div class="col-sm-7">
                                <input type="text" name="tuan">
                               
                            </div>
                        </div>
                        
                        
                       
                       
                            <!-- form nhập tkb end -->
                </div>        
            
            
        </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary insert-hocky" >Thêm</button>
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
                    <form action="{{URL::to('/update-hocky')}}" method="post">
                        @csrf
                        <input type="text" id="hocky_id" name="hocky_id" hidden>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Học kì:</label>
                            <div class="col-sm-7">
                                 <select name="hocky" id="hocky" class="form-control">
                                     <option   value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
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