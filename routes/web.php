<?php

use App\Http\Controllers\homecontroller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('home');
});
Route::post('/send/mail','SendMail@sendmail');
Route::get('/send/message','SMScontroller@send');

// chat
Route::get('/bac-si/chat','chatController@listchat');
Route::get('/bac-si/chat/khoa/{Makhoa}','chatController@chatkhoa');
Route::get('/bac-si/chat/{Matk}','chatController@box_chat');
Route::post('/bac-si/chat/send','chatController@send');
Route::get('/bac-si/chat/load/{MaNN}','chatController@box_chat1');
Route::get('/bac-si/test','chatController@test');
Route::get('/bac-si/test','chatController@test');
Route::get('/bac-si/chat/xemtin/{Matk}','chatController@xemtin');
Route::get('/trangbacsi/tai-tin/{Matk}','chatController@loadtin');
Route::get('/trangbacsi/tincho/','chatController@tincho');
Route::get('/trangbacsi/timkiem/{key}','chatController@timkiem');




//login
Route::get('/dangnhap','homecontroller@dangnhap');
route::post('/login','loginController@dangnhap');
route::post('/dangky','loginController@dangky');
route::get('/test/{key}','loginController@kiemtra');
route::get('/dangxuat','loginController@dangxuat');
route::get('/quenmatkhau','loginController@quenmatkhau');
route::post('/layma','loginController@layma');
route::post('/xacthuc','loginController@xacthuc');
route::post('/cap-nhat-mat-khau','loginController@capnhatmatkhau');
route::get('/doimatkhau','loginController@doimatkhau');
Route::get('/dienthongtin/chongio/{MaBS}','homecontroller@chonca');
Route::get('/dienthongtin/chongio/gio/{MaBS}','homecontroller@chongio');
// home 
Route::get('/datlich', 'homecontroller@layout');
Route::get('/quy-trinh', 'homecontroller@quytrinh');
Route::get('/dsbacsi/{MaKhoa}', 'homecontroller@dsbacsi');
Route::get('/dskhoa/{key}', 'homecontroller@dskhoa');

Route::post('/timkiem', 'homecontroller@timkiem');
Route::get('/lichkham/{id}','homecontroller@lichkham' );
Route::get('/dienthongtin','homecontroller@diendangky');
Route::get('/quan/{Maquan}','homecontroller@quan');
Route::get('/theongay','homecontroller@homnay');
Route::get('dsbacsi/ngaytruc/{ngay}','homecontroller@ngaytruc');

Route::post('/dienthongtin','benhnhanController@diendangky');// Điền thông tin bệnh nhân
Route::get('/dienthongtin/lay-benh-nhan/{MaBN}','benhnhanController@chitietbenhnhan');
//benhnhan
Route::get('/thanhcong/{key}','benhnhanController@thanhcong');
Route::get('/trangcanhan','benhnhanController@trangcanhan');
Route::get('/trangcanhan/chi-tiet-benh-nhan/{MaBN}','benhnhanController@chitietbenhnhan');
Route::post('/trang-ca-nhan/cap-nhat','benhnhanController@capnhat');
Route::get('/trang-ca-nhan/lich-kham/','benhnhanController@lichkham');
Route::get('/ma-qr','benhnhanController@showqr');
Route::get('/trangcanhan/xoa/{MaBN}','benhnhanController@xoabenhnhan');
Route::get('/trangcanhan/xoa/{MaBN}','benhnhanController@xoabenhnhan');
Route::get('/kiemtra/{MaLK}','benhnhanController@kiemtra');
Route::get('/kiemtra/load/stt/{MaLT}','benhnhanController@stt');

//test 
Route :: get('/test','homecontroller@test');

//bacsi
Route::get('/bacsi', 'BacsiController@index');
Route::get('/trangbacsi', 'BacsiController@bacsi_layout');
Route::post('/trangbacsi/capnhat', 'BacsiController@capnhattt');
Route::post('/trangbacsi/capnhattk', 'BacsiController@capnhattk');
Route::get('/logout-bacsi', 'BacsiController@logout');
Route::post('/admin-dashboard','BacsiController@dashboard');

// bacsi
Route::get('bac-si/lich-truc', 'BacsiController@lichtruc');
Route::get('/bac-si/lich-truc/{NgayTruc}', 'BacsiController@lichtruc_chitiet');
Route::get('/bac-si/lich-hen/{MaLT}', 'BacsiController@lichhen');
Route::get('/bac-si/chi-tiet-benh-nhan/{MaLK}', 'BacsiController@chitietbenhnhan');
Route::post('/bac-si/capnhat/', 'BacsiController@capnhat');
Route::get('/bac-si/danh-sach-benh-nhan', 'BacsiController@danhsachbenhnhan');
Route::get('/bac-si/danh-sach-bn', 'BacsiController@danhsachbn');
Route::get('/bac-si/kham', 'BacsiController@kham');
Route::get('/bac-si/confirm-status/{MaLK}/{otherVariable}', 'BacsiController@confirmstatus');








//backend admin
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@admin_layout');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard','AdminController@dashboard');


