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


//SCHEDULE
// backend---------------------------------------------------------------------------
Route::get('/all-schedule','App\Http\Controllers\ScheduleController@all_schedule');
// frontend---------------------------------------------------------------------------


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
Route::post('/save-software-room','App\Http\Controllers\RoomController@save_software_room');
Route::post('/insert-software-room','App\Http\Controllers\RoomController@insert_software_room');
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
