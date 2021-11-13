@section('content')
@extends('welcome')




    <!-- blogs -->
    <div class="section">
        <div class="container">
            <div class="blog row-revere">
                <div class="blog-img">
                    <img src="public/frontend/images/dhct.jpg" alt="">
                </div>
                <div class="blog-info">
					<div class="login-form">
						<h3>Đăng nhập</h3>
									<p style="text-align: center;">

									<?php
									$message = Session::get('message');
									if ($message){
									echo '<span style="color:red; font-size:17px;">',$message.'</span>';
										Session::put('message',null);
									}
									?>
									</p>
						<form action="{{URL::to('/login-user')}}" method="post">
								{{csrf_field()}}
							<div class="form-group">
								<input type="text" class="form-control" name="id_user" placeholder="Mã số đăng nhập" value="" />
							</div>
							<div class="form-group">
								<input type="password" class="form-control" name="user_password" placeholder="Mật khẩu" value="" />
							</div>
							<div class="form-group">
								<input type="submit" class="btnSubmit" value="Đăng nhập" />
							</div>
							<div class="form-group">
							
							</div>
						</form>
					</div>
                </div>
            </div>
            
        </div>

@endsection