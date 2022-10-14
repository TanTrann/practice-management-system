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
Route::get('/list-schedule-admin','App\Http\Controllers\ScheduleController@list_schedule_admin');

Route::post('/show-edit-schedule','App\Http\Controllers\ScheduleController@show_edit_schedule');
Route::get('/delete-schedule/{schedule_id}','App\Http\Controllers\ScheduleController@delete_schedule');





//============================= NĂM HỌC ======================================================
// Route::get('/manage-semester','App\Http\Controllers\ScheduleController@manage_semester');
Route::get('/manage-namhoc','App\Http\Controllers\ScheduleController@manage_namhoc');
// Route::post('/insert-schedule','App\Http\Controllers\ScheduleController@insert_schedule');
Route::post('/insert-namhoc','App\Http\Controllers\ScheduleController@insert_namhoc');
Route::post('/update-schedule','App\Http\Controllers\ScheduleController@update_schedule');
Route::post('/update-namhoc','App\Http\Controllers\ScheduleController@update_namhoc');
Route::get('/delete-namhoc/{namhoc_id}','App\Http\Controllers\ScheduleController@delete_namhoc');
Route::post('/show-edit-namhoc','App\Http\Controllers\ScheduleController@show_edit_namhoc');


//==============================HỌC KỲ============================================================
Route::get('/manage-semester','App\Http\Controllers\ScheduleController@manage_semester');
Route::get('/manage-hocky','App\Http\Controllers\ScheduleController@manage_hocky');
Route::post('/insert-schedule','App\Http\Controllers\ScheduleController@insert_schedule');
Route::post('/insert-hocky','App\Http\Controllers\ScheduleController@insert_hocky');
// Route::post('/update-schedule','App\Http\Controllers\ScheduleController@update_schedule');
Route::post('/update-hocky','App\Http\Controllers\ScheduleController@update_hocky');
Route::get('/delete-hocky/{hocky_id}','App\Http\Controllers\ScheduleController@delete_hocky');
Route::post('/show-edit-hocky','App\Http\Controllers\ScheduleController@show_edit_hocky');

//------------------------------hoc phan --------------------------------------------------
Route::get('/manage-hocphan','App\Http\Controllers\ScheduleController@manage_hocphan');
Route::post('/insert-hocphan','App\Http\Controllers\ScheduleController@insert_hocphan');
Route::post('/update-hocphan','App\Http\Controllers\ScheduleController@update_hocphan');
Route::get('/delete-hocphan/{hocphan_id}','App\Http\Controllers\ScheduleController@delete_hocphan');
Route::post('/show-edit-hocphan','App\Http\Controllers\ScheduleController@show_edit_hocphan');

//==============================lớp học phần============================================================
Route::get('/manage-lophp','App\Http\Controllers\ScheduleController@manage_lophp');
Route::post('/insert-lophp','App\Http\Controllers\LophpController@insert_lophp');
Route::post('/update-lophp','App\Http\Controllers\LophpController@update_lophp');
Route::get('/delete-lophp/{sttlophp}','App\Http\Controllers\LophpController@delete_lophp');
Route::post('/show-edit-lophp','App\Http\Controllers\ScheduleController@show_edit_lophp');



//IN TKB
Route::get('/print-tkb/{detail_semester_id}','App\Http\Controllers\ScheduleController@print_tkb');










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


// frontend---------------------------------------------------------------------------
Route::post('/select-hocphan','App\Http\Controllers\ScheduleController@select_hocphan');
Route::post('/select-hocphan2','App\Http\Controllers\ScheduleController@select_hocphan2');

Route::post('/select-namhoc','App\Http\Controllers\ScheduleController@select_namhoc');
Route::post('/select-buoi','App\Http\Controllers\ScheduleController@select_buoi');



Route::post('/dki-phong-th','App\Http\Controllers\ScheduleController@dki_phong_th');
Route::post('/dki-phong-th-chieu','App\Http\Controllers\ScheduleController@dki_phong_th_chieu');
Route::post('/dki-phong-th-toi','App\Http\Controllers\ScheduleController@dki_phong_th_toi');

Route::post('/dki-phong-th-all-hki','App\Http\Controllers\ScheduleController@dki_phong_th_all_hki');


