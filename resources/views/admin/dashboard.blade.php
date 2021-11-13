@extends('admin_layout')
@section('admin_content')
<!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            
            
            <!-- /row -->
            <div class="row">
              <!-- WEATHER PANEL -->
            
              <!-- /col-md-4-->
              <!-- DIRECT MESSAGE PANEL -->
              
              <!-- /col-md-8  -->
            </div>
            <div class="row">
              <!-- TWITTER PANEL -->
              
              <!-- /col-md-4 -->
              <div class="col-md-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Tổng số máy</h5>
                  </div>
                  <p><i class="fa fa-desktop" style="font-size: 100px;"></i></p>
                  <p style="font-size: 20px;color:red;font-weight: bold;">{{($count_pc)}} Máy</p>
                
                </div>
              </div>
              <div class="col-md-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Tổng số Phần mềm</h5>
                  </div>
                  <p><i class="fa fa-desktop" style="font-size: 100px;"></i></p>
                  <p style="font-size: 20px;color:red;font-weight: bold;">{{($count_software)}} phần mềm</p>
                
                </div>
              </div>
              <div class="col-md-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>Tổng số phòng</h5>
                  </div>
                  <p><i class="fa fa-desktop" style="font-size: 100px;"></i></p>
                  <p style="font-size: 20px;color:red;font-weight: bold;">{{($count_room)}} phòng</p>
                
                </div>
              </div>
            </div>
        
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <!-- **********************************************************************************************************************************************************
              RIGHT SIDEBAR CONTENT
           
              *********************************************************************************************************************************************************** -->
         
              <div class="col-lg-3 ds">
            
            

            <!-- CALENDAR-->
            <div id="calendar" class="mb">
              <div class="panel green-panel no-margin">
                <div class="panel-body">
                  <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                    <div class="arrow"></div>
                    <h3 class="popover-title" style="disadding: none;"></h3>
                    <div id="date-popover-content" class="popover-content"></div>
                  </div>
                  <div id="my-calendar"></div>
                </div>
              </div>
            </div>
            <!-- / calendar -->
          </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    
    <!--main content end-->
@endsection