//QLbacsi
Route::get('/add-bacsi', 'QLBacSi@add_bacsi');
Route::get('/ds-bacsi', 'QLBacSi@ds_bacsi')->name('ds-bacsi');
Route::get('/getphong/{MaP}', 'QLBacSi@getphong');
Route::get('/unactive-bacsi/{Ma_bacsi}', 'QLBacSi@unactive_bacsi');
Route::get('/active-bacsi/{Ma_bacsi}', 'QLBacSi@active_bacsi');

Route::post('/save-bacsi', 'QLBacSi@save_bacsi');
//Xoabacsi
Route::get('/delete-bacsi/{Ma_bacsi}', 'QLBacSi@delete_bacsi');
//Suabacsi
Route::get('/edit-bacsi/{Ma_bacsi}', 'QLBacSi@edit_bacsi');
Route::post('/update-bacsi/{Ma_bacsi}', 'QLBacSi@update_bacsi');
//chitietbacsi
Route::get('/chitietbacsi/{Ma_bacsi}', 'QLBacSi@chitietbs');

//QLKhoa
Route::get('/add-Khoa', 'QLKhoa@add_Khoa');
Route::get('/ds-Khoa', 'QLKhoa@ds_Khoa');
Route::post('/save-Khoa', 'QLKhoa@save_Khoa');

Route::get('/unactive-khoa/{Ma_Khoa}', 'QLKhoa@unactive_khoa');
Route::get('/active-khoa/{Ma_Khoa}', 'QLKhoa@active_khoa');

//XoaKhoa
Route::get('/delete-Khoa/{MaKhoa}', 'QLKhoa@delete_Khoa')->name('delete.khoa');
//SuaKhoa
Route::get('/edit-Khoa/{Ma_Khoa}', 'QLKhoa@edit_Khoa');
Route::post('/update-Khoa/{Ma_Khoa}', 'QLKhoa@update_Khoa');


//QLBenhNhan
Route::get('/add-benhnhan', 'QLBenhNhan@add_benhnhan');
Route::post('/save-benhnhan', 'QLBenhNhan@save_benhnhan');
Route::get('/ds-BenhNhan', 'QLBenhNhan@ds_BenhNhan');
Route::get('/chitietbenhnhan/{Ma_benhnhan}', 'QLBenhNhan@chitietbn');
Route::get('/delete-benhnhan/{MaBN}', 'QLBenhNhan@delete_benhnhan')->name('delete.benhnhan');

//QLPhong
Route::get('/add-Phong', 'QLPhong@add_Phong');
Route::post('/save-Phong', 'QLPhong@save_Phong');
Route::get('/ds-Phong', 'QLPhong@ds_Phong');

Route::get('/unactive-Phong/{Ma_Phong}', 'QLPhong@unactive_Phong');
Route::get('/active-Phong/{Ma_Phong}', 'QLPhong@active_Phong');

Route::get('/edit-Phong/{Ma_Phong}', 'QLPhong@edit_Phong');
Route::post('/update-Phong/{Ma_Phong}', 'QLPhong@update_Phong');
//xoa phong
Route::get('/delete-phong/{MaPhong}', 'QLPhong@delete_Phong')->name('delete.phong');

//QLLichTruc
Route::get('/add-LTruc', 'QLLichTruc@add_LTruc');
Route::get('/bs-add-LTruc', 'QLLichTruc@bs_add_LTruc');
Route::post('/save-LTruc', 'QLLichTruc@save_LTruc');
Route::post('/bs-save-LTruc', 'QLLichTruc@bs_save_LTruc');
Route::get('/ds-LTruc', 'QLLichTruc@ds_LTruc');

Route::get('/edit-LTruc/{Ma_LTruc}', 'QLLichTruc@edit_LTruc');
Route::post('/update-LTruc/{Ma_LTruc}', 'QLLichTruc@update_LTruc');
Route::get('/delete-LTruc/{Ma_LTruc}', 'QLLichTruc@delete_LTruc');


//lịch khám
Route::get('/ds-LKham', 'QLLichTruc@ds_Lkham');
Route::get('/chitietlichkham/{Ma_LKham}', 'QLLichTruc@chitietLK');
Route::get('/lichkham/confirm-pay/{MaLK}', 'QLLichTruc@confirmpay');


//tài khoản
Route::get('/ds-TaiKhoan', 'QLLichTruc@ds_TaiKhoan');
Route::get('/edit-TaiKhoan/{Ma_TaiKhoan}', 'QLLichTruc@edit_TaiKhoan');
Route::post('/update-TaiKhoan/{Ma_TaiKhoan}', 'QLLichTruc@update_TaiKhoan');
Route::get('/delete-TaiKhoan/{Ma_TaiKhoan}', 'QLLichTruc@delete_TaiKhoan');

Route::get('/add-TaiKhoan', 'QLLichTruc@add_TaiKhoan');
Route::post('/save-TaiKhoan', 'QLLichTruc@save_TaiKhoan');

//Order

Route::get('/print-order/{malk}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::get('/bac-si/print-toa-thuoc', 'OrderController@intoathuoc');