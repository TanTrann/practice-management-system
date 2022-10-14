<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>HTQLTH-CTU</title>

  <!-- Favicons -->
  <link href="{{asset('public/backend/img/favicon.png')}}" rel="icon">
  <link href="{{asset('public/backend/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('public/backend/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('public/backend/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/backend/lib/gritter/css/jquery.gritter.css')}}" />
  <!-- Custom styles for this template -->
  <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet">
  <script src="{{asset('public/backend/lib/chart-master/Chart.js')}}"></script>

  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>QLTH<span>CTU</span></b></a>
      <!--logo end-->
      
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li style="padding-top: 21px;padding-right: 14px">
                <?php
                      $name = Session::get('user_name');
                      if ($name){
                          echo $name;
                      }
                ?>
            </li>
            <li>
           
                  <a class="logout" href="{{URL::to('/logout')}}">
                      <i class="ti-layout-sidebar-left"></i> Đăng xuất
                  </a>
            </li>
           
        </ul>
        <ul class="nav pull-right top-menu">
          
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          
          <li class="mt">
            <a class="" href="{{URL('/dashboard')}}">
              <i class="fa fa-dashboard"></i>
              <span>Trang chủ</span>
              </a>
          </li>
         
          <!-- <li>
            <a href="{{URL('/manage-semester')}}">
              <i class="fa fa-archive"></i>
              <span>Quản lý học kì</span>
              </a>
          </li> -->
          <!-- <li>
            <a href="{{URL('/manage-hocky')}}">
              <i class="fa fa-archive"></i>
              <span>Quản lý học kỳ</span>
              </a>
          </li> -->
          <?php
                      $id = Session::get('id_chucvu');
                      if ($id == 0){ ?>
                        
                                                  
          <li>
            <a href="{{URL('/manage-namhoc')}}">
              <i class="fa fa-archive"></i>
              <span>Quản lý năm học</span>
              </a>
          </li>
          <li>
            <a href="{{URL('/manage-semester')}}">
              <i class="fa fa-calendar"></i>
              <span>Quản lý học kỳ</span>
              </a>
          </li>
          <li>
            <a href="{{URL('/manage-hocphan')}}">
              <i class="fa fa-archive"></i>
              <span>Quản lý học phần</span>
              </a>
          </li>
          <li>
            <a href="{{URL('/all-software')}}">
              <i class="fa fa-desktop"></i>
              <span>Quản lý phần mềm</span>
              </a>
          </li>
         
          <li>
            <a href="{{URL('/all-room')}}">
              <i class="fa fa-server"></i>
              <span>Quản lý phòng</span>
              </a>
          </li>
         
          
          
      
          <li>
            <a href="{{URL('/all-suco')}}">
              <i class="fa fa-wrench"></i>
              <span>Quản lý sự cố</span>
              </a>
          </li>
          <li>
            <a href="{{URL('/all-user')}}">
              <i class="fa fa-user"></i>
              <span>Quản lý cán bộ</span>
              </a>
          </li>
          <li>
            <a href="{{URL('/all-khoa')}}">
              <i class="fa fa-user"></i>
              <span>Quản lý đơn vị</span>
              </a>
          </li>
         
          <?php }else{ ?>
          
          <li>
            <a href="{{URL('/manage-lophp')}}">
              <i class="fa fa-archive"></i>
              <span>Quản lý lớp học phần</span>
              </a>
          </li>
          <li>
            <a href="{{URL('/manage-nhomth')}}">
              <i class="fa fa-archive"></i>
              <span>Quản lý sắp lịch thực hành</span>
              </a>
          </li>
          <!-- <li>
            <a href="{{URL('/all-tuan')}}">
              <i class="fa fa-desktop"></i>
              <span>Quản lý tuan</span>
              </a>
          </li> -->
          <li>
            <a href="{{URL('/list-schedule')}}">
              <i class="fa fa-calendar"></i>
              <span>Quản lý lịch thực hành</span>
              </a>
          </li>
          <?php  }?>
      <!-- ------------------------------------------------------------------------------ -->
         
          <!-- <li>
            <a href="{{URL('/manage-subject')}}">
              <i class="fa fa-book"></i>
              <span>Quản lý học phần</span>
              </a>
          </li> -->
         
          
          
          <!-- <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Quản lý USER</span>
              </a>
            <ul class="sub">
              <li><a href="grids.html">Grids</a></li>
              <li><a href="calendar.html">Calendar</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="todo_list.html">Todo List</a></li>
              <li><a href="dropzone.html">Dropzone File Upload</a></li>
              <li><a href="inline_editor.html">Inline Editor</a></li>
              <li><a href="file_upload.html">Multiple File Upload</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Extra Pages</span>
              </a>
            <ul class="sub">
              <li><a href="blank.html">Blank Page</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="lock_screen.html">Lock Screen</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="pricing_table.html">Pricing Table</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="404.html">404 Error</a></li>
              <li><a href="500.html">500 Error</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Forms</span>
              </a>
            <ul class="sub">
              <li><a href="form_component.html">Form Components</a></li>
              <li><a href="advanced_form_components.html">Advanced Components</a></li>
              <li><a href="form_validation.html">Form Validation</a></li>
              <li><a href="contactform.html">Contact Form</a></li>
            </ul>
          </li>
         
          <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Mail </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
            <ul class="sub">
              <li><a href="morris.html">Morris</a></li>
              <li><a href="chartjs.html">Chartjs</a></li>
              <li><a href="flot_chart.html">Flot Charts</a></li>
              <li><a href="xchart.html">xChart</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html">Lobby</a></li>
              <li><a href="chat_room.html"> Chat Room</a></li>
            </ul>
          </li>
          <li>
            <a href="google_maps.html">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
          </li> -->
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <section id="main-content">
    @yield('admin_content')
    </section>
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('/public/backend/lib/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('public/backend/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{asset('public/backend/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('public/backend/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('public/backend/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{asset('public/backend/lib/jquery.sparkline.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{asset('public/backend/lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/backend/lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/backend/lib/gritter-conf.js')}}"></script>
  <!--script for this page-->
  <script src="{{asset('public/backend/lib/sparkline-chart.js')}}"></script>
  <script src="{{asset('public/backend/lib/zabuto_calendar.js')}}"></script>
 
  
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
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
        CKEDITOR.replace('ckeditor8'); 
        CKEDITOR.replace('ckeditor9'); 
            
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
        $('#pc_quantity').val(data.pc_quantity);
        $('#cpu').val(data.cpu);
        $('#ram').val(data.ram);
        $('#ghichu').val(data.ghichu);
        }
    });
});
</script>
<!-- Sửa hp -->
<script type="text/javascript">   
$('.show-edit-subject').click(function(){
    var subject_id = $(this).data('id_subject');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-subject')}}",
    method:"POST",
    dataType:"JSON",
    data:{subject_id:subject_id, _token:_token},
        success:function(data){
        $('#subject_id').val(data.subject_id);
        $('#subject_name').val(data.subject_name);
        $('#mahocphan').val(data.mahocphan);
        
        }
    });
});
</script>
<!-- Sửa hocki -->
<script type="text/javascript">   
$('.show-edit-namhoc').click(function(){
    var namhoc_id = $(this).data('namhoc_id');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-namhoc')}}",
    method:"POST",
    dataType:"JSON",
    data:{namhoc_id:namhoc_id, _token:_token},
        success:function(data){
        $('#namhoc_id').val(data.namhoc_id);
        $('#namhoc').val(data.namhoc);
      

        }
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
        $('#status_lophp').val(data.status_lophp);

        }
    });
});
</script>




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

                    $('#room_namec').val(data.room_name);
                    $('#room_idc').val(data.room_id);
                    $('#weekc').val(data.week);
                    $('#detail_semester_idc').val(data.detail_semester_id);
                    $('#thuc').val(data.thu);
                    $('#id_thuc').val(data.id_thu);
                    $('#buoic').val(data.buoi);
                    $('#id_buoic').val(data.id_buoi);
                    $('#detail_semester_id22c').val(data.detail_semester_id);
                    
                    $('#room_namet').val(data.room_name);
                    $('#room_idt').val(data.room_id);
                    $('#weekt').val(data.week);
                    $('#detail_semester_idt').val(data.detail_semester_id);
                    $('#thut').val(data.thu);
                    $('#id_thut').val(data.id_thu);
                    $('#buoit').val(data.buoi);
                    $('#id_buoit').val(data.id_buoi);
                    $('#detail_semester_id22t').val(data.detail_semester_id);
                    }
                });
            });
    </script>
 <!-- add soft room -->



