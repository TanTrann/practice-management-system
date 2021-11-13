<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//trangchu
Route::get('/','App\Http\Controllers\HomeController@index');


//gioithieu
Route::get('/gioi-thieu','App\Http\Controllers\AboutController@about');


//Admin
Route::get('/admin','App\Http\Controllers\AdminController@index');
Route::get('/dashboard','App\Http\Controllers\AdminController@show_dashboard');
Route::post('/admin-dashboard','App\Http\Controllers\AdminController@dashboard');
Route::get('/logout','App\Http\Controllers\AdminController@logout');
Route::get('/logout-user','App\Http\Controllers\AdminController@logout_user');


//SCHEDULE
// backend---------------------------------------------------------------------------
Route::get('/list-schedule','App\Http\Controllers\ScheduleController@list_schedule');
Route::get('/manage-semester','App\Http\Controllers\ScheduleController@manage_semester');
Route::post('/insert-schedule','App\Http\Controllers\ScheduleController@insert_schedule');
Route::get('/unactive-hoc-ki/{schedule_id}','App\Http\Controllers\ScheduleController@unactive_hoc_ki');
Route::get('/active-hoc-ki/{schedule_id}','App\Http\Controllers\ScheduleController@active_hoc_ki');
// frontend---------------------------------------------------------------------------
Route::get('/delete-nhomhp/{dki_phong_id}','App\Http\Controllers\ScheduleController@delete_nhomhp');
Route::get('/delete-all-nhomhp/{dki_phong_id}','App\Http\Controllers\ScheduleController@delete_all_nhomhp');
//SUBJECT
// backend---------------------------------------------------------------------------
Route::get('/list-schedule','App\Http\Controllers\ScheduleController@list_schedule');
Route::get('/manage-subject','App\Http\Controllers\ScheduleController@manage_subject');
Route::post('/insert-subject','App\Http\Controllers\ScheduleController@insert_subject');
Route::get('/unactive-hoc-ki/{schedule_id}','App\Http\Controllers\ScheduleController@unactive_hoc_ki');
Route::get('/active-hoc-ki/{schedule_id}','App\Http\Controllers\ScheduleController@active_hoc_ki');
Route::get('/save-subject-schedule','App\Http\Controllers\ScheduleController@save_subject_schedule');
Route::post('/show-edit-subject','App\Http\Controllers\ScheduleController@show_edit_subject');
Route::post('/update-subject','App\Http\Controllers\ScheduleController@update_subject');
Route::get('/delete-subject/{subject_id}','App\Http\Controllers\ScheduleController@delete_subject');
Route::post('/phan-cong','App\Http\Controllers\ScheduleController@phan_cong');
Route::get('/qli-phan-cong/{subject_id}','App\Http\Controllers\ScheduleController@qli_phan_cong');
Route::post('/insert-nhomhp','App\Http\Controllers\ScheduleController@insert_nhomhp');
Route::post('/show-edit-phancong','App\Http\Controllers\ScheduleController@show_edit_phancong');
// frontend---------------------------------------------------------------------------
Route::post('/select-hocphan','App\Http\Controllers\ScheduleController@select_hocphan');
Route::post('/dki-phong-th','App\Http\Controllers\ScheduleController@dki_phong_th');

//KHOA
//backend
Route::get('/all-khoa','App\Http\Controllers\UserController@all_khoa');


//USER
//backend-----------------------------------------
Route::get('/all-user','App\Http\Controllers\UserController@all_user');
Route::post('assign-roles','App\Http\Controllers\UserController@assign_roles');
Route::post('/show-edit-user','App\Http\Controllers\UserController@show_edit_user');
Route::post('/update-user','App\Http\Controllers\UserController@update_user');
Route::get('/delete-user/{user_id}','App\Http\Controllers\UserController@delete_user');
Route::post('/insert-user','App\Http\Controllers\UserController@insert_user');



//front end =======================================================================
Route::post('/login-user','App\Http\Controllers\UserController@login_user');
Route::get('/dang-nhap','App\Http\Controllers\UserController@dang_nhap');
Route::get('/trang-chu','App\Http\Controllers\UserController@trang_chu');
Route::get('/tkb','App\Http\Controllers\ScheduleController@tkb');
Route::get('/dangki-tkb','App\Http\Controllers\ScheduleController@dangki_tkb');
Route::post('/dang-ky-phong','App\Http\Controllers\ScheduleController@dang_ki_phong');
Route::post('/load-tkb','App\Http\Controllers\ScheduleController@load_tkb');






//ROOM
//backend---------------------------------------------------------------------------
Route::get('/all-room','App\Http\Controllers\RoomController@all_room');
Route::post('/save-room','App\Http\Controllers\RoomController@save_room');
Route::get('/add-room','App\Http\Controllers\RoomController@add_room');
Route::get('/delete-room/{room_id}','App\Http\Controllers\RoomController@delete_room');

Route::post('/update-room','App\Http\Controllers\RoomController@update_room');
Route::post('/show-edit-room','App\Http\Controllers\RoomController@show_edit_room');

Route::get('/room-detail/{room_id}','App\Http\Controllers\RoomController@room_detail');
Route::post('/select-software','App\Http\Controllers\RoomController@select_software');
Route::get('/save-software-room','App\Http\Controllers\RoomController@save_software_room');
Route::post('/insert-soft-room','App\Http\Controllers\RoomController@insert_soft_room');
Route::get('/delete-soft-room/{room_details_id}','App\Http\Controllers\RoomController@delete_soft_room');
Route::post('/save-pc','App\Http\Controllers\RoomController@save_pc');
Route::get('/delete-pc/{computer_id}','App\Http\Controllers\RoomController@delete_pc');

Route::post('/update-pc','App\Http\Controllers\RoomController@update_pc');

//frontend---------------------------------------------------------------------------



//SOFTWARE
//backend---------------------------------------------------------------------------
Route::get('/all-software','App\Http\Controllers\SoftwareController@all_software');
Route::post('/save-software','App\Http\Controllers\SoftwareController@save_software');

Route::get('/delete-software/{software_id}','App\Http\Controllers\SoftwareController@delete_software');
Route::get('/edit-software/{software_id}','App\Http\Controllers\SoftwareController@edit_software');
Route::post('/update-software','App\Http\Controllers\SoftwareController@update_software');
Route::post('/update-software','App\Http\Controllers\SoftwareController@update_software');
Route::post('/show-edit-software','App\Http\Controllers\SoftwareController@show_edit_software');
Route::post('/add-version-software','App\Http\Controllers\SoftwareController@add_version_software');


Route::post('/add-ver-software','App\Http\Controllers\SoftwareController@add_ver_software');
Route::post('/xem-them','App\Http\Controllers\SoftwareController@xem_them');
Route::get('/delete-version/{version_id}','App\Http\Controllers\SoftwareController@delete_version');
Route::get('/chi-tiet-phan-mem/{software_id}','App\Http\Controllers\SoftwareController@software_detail');



//font end 
Route::get('/my-calendar','App\Http\Controllers\HomeController@my_calendar');
