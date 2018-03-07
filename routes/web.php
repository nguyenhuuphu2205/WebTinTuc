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
Route::get('admin/dangnhap','UserController@getDangNhap');
Route::post('admin/dangnhap','UserController@postDangNhap');
Route::get('admin/logout','UserController@logout');
//Nhóm route admin thể loại
//Nhóm route của trang admin để quản lý thể loại
Route::group(['prefix'=>'admin','middleware'=>['admin']],function(){
   Route::group(['prefix'=>'theloai'],function(){
        Route::get('danhsach','TheLoaiController@getDanhSach');
        Route::get('sua/{id}','TheLoaiController@getSua');
        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');
       Route::get('xoa/{id}','TheLoaiController@getXoa');
       Route::post('sua/{id}','TheLoaiController@postSua');
   });
   //Nhóm route admin loại tin
    //Nhóm route của trang admin để quản lý loại tin
   Route::group(['prefix'=>'loaitin'],function(){
       Route::get('danhsach','LoaiTinController@getDanhSach');
       Route::get('sua/{id}','LoaiTinController@getSua');
       Route::post('sua/{id}','LoaiTinController@postSua');
       Route::get('them','LoaiTinController@getThem');
       Route::post('them','LoaiTinController@postThem');
       Route::get('xoa/{id}','LoaiTinController@getXoa');
   });
   //Nhóm route admin tin tức
    //Nhóm route của trang admin để quản lý tin tức
   Route::group(['prefix'=>'tintuc'],function(){
       Route::get('danhsach','TinTucController@getDanhSach');
       Route::get('sua/{id}','TinTucController@getSua')->name('sua');
       Route::post('sua/{id}','TinTucController@postSua');
       Route::get('them','TinTucController@getThem');
       Route::post('them','TinTucController@postThem');
       Route::get('xoa/{id}','TinTucController@getXoa');
       Route::get('xoa/comment/{id}','CommentController@getXoa');
   });
   //Nhóm route admin slide
    //Nhóm route của trang admin để quản lý slide
   Route::group(['prefix'=>'slide'],function(){
       Route::get('danhsach','SlideController@getDanhSach');
       Route::get('sua/{id}','SlideController@getSua');
       Route::post('sua/{id}','SlideController@postSua');
       Route::get('them','SlideController@getThem');
       Route::post('them','SlideController@postThem');
       Route::get('xoa/{id}','SlideController@getXoa');

   });
   //Nhóm route admin user
    //Nhóm route của trang admin để quản lý user
   Route::group(['prefix' => 'user'],function(){
       Route::get('danhsach','UserController@getDanhSach');
       Route::get('sua/{id}','UserController@getSua');
       Route::post('sua/{id}','UserController@postSua');
       Route::get('them','UserController@getThem');
       Route::post('them','UserController@postThem');
       Route::get('xoa/{id}','UserController@getXoa');
   });
   //Nhóm route ajax
    Route::group(['prefix'=>'ajax'],function(){
       Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
    });
});
//Nhóm route trang front_end
Route::get('trangchu','PageController@getTrangChu');
Route::get('loaitin/{id}','PageController@getLoaiTin');
Route::get('tintuc/{id}','PageController@getTinTuc');
Route::get('lienhe','PageController@getLienHe');
Route::get('gioithieu','PageController@getGioiThieu');
Route::get('dangnhap','PageController@getDangNhap');
Route::post('dangnhap','PageController@postDangNhap');
Route::get('dangxuat','PageController@getDangXuat');
Route::get('dangky','PageController@getDangKy');
Route::post('dangky','PageController@postDangKy');
Route::get('nguoidung','PageController@getNguoiDung');
Route::post('nguoidung','PageController@postNguoiDung');
Route::post('binhluan/{id}','AjaxController@postBinhLuan');
Route::get('timkiem/{tukhoa}','AjaxController@getTimKiemTinTuc');
// Group route login facebook
Route::get('auth/facebook','FacebookController@redirectToFacebookProvider');
Route::get('auth/facebook/callback','FacebookController@handProviderCallback');
Route::get('auth/google','GoogleController@redirectToGoogleProvider');
Route::get('auth/google/callback','GoogleController@handProviderCallback');

