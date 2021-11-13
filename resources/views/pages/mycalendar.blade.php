@section('content')
@extends('welcome')
<section class="">
    <div class="row">
        <div class="col-sm-12">
            <div class="showback"> 
                <h3>Lịch của bạn</h3>
                <?php
                $message = Session::get('message');
                if ($message){
                echo '<span style="color:red; font-size:17px;">',$message.'</span>';
                    Session::put('message',null);
                    }
                ?>
            </div>
        </div>             

    <div class="col-sm-12">
        <div class="showback">  
            <Table border="1px solid">
                    @foreach($all_cal as $key => $cal)
                        <tr>
                            
                                <td>   
                                    Mã - Tên học phần: <strong>{{($cal -> mahocphan)}} - {{($cal -> subject_name)}}</strong><br>
                                    Nhóm: <strong style="color: green;">{{($cal -> nhom)}}</strong> <br>
                                    <?php
                                        if($cal->nhomhp_status==0){
                                            ?>
                                              Trạng thái: <label style="color: red;">Chưa đăng ký</label><br>
                                            <?php
                                            }else{
                                            ?> 
                                              Trạng thái: <label style="color: green;">Đã đăng ký</label><br>

                                            <?php
                                        }
                                    ?>
                                   
                                </td>
                        </tr>
                        <tr>
                                <td>
                                @foreach($get_user_name as $key => $val) 
                                Ten CB: {{$val -> user_name}}<br>
                                @endforeach
                                </td>
                        </tr>
                    @endforeach  
            </Table>
            
                 


           
        </div>
    </div>
</section>  




@endsection