<?php

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
Route::group(['middleware' => ['CheckLogin']], function () {
        Route::get('/','HomeController@index')->name('home');
	Route::resource('/tai-khoan','TaiKhoanController');
        Route::resource('/nhap-lieu','ThuNhapController');
        Route::get('thong-ke','ThongKeController@index')->name('thong-ke.index');
        Route::post('thong-ke/chi-tiet','ThongKeController@thongKe')->name('thong-ke.thongKe');
});
Route::get('admin/dang-nhap', 'DangNhapController@getDangNhap')->name('dang-nhap.getDangNhap');
Route::PUT('admin/dang-nhap/doi-mat-khau', 'DangNhapController@changePass')->name('dang-nhap.changePass');
Route::post('admin/dang-nhap/xu-ly', 'DangNhapController@postDangNhap')->name('dang-nhap.postDangNhap');
/*�?ăng Nhập admin*/
Route::post('admin/dang-nhap/xu-ly/admin', 'DangNhapController@postDangNhapAdmin')->name('dang-nhap.postDangNhapAdmin');
Route::get('admin/dang-xuat',function(){
	Session::flush();
	Artisan::call('cache:clear');
	return redirect()->route('dang-nhap.getDangNhap');
})->name('dang-xuat');