<!-- Sửa hp -->
<script type="text/javascript">   
$('.edit-schedule').click(function(){
    var schedule_id = $(this).data('id_schedule');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-schedule')}}",
    method:"POST",
    dataType:"JSON",
    data:{schedule_id:schedule_id,_token:_token},
        success:function(data){
        $('#schedule_id').val(data.schedule_id);
        $('#hoc_ki').val(data.hoc_ki);
        $('#week_quantity').val(data.week_quantity);
        $('#schedule_status').val(data.schedule_status);
        $('#nam_hoc').val(data.nam_hoc);
        
        }
    });
});



</script>





<!-- Sửa phan cong -->
<script type="text/javascript">   
$('.show-edit-phancong').click(function(){
    var nhomhp_id = $(this).data('id_nhomhp');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-phancong')}}",
    method:"POST",
    dataType:"JSON",
    data:{nhomhp_id:nhomhp_id, _token:_token},
        success:function(data){
        $('#user_id').val(data.user_id);
        $('#subject_name').val(data.subject_name);
        $('#mahocphan').val(data.mahocphan);
        $('#soluong').val(data.soluong);
        $('#nhom').val(data.nhom);
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
        $('#software_name').val(data.software_name);
        $('#software_quickview_id').val(data.software_id);
        $('#software_version').val(data.software_version);
        $('#ghichu').val(data.ghichu);
        }
    });
});
</script>

