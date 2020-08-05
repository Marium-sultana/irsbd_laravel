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

//Route::get('/', function () {
  //  return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomePageController@index');

Route::group(['prefix' => 'admin'],function(){
  Route::get('/', 'Admin\DashboardController@index');
  Route::get('/manage_papers', 'Admin\UserPaperController@index');
  Route::get('/manage_journals', 'Admin\UploadedPaperController@index');
  Route::get('/add_banner', 'Admin\BannerImageController@index');
  Route::get('/cover_image', 'Admin\CoverImageController@index');
  Route::get('/add_journal', 'Admin\IssueController@index');
  Route::get('/send_mail', 'Admin\MailController@index'); 
  Route::get('/add_issue', 'Admin\IssueController@store');
  Route::get('/manage_issue', 'Admin\IssueController@show'); 
  Route::get('/call_paper', 'Admin\CallPaperController@index');
  Route::get('/wise_word', 'Admin\WiseWordController@index');
  Route::get('/member', 'Admin\IrsMemberController@index');
  Route::get('/manage_member', 'Admin\IrsMemberController@show');
  Route::get('/editorial_team/{id}', 'Admin\EditorialTeamController@edit');
});

Route::group(['prefix' => 'user'],function(){
  Route::get('/', 'User\DashboardController@index');
});