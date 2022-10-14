<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HT-QLTH</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href={{asset('https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css')}} rel='stylesheet'>
    <!-- app css -->
    <link href="{{asset('public/backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('public/frontend/css/grid.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css')}}">

     <!-- Bootstrap core CSS -->
  <link href="{{asset('public/frontend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
</head>

<body>

    <!-- header -->
    <header>
        <!-- mobile menu -->
        <div class="mobile-menu bg-second ">
            <a href="URL('/')" class="mb-logo bg-second">HT-QLTH</a>
            <span class="mb-menu-toggle" id="mb-menu-toggle">
                <i class='bx bx-menu'></i>
            </span>
        </div>
        <!-- end mobile menu -->
        <!-- top header -->
        <div class="bg-second">
                <div class="top-header" style="padding-left: 100px;">
                    <ul class="devided">
                        <li>
                            <a href="#">(84-292) 3832663</a>
                        </li>
                        <li>
                            <a href="#">dhct@ctu.edu.vn.</a>
                        </li>
                    </ul>
                   
                </div>
            </div>
            <!-- end top header -->
        <!-- main header -->
       
            <span class="mb-menu-toggle mb-menu-close" id="mb-menu-close">
                <i class='bx bx-x'></i>
            </span>
            
            <!-- mid header -->
            
            <div class="bg-main" >
                <div class="mid-header container"  >
                <ul class="user-menu">
                    
                    <img src="public\frontend\images\logo-ctu.png" alt="" style="max-width: 58%; ">
                    
                       
                </ul>
                <h1 style="margin-left: -68px;"><strong> Hệ thống quản lý</strong></h1>
                    
                    <div class="search">
                                
                    </div>
                     
                    <a href="{{URL::to('/trang-chu')}}">
                    <button type="button" class="btn btn-primary"   style="float: right;color: black;"><i class="fa fa-home"></i> Trang chủ</button>  </a>                                          
                    <div>
                    <p>
                    <?php
                        $name = Session::get('user_name');
                        if ($name){
                            echo $name;
                        }
                    ?>
                    </p>
                        <button class="btn-xs btn btn-round btn-info">
                        <a class="  logout-user" href="{{URL::to('/logout-user')}}" style="text-decoration: none;padding: 3px;">
                        Đăng xuất
                       <i class="fa fa-power-off" style="color: red;" ></i>
                        </a>
                        </button>
                    </div>
                    
                </div>
                
            </div>
            <!-- end mid header -->
            
        </div>
        <!-- end main header -->
    </header>
    <!-- end header -->

    
    <!-- promotion section -->
    <div class="promotion">
        @yield('content')
    </div>
    <!-- end blogs -->

    <!-- footer -->
    <footer class="bg-second"  style="text-align: center;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="" >
                    Trường Đại học Cần Thơ (Can Tho University)
                    Khu II, đường 3/2, P. Xuân Khánh, Q. Ninh Kiều, TP. Cần Thơ. <br>                                   
                    Điện thoại: (84-292) 3832663 - (84-292) 3838474; Fax: (84-292) 3838474; <br> 
                    Email: dhct@ctu.edu.vn.
                    </p>
                   
                </div>
               
            </div>
        </div>
    </footer>
    <!-- end footer -->

    <!-- app js -->
  
<script type="text/javascript" charset="utf8" src="{{asset('https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js')}}"></script>
    <script src={{asset('./js/app.js')}}></script>
    <script src={{asset('./js/index.js')}}></script>
   <!-- js placed at the end of the document so the pages load faster -->
   <script src="{{asset('/public/backend/lib/jquery/jquery.min.js')}}"></script>

<script src="{{asset('public/backend/lib/bootstrap/js/bootstrap.min.js')}}"></script>



   <!-- Thêm học phần -->
    <script type="text/javascript">   
            $('.dangkyphong').click(function(){
                var room_id = $(this).data('id_room');
                var detail_semester_id = $(this).data('detail_semester_id');
                var id_thu = $(this).data('id_thu');
                var id_buoi = $(this).data('id_buoi');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                url:"{{url('/dang-ky-phong')}}",
                method:"POST",
                dataType:"JSON",
                data:{room_id:room_id, _token:_token,detail_semester_id:detail_semester_id,id_thu:id_thu,id_buoi:id_buoi},
                    success:function(data){
                    $('#room_name').val(data.room_name);
                    $('#room_id').val(data.room_id);
                    $('#week').val(data.week);
                    $('#detail_semester_id').val(data.detail_semester_id);
                    $('#thu').val(data.thu);
                    $('#id_thu').val(data.id_thu);
                    $('#buoi').val(data.buoi);
                    $('#id_buoi').val(data.id_buoi);
                    $('#detail_semester_id22').val(data.detail_semester_id);
                    }
                });
            });
    </script>
 <!-- add soft room -->
