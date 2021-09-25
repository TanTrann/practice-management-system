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
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
            <li>
                <a class="logout" href="{{URL::to('/logout')}}">
                    <i class="ti-layout-sidebar-left"></i> Đăng xuất
                </a>
            </li>
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
          <p class="centered"><a href="profile.html"><img src="public/backend/img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">
            <?php
                $name = Session::get('user_name');
                if ($name){
                    echo $name;
                }
            ?>
          </h5>
          <li class="mt">
            <a class="" href="{{URL('/dashboard')}}">
              <i class="fa fa-dashboard"></i>
              <span>Trang chủ</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Thời khóa biểu</span>
              </a>
            <ul class="sub">
              <li><a href="{{URL('/list-schedule')}}">Liệt kê</a></li>
              <li><a href="{{URL('/manage-semester')}}">Quản lý học kì</a></li>
              <li><a href="{{URL('/manage-subject')}}">Quản lý môn học</a></li>

            </ul>
          </li>
         
          <li>
            <a href="{{URL('/all-room')}}">
              <i class="fa fa-desktop"></i>
              <span>Quản lý phòng</span>
              </a>
          </li>
         
          <li>
            <a href="{{URL('/all-software')}}">
              <i class="fa fa-desktop"></i>
              <span>Quản lý phần mềm</span>
              </a>
          </li>
          <li>
            <a href="{{URL('/all-user')}}">
              <i class="fa fa-desktop"></i>
              <span>Quản lý USER</span>
              </a>
          </li>
          <li class="sub-menu">
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
          </li>
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

    <!-- Thêm học phần -->
<script type="text/javascript">   
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
