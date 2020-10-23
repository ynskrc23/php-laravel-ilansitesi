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

Route::get('/','HomeController@index');


//admin
Route::get('/admin-logout','AdminController@logout');
Route::get('/admin-login','AdminController@index');
Route::get('/dashboard','AdminController@admin_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');


//users
Route::get('/logout','UsersController@logout');
Route::get('/login','UsersController@index');
Route::get('/sayfa','UsersController@users_sayfa');
Route::post('/users-sayfa','UsersController@sayfa');
Route::post('/add-users','UsersController@add_users')->name('addpusers');
Route::get('/edit-ayar/{users_id}','UsersController@edit_ayar');
Route::put('/update-ayar/{users_id}','UsersController@update_ayar');


//reklamyayinla
Route::get('/reklam-yayinla','ReklamyayinlaController@reklamyayinla_all');
Route::get('/reklam-yayinla-aktif','ReklamyayinlaController@reklamyayinla_aktif');
Route::get('/reklam-yayinla-pasif','ReklamyayinlaController@reklamyayinla_pasif');
Route::post('/addpreklamyayinla','ReklamyayinlaController@add_reklam')->name('addpreklamyayinla');
Route::get('/delete-reklamyayinla/{reklamy_id}','ReklamyayinlaController@delete_reklam');
Route::get('/edit-reklamyayinla/{reklamy_id}','ReklamyayinlaController@edit_reklam');
Route::put('/update-reklamyayinla/{reklamy_id}','ReklamyayinlaController@update_reklam');


//reklamver
Route::post('/addreklamver','ReklamverController@add_reklamver')->name('addreklamver');
Route::get('/delete-reklamver/{reklamver_id}','ReklamverController@delete_reklamver');

//ilanekle
Route::get('/ilan-ekle','ilanController@index');
Route::post('/addilan','ilanController@add_ilan')->name('addilan');
Route::get('/ilan_detay/{ilan_id}','ilanController@ilan_detay');
Route::get('/delete-ilan/{ilan_id}','ilanController@delete_ilan');
Route::get('/edit-ilan/{ilan_id}','ilanController@edit_ilan');
Route::put('/update-ilan/{ilan_id}','ilanController@update_ilan');
Route::post('/delete-resim/{picture_id}','ilanController@delete_resim');
Route::get('/edit-resim/{ilan_id}','ilanController@edit_resim');
Route::get('/ilan-foto','ilanController@ilan_foto');
Route::post('/addfoto','ilanController@add_foto')->name('addfoto');
Route::post('/updatefoto','ilanController@update_foto')->name('updatefoto');


// Listeleme 
//emlak
route::get('/arsa','ListeleController@arsa_listele');
route::get('/daire','ListeleController@daire_listele');
route::get('/isyeri','ListeleController@isyeri_listele');
//otomobil
route::get('/kiralik','ListeleController@kiralik_listele');
route::get('/sifir','ListeleController@sifir_listele');
route::get('/ikinciel','ListeleController@ikinciel_listele');
//iş ilanları
route::get('/is-ilanlari','ListeleController@isilanlari_listele');
//iş ilanları
route::get('/ikinciel-urunler','ListeleController@ikincielurunler_listele');
//canli hayvan ilanları
route::get('/canli-hayvan','ListeleController@canlihayvan_listele');
//Yedek Parça ilanları
route::get('/yedek-parça','ListeleController@yedekparca_listele');
//Özel Ders Verenler ilanları
route::get('/ozel-ders','ListeleController@ozelders_listele');

// Yorumlar 
Route::post('/addyorum','YorumController@add_yorum')->name('addyorum');

//iletisim
Route::get('/iletisim','iletisimController@iletisim');
Route::post('/iletisim/send','iletisimController@send');