<script type="text/javascript">
        
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='software_name'){
               
                result = 'version_number';
               
            }else{
                
                result = 'version_id';
                
            }
            $.ajax({
                url : '{{url('/select-software')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>

    <!-- Thêm học phần -->
    <script type="text/javascript">   
                $('.tkb').click(function(){
                    var room_id = $(this).data('id_room');
                    var detail_semester_id = $(this).data('detail_semester_id');
                    var id_thu = $(this).data('id_thu');
                    var id_buoi = $(this).data('id_buoi');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                    url:"{{url('/load-tkb')}}",
                    method:"POST",
                    dataType:"JSON",
                    data:{room_id:room_id, _token:_token,detail_semester_id:detail_semester_id,id_thu:id_thu,id_buoi:id_buoi},
                        success:function(data){
                        $('#room_name').val(data.room_name);
                        $('#room_id').val(data.room_id);
                        $('#week').val(data.week);
                        $('#detail_semester_id').val(data.detail_semester_id);
                        $('#thu').val(data.thu);
                        $('#id_thu').val(data.id_thu);
                        $('#id_buoi').val(data.id_buoi);
                        $('#detail_semester_id2').val(data.detail_semester_id);
                        }
                    });
                });
        </script>

<!-- chọn hp va nhóm hp -->
<script type="text/javascript">
        
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='subject_name'){
               
                result = 'nhom';
                
            }else{
                
                result = 'nhomhp_id';
                
            }
            $.ajax({
                url : '{{url('/select-hocphan')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>


<!-- chọn hp va nhóm hp 2 -->
<script type="text/javascript">
        
        $(document).ready(function(){
            $('.choose2').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='subject_name2'){
               
                result = 'nhom2';
                
            }else{
                
                result = 'nhomhp_id2';
                
            }
            $.ajax({
                url : '{{url('/select-hocphan2')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>



<!-- chọn hp va nhóm hp 2 -->
<script type="text/javascript">
        
        $(document).ready(function(){
            $('.choosehp').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action =='mahp_lophp'){
               
                result = 'namhoc_lophp';
              
               
                
            }else{
             
                result = 'hocky_lophp';
            }
            $.ajax({
                url : '{{url('/select-lophp')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
        });
          
    </script>

<!-- Sửa lophp -->
<script type="text/javascript">   
$('.show-edit-lophp').click(function(){
    var sttlophp = $(this).data('sttlophp');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-lophp')}}",
    method:"POST",
    dataType:"JSON",
    data:{sttlophp:sttlophp, _token:_token},
        success:function(data){
        $('#sttlophp').val(data.sttlophp);
        $('#hocky_lophp').val(data.hocky_lophp);
        $('#namhoc_lophp').val(data.namhoc_lophp);
        $('#mahp_lophp').val(data.mahp_lophp);
        $('#tietbd_lophp').val(data.tietbd_lophp);
        $('#sotiet_lophp').val(data.sotiet_lophp);
        $('#thu_lophp').val(data.thu_lophp);
        $('#macb_lophp').val(data.macb_lophp);
      
       

        $('#sttlophp2').val(data.sttlophp);
        $('#hocky_lophp2').val(data.hocky_lophp);
        $('#namhoc_lophp2').val(data.namhoc_lophp);
        $('#mahp_lophp2').val(data.mahp_lophp);
        $('#tietbd_lophp2').val(data.tietbd_lophp);
        $('#sotiet_lophp2').val(data.sotiet_lophp);
        $('#thu_lophp2').val(data.thu_lophp);
        $('#macb_lophp2').val(data.macb_lophp);
        
        $('#sttlophp3').val(data.sttlophp);
        $('#hocky_lophp3').val(data.hocky_lophp);
        $('#namhoc_lophp3').val(data.namhoc_lophp);
        $('#mahp_lophp3').val(data.mahp_lophp);
        $('#tietbd_lophp3').val(data.tietbd_lophp);
        $('#sotiet_lophp3').val(data.sotiet_lophp);
        $('#thu_lophp3').val(data.thu_lophp);
        $('#macb_lophp3').val(data.macb_lophp);

       


        }
    });
});
</script>



<script type="text/javascript">
$(document).ready( function () {
    $('#mytable2').DataTable();
} );

</script>










</body>

</html>