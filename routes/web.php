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

Route::get('/', function () {
  return view('index');
});
Route::get('/noaccess', function () {
  return view('welcome');
});

//lupapw
Route::get('/forgot_password', 'securityController@forgot');
Route::post('/forgot_pass', 'securityController@forgotpw');
//veriftoken
Route::get('/forgot_password/reset', 'securityController@verifytoken');
Route::post('/activationtoken/', 'securityController@postverifytoken');
//resetpw
Route::get('/resetpassword/{id}', 'securityController@reset')->name('resetpassword');
Route::post('/resetnewpassword/{id}', 'securityController@updatepass');


//LOGIN dan register
Route::get('/login', 'C_login@klikLogin')->name('login');
Route::post('/postlogin','C_login@loginAction');
Route::get('/logout', 'C_login@KlikLogout');
Route::get('/admin/register', 'C_daftar@KlikDaftar');
Route::post('/postregister', 'C_daftar@daftarAction');
Route::get('/register', 'C_daftar@KlikDaftarmaster');
Route::post('/postregis', 'C_daftar@daftarActionnaster');


//ADMIN
Route::group(['middleware' => ['auth', 'checkrole:admin']], function(){
  Route::get('/dashboard', 'C_home@setviewhome');
  Route::get('/notfound', 'notfoundController@notfound');

  //data art
  Route::get('/dataart', 'C_ART@dataart');
  Route::post('/dataart/create','C_ART@create');
  Route::get('/art/edit/{id}', 'C_ART@edit');
  Route::post('/art/{id}/update', 'C_ART@update');
  Route::get('/art/profile/{id}','C_ART@profilart');

  //data master
  Route::get('/datamaster', 'C_Master@datamaster');
  Route::get('/master/profile/{id}','C_Master@profilmaster');

  //profil admin
  Route::get('/dataku/{id}','C_ProfileAdmin@profiladmin');
  Route::get('/dataku/edit/{id}', 'C_ProfileAdmin@editadmin');
  Route::post('/admin/{id}/update', 'C_ProfileAdmin@updateadmin');
  Route::get('/dataku/edit/gantipassword/{id}', 'C_ProfileAdmin@gantipw');
  Route::post('/updatepassword/{id}', 'C_ProfileAdmin@updatepass');
  
  //data paket pekerjaan
  Route::get('/data_paket_pekerjaan', 'C_Paket_Pekerjaan@index');
  Route::post('/paket_pekerjaan/create','C_Paket_Pekerjaan@create');
  Route::get('/paket_pekerjaan/{id}', 'C_Paket_Pekerjaan@show');
  Route::get('/paket_pekerjaan/edit/{id}', 'C_Paket_Pekerjaan@edit');
  Route::post('/paket_pekerjaan/update/{id}', 'C_Paket_Pekerjaan@update');

  //data order paket
   Route::get('/data_order', 'C_order_paket@lihatorder');
   Route::get('/data_riwayat_order', 'C_order_paket@lihatriwayat');
});


//art
Route::group(['middleware' => ['auth', 'checkrole:art']], function(){
  Route::get('/index', 'C_home@setviewhomeart');
  Route::get('/paket_pekerjaan', 'C_Paket_Pekerjaan@paket_pekerjaan_art');
  Route::get('/errors', 'ArtController@error');
  Route::get('/profilku/{id}', 'ArtController@profilart');
  Route::get('/profilku/setting/{id}', 'ArtController@settingart');
  Route::post('/profilku/update/{id}', 'ArtController@updateart');
  Route::post('/profilku/deskripsi/{id}', 'ArtController@updatedesk');
  Route::get('/profilku/changepassword/{id}', 'ArtController@editpass');
  Route::post('/postpass/{id}', 'ArtController@updatepass');
  Route::get('/about_us', 'ArtController@about');
 Route::get('/pesananku', 'C_order_paket@pesananku');
});


// //master
Route::group(['middleware' => ['auth', 'checkrole:master']], function(){
  Route::get('/home', 'C_home@setviewhomemaster');
  Route::get('/error', 'MasterController@error');
  Route::get('/aboutus', 'MasterController@about');
  Route::get('/contactus', 'MasterController@contact');
  Route::get('/myprofil/{id}', 'MasterController@profilku');
  Route::get('/myprofil/setting/{id}', 'MasterController@setting');
  Route::post('/myprofil/update/{id}', 'MasterController@update');
  Route::get('/myprofil/changepassword/{id}', 'MasterController@changepass');
  Route::post('/postpassword/{id}', 'MasterController@postpass');
  Route::get('/paketpekerjaan', 'C_Paket_Pekerjaan@paket_pekerjaan');
  Route::get('/paketpekerjaan/order/{id}', 'C_order_paket@klikorder');
  Route::post('/postorder', 'C_order_paket@postorder');
    Route::get('/checkout', 'C_order_paket@checkout');
    Route::get('/myorder', 'C_order_paket@myorder');
    Route::post('/batal_order/{id}', 'C_order_paket@batal_order');
});