<!-- Sửa info gv -->
<script type="text/javascript">   
$('.showedituser').click(function(){
    var user_id = $(this).data('id_user');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-user')}}",
    method:"POST",
    dataType:"JSON",
    data:{user_id:user_id, _token:_token},
        success:function(data){
        $('#user_name').val(data.user_name);
        $('#user_id').val(data.user_id);
        $('#id_user').val(data.id_user);
        $('#user_email').val(data.user_email);
        $('#user_password').val(data.user_password);
        $('#user_address').val(data.user_address);
        $('#user_phone').val(data.user_phone);
        $('#khoa').val(data.khoa);
        $('#user_id2').val(data.user_id);
        $('#user_name2').val(data.user_name);
        $('#user_id2').val(data.user_id);
        $('#id_user2').val(data.id_user);
        $('#user_email2').val(data.user_email);
        }
    });
});
</script>
<!-- Sửa khoa -->
<script type="text/javascript">   
$('.showeditkhoa').click(function(){
    var khoa_id = $(this).data('id_khoa');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-khoa')}}",
    method:"POST",
    dataType:"JSON",
    data:{khoa_id:khoa_id, _token:_token},
        success:function(data){
        $('#ma_khoa').val(data.ma_khoa);
        $('#khoa_id').val(data.khoa_id);
        $('#ten_khoa').val(data.ten_khoa);
        
        
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

<!-- Show edit hoc ki  -->
<script type="text/javascript">   
$('.show-edit-hocki').click(function(){
    var hocki_id = $(this).data('id_hocki');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-hocki')}}",
    method:"POST",
    dataType:"JSON",
    data:{hocki_id:hocki_id, _token:_token},
        success:function(data){
        $('#hocki_id').val(data.hocki_id);
        $('#hocki').val(data.hocki);
    
        
        }
    });
});
</script>
<!-- Show edit hoc phan  -->
<script type="text/javascript">   
$('.show-edit-hocphan').click(function(){
    var hocphan_id = $(this).data('id_hocphan');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-edit-hocphan')}}",
    method:"POST",
    dataType:"JSON",
    data:{hocphan_id:hocphan_id, _token:_token},
        success:function(data){
        $('#hocphan_id').val(data.hocphan_id);
        $('#mahp').val(data.mahp);
        $('#tenhp').val(data.tenhp);

    
        
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
           
            if(action=='mahp'){
               
                result = 'nhom';
                
            }else{
                
              result = 'nhom_id';

                
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

<!-- chọn hp va nhóm hp -->
<script type="text/javascript">
        
        $(document).ready(function(){
            $('.chon').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='namhoc'){
               
                result = 'hocky';
                
            }else{
                
              result = 'hocky';

                
            }
            $.ajax({
                url : '{{url('/select-namhoc')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
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
           
            if(action=='mahpc'){
               
                result = 'nhomc';
                
            }else{
                
              result = 'nhom_idc';

                
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
    
<!-- chọn hp va nhóm hp -->
<script type="text/javascript">
        
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='mahpt'){
               
                result = 'nhomt';
                
            }else{
                
              result = 'nhom_idt';

                
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



<script type="text/javascript">   
$('.update-suco').click(function(){
    var suco_id = $(this).data('id_suco');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-update-suco')}}",
    method:"POST",
    dataType:"JSON",
    data:{suco_id:suco_id,_token:_token},
        success:function(data){
        $('#suco_id').val(data.suco_id);
        $('#noidung').val(data.noidung);
        $('#trangthai').val(data.trangthai);
        $('#ngayphananh').val(data.ngayphananh);
        $('#id_user').val(data.id_user);
        $('#room_id').val(data.room_id);

        $('#suco_id2').val(data.suco_id);
        $('#noidung2').val(data.noidung);
        $('#trangthai2').val(data.trangthai);
        $('#noidungkhacphuc2').val(data.noidungkhacphuc);
        $('#ngaykhacphuc').val(data.ngaykhacphuc);
        $('#ghichukhac2').val(data.ghichukhac);
        $('#ngayphananh2').val(data.ngayphananh);
        $('#id_user2').val(data.id_user);
        $('#room_id2').val(data.room_id);

        }
    });
});


</script>
<script type="text/javascript">   
$('.dkylich').click(function(){
    var nhom_id = $(this).data('nhom_id');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/show-dky-lich')}}",
    method:"POST",
    dataType:"JSON",
    data:{nhom_id:nhom_id,_token:_token},
        success:function(data){
        $('#nhom_id').val(data.nhom_id);
        $('#sttlophp').val(data.sttlophp);
        $('#mahp_lophp').val(data.mahp_lophp);
        $('#namhoc_lophp').val(data.namhoc_lophp);
        $('#tietbd_lophp').val(data.tietbd_lophp);
        $('#room_id').val(data.room_id);
        $('#hocky_lophp').val(data.hocky_lophp);
        $('#tietbd_lophp').val(data.tietbd_lophp);
        $('#thu').val(data.thu);
        $('#hocky_lophp').val(data.hocky_lophp);
        $('#tietbd_lophp').val(data.tietbd_lophp);
        $('#soluong').val(data.soluong);
        $('#ycpm').val(data.ycpm);
          
        $('#nhom_id2').val(data.nhom_id);
        $('#sttlophp2').val(data.sttlophp);
        $('#mahp_lophp2').val(data.mahp_lophp);
        $('#namhoc_lophp2').val(data.namhoc_lophp);
        $('#tietbd_lophp2').val(data.tietbd_lophp);
        $('#room_id2').val(data.room_id);
        $('#hocky_lophp2').val(data.hocky_lophp);
        $('#tietbd_lophp2').val(data.tietbd_lophp);
        $('#thu2').val(data.thu);
        $('#hocky_lophp2').val(data.hocky_lophp);
        $('#tietbd_lophp2').val(data.tietbd_lophp);
        $('#soluong2').val(data.soluong);
        $('#ycpm2').val(data.ycpm);

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
<!-- <script type="text/javascript">
        
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
          
    </script> -->

    <!-- Thêm học phần -->
<!-- <script type="text/javascript">   
$('.dangkyphong').click(function(){
    var room_id = $(this).data('id_room');
    var week_id = $(this).data('id_week');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:"{{url('/dang-ky-phong')}}",
    method:"POST",
    dataType:"JSON",
    data:{room_id:room_id, _token:_token},
        success:function(data){
        $('#room_quickview_title').val(data.room_name);
        $('#room_quickview_id').val(data.room_id);
        $('#tuan').val(data.tuan);
        $('#room_quickview_quantity').val(data.room_quantity);
        
        }
    });
});
</script> -->
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
