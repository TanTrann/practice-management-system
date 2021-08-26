<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang admin</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="CodedThemes">
      <meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
      <meta name="author" content="CodedThemes">
      <!-- Favicon icon -->
      <link rel="icon" href="{{asset('/public/backend/assets/images/favicon.ico')}}" type="image/x-icon">
      <!-- Google font-->
      <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:400,600')}}" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/css/bootstrap/css/bootstrap.min.css')}}">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/icon/themify-icons/themify-icons.css')}}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/icon/icofont/css/icofont.css')}}">
     
        <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/css/style.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('public/backend/assets/css/jquery.mCustomScrollbar.css')}}">

      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
      
  </head>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="{{URL('/dashboard')}}">
                            <img class="img-fluid" src="public/backend/assets/images/logo.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="public/backend/assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>
                                        <?php
                                        $name = Session::get('admin_name');
                                        if ($name){
                                            echo $name;
                                        }
                                        ?>
                                    </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    {{-- <li>
                                        <a href="#!">
                                            <i class="ti-settings"></i> Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-email"></i> My Messages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li> --}}
                                    <li>
                                        <a href="{{URL::to('/logout')}}">
                                            <i class="ti-layout-sidebar-left"></i> Đăng xuất
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <!-- <div class="main-menu-header">
                                    <img class="img-40 img-radius" src="public/backend/assets/images/avatar-4.jpg" alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span>John Doe</span>
                                        <span id="more-details">UX Designer<i class="ti-angle-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="#"><i class="ti-user"></i>View Profile</a>
                                            <a href="#!"><i class="ti-settings"></i>Settings</a>
                                            <a href="auth-normal-sign-in.html"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active">
                                    <a href="{{URL('/dashboard')}}">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Trang chủ</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                 <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Thời khóa biểu</div> 
                                 
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-notepad "></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Thời khóa biểu</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{URL('/all-schedule')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Liệt kê</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{URL('/manage-schedule')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Quản lý</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="pcoded-item pcoded-left-item">
                                    <a href="{{URL('/all-room')}}">
                                        <span class="pcoded-micon"><i class="ti-clipboard"></i><b>D</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Quản lý phòng</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               

                                <li class="pcoded-item pcoded-left-item">
                                    <a href="{{URL('/all-software')}}">
                                        <span class="pcoded-micon"><i class="ti-clipboard"></i><b>D</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Quản lý phần mềm</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>

                                

                                
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý học phần</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{URL('/all-room')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Liệt kê</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{URL('/add-room')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Thêm Học phần</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý lịch</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{URL('/all-room')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Liệt kê</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>

                                </li>

                            </ul>
                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Quản lý nhân sự</div>
                            <ul class="pcoded-item pcoded-left-item">
                                
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Quản lý cán bộ</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="{{URL('/all-data-room')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Liệt kê</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="{{URL('/add-data-room')}}">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Thêm cán bộ</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                            
                                        
                                 
                                    </ul>
                                </li>
                            </ul>

                          

                            
                    </nav>
                    <div class="pcoded-content">
                        
                        @yield('admin_content')
        </div>

        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="{{asset('public/backend/assets/js/jquery/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/assets/js/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/assets/js/popper.js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/assets/js/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('public/backend/assets/js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('public/backend/assets/js/modernizr/modernizr.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/assets/js/modernizr/css-scrollbars.js')}}"></script>
<!-- classie js -->
<script type="text/javascript" src="{{asset('public/backend/assets/js/classie/classie.js')}}"></script>
<!-- am chart -->
<script src="{{asset('public/backend/assets/pages/widget/amchart/amcharts.min.js')}}"></script>
<script src="{{asset('public/backend/assets/pages/widget/amchart/serial.')}}{{asset('public/backend/min.js')}}"></script>
<!-- Todo js -->
<script type="text/javascript " src="{{asset('public/backend/assets/pages/todo/todo.js')}} "></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset('public/backend/assets/pages/dashboard/custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('public/backend/assets/js/script.js')}}"></script>
<script type="text/javascript " src="{{asset('public/backend/assets/js/SmoothScroll.js')}}"></script>
<script src="{{asset('public/backend/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('public/backend/assets/js/demo-12.js')}}"></script>
<script src="{{asset('public/backend/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
var $window = $(window);
var nav = $('.fixed-button');
    $window.scroll(function(){
        if ($window.scrollTop() >= 200) {
         nav.addClass('active');
     }
     else {
         nav.removeClass('active');
     }
 });
</script>
        <script  type="text/javascript">
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
        
                CKEDITOR.replace('ckeditor');
                CKEDITOR.replace('ckeditor1');
                CKEDITOR.replace('ckeditor2');
                CKEDITOR.replace('ckeditor3');
                CKEDITOR.replace('ckeditor4');

            CKEDITOR.replace('ckeditor5');
            CKEDITOR.replace('ckeditor6');      
        CKEDITOR.replace('ckeditor7'); 
            
            
        </script>
<!-- Sửa room -->
<script type="text/javascript">   
$('.showeditroom').click(function(){
    var room_id = $(this).data('id_room');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-room')}}",
    method:"POST",
    dataType:"JSON",
    data:{room_id:room_id, _token:_token},
        success:function(data){
        $('#room_quickview_title').val(data.room_name);
        $('#room_quickview_id').val(data.room_id);
        $('#room_quickview_quantity').val(data.room_quantity);
        
        }
    });
});
</script>
<!-- Sửa pc -->
<script type="text/javascript">   
$('.edit-pc').click(function(){
    var computer_id = $(this).data('id_computer');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/edit-pc')}}",
    method:"POST",
    dataType:"JSON",
    data:{computer_id:computer_id, _token:_token},
        success:function(data){
        $('#computer_name').val(data.computer_name);
        $('#computer_id').val(data.computer_id);
        
        }
    });
});
</script>

<!-- Sửa software -->
<script type="text/javascript">   
$('.showeditsoftware').click(function(){
    var software_id = $(this).data('id_software');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-software')}}",
    method:"POST",
    dataType:"JSON",
    data:{software_id:software_id, _token:_token},
        success:function(data){
        $('#software_quickview_title').val(data.software_name);
        $('#software_quickview_id').val(data.software_id);
        $('#software_quickview_ver').val(data.software_ver);
        
        }
    });
});
</script>

<!-- Version software -->
<script type="text/javascript">   
$('.addversionsoftware').click(function(){
    var software_id = $(this).data('id_software');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/add-version-software')}}",
    method:"POST",
    dataType:"JSON",
    data:{software_id:software_id, _token:_token},
        success:function(data){
        $('#software_title').val(data.software_name);
        $('#software_id').val(data.software_id);
        $('#software_ver').val(data.software_ver);
        
        }
    });
});
</script>

<!-- table -->
<script type="text/javascript">
$(document).ready( function () {
    $('#mytable').DataTable();
} );

</script>
     <!-- table -->
<script type="text/javascript">
$(document).ready( function () {
    $('#mytable2').DataTable();
} );
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
    <script type="text/javascript">
   
   $( function() {
     $( "#date_start" ).datepicker({
         prevText:"Tháng trước",
         nextText:"Tháng sau",
         dateFormat:"yy-mm-dd",
         dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
         duration: "slow"
     });
     $( "#date_end" ).datepicker({
         prevText:"Tháng trước",
         nextText:"Tháng sau",
         dateFormat:"yy-mm-dd",
         dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
         duration: "slow"
     });
   } );
  
 </script>
</body>

</html>