//PHAN CONG 
// frontend---------------------------------------------------------------------------
Route::post('/phan-cong','App\Http\Controllers\ScheduleController@phan_cong');
Route::get('/qli-phan-cong/{subject_id}','App\Http\Controllers\ScheduleController@qli_phan_cong');
Route::post('/insert-nhomhp','App\Http\Controllers\ScheduleController@insert_nhomhp');
Route::post('/show-edit-phancong','App\Http\Controllers\ScheduleController@show_edit_phancong');
Route::get('/delete-phancong/{nhomhp_id}','App\Http\Controllers\ScheduleController@delete_phancong');

//KHOA
//backend
Route::get('/all-khoa','App\Http\Controllers\UserController@all_khoa');
Route::post('/insert-khoa','App\Http\Controllers\UserController@insert_khoa');
Route::post('/show-edit-khoa','App\Http\Controllers\UserController@show_edit_khoa');
Route::post('/update-khoa','App\Http\Controllers\UserController@update_khoa');
Route::get('/delete-khoa/{khoa_id}','App\Http\Controllers\UserController@delete_khoa');
//USER
//backend-----------------------------------------
Route::get('/all-user','App\Http\Controllers\UserController@all_user');
Route::post('assign-roles','App\Http\Controllers\UserController@assign_roles');
Route::post('/show-edit-user','App\Http\Controllers\UserController@show_edit_user');
Route::post('/update-user','App\Http\Controllers\UserController@update_user');
Route::post('/update-pass-user','App\Http\Controllers\UserController@update_pass_user');

Route::get('/delete-user/{user_id}','App\Http\Controllers\UserController@delete_user');
Route::post('/insert-user','App\Http\Controllers\UserController@insert_user');

//suco
Route::get('/all-suco','App\Http\Controllers\ScheduleController@all_suco');
Route::get('/delete-suco/{suco_id}','App\Http\Controllers\ScheduleController@delete_suco');
Route::post('/show-update-suco','App\Http\Controllers\ScheduleController@show_update_suco');
Route::post('/xu-ly-su-co','App\Http\Controllers\ScheduleController@xu_ly_su_co');
Route::post('/edit-su-co','App\Http\Controllers\ScheduleController@edit_su_co');


//chi tiet nhom th
Route::post('/show-dky-lich','App\Http\Controllers\NhomthController@show_dki_lich');



//Nhom th
Route::get('/manage-nhomth','App\Http\Controllers\NhomthController@manage_nhomth');
//front end =======================================================================



Route::post('/select-lophp','App\Http\Controllers\LophpController@select_lophp');
Route::post('/tongnhom','App\Http\Controllers\LophpController@tongnhom');



Route::get('/dangki-nhomth','App\Http\Controllers\NhomthController@dangki_nhomth');
Route::post('/insert-nhomth','App\Http\Controllers\NhomthController@insert_nhomth');
Route::post('/show-edit-nhomht','App\Http\Controllers\NhomthController@show_edit_nhomht');
Route::get('/chitiet-nhomth/{sttlophp}','App\Http\Controllers\NhomthController@chitiet_nhomth');
Route::get('/chitiet-nhomth-admin/{sttlophp}','App\Http\Controllers\NhomthController@chitiet_nhomth_admin');
Route::get('/delete-nhomth/{nhom_id}','App\Http\Controllers\NhomthController@delete_nhomth');



Route::get('/huy-dki-nhom/{nhom_id}','App\Http\Controllers\NhomthController@huy_dki_nhom');







Route::post('/login-user','App\Http\Controllers\UserController@login_user');
Route::get('/dang-nhap','App\Http\Controllers\UserController@dang_nhap');
Route::get('/trang-chu','App\Http\Controllers\UserController@trang_chu');
Route::get('/tkb','App\Http\Controllers\ScheduleController@tkb');
Route::get('/dangki-tkb','App\Http\Controllers\ScheduleController@dangki_tkb');
Route::post('/dang-ky-phong','App\Http\Controllers\ScheduleController@dang_ki_phong');
Route::post('/load-tkb','App\Http\Controllers\ScheduleController@load_tkb');

Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');
Route::get('/huy-all-nhomhp/{nhom_id}','App\Http\Controllers\ScheduleController@huy_all_nhomhp');

Route::get('/su-co','App\Http\Controllers\ScheduleController@su_co');
Route::get('/bao-cao-su-co','App\Http\Controllers\ScheduleController@bao_cao_su_co');

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




Route::get('/all-tuan','App\Http\Controllers\ScheduleController@all_tuan');
Route::post('/insert-tuan','App\Http\Controllers\ScheduleController@insert_tuan');
Route::get('/delete-tuan/{tuan_id}','App\Http\Controllers\ScheduleController@delete_tuan');
