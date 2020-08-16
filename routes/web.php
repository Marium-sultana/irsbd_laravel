<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
Route::get('/irs_member', 'HomePageController@member');
Route::get('/editorial_team', 'HomePageController@editorial_team');
Route::get('/current', 'HomePageController@current');
Route::get('/archive', 'HomePageController@archive');
Route::get('/user_registration', 'HomePageController@user_registration');
Route::get('/contact', 'HomePageController@contact');



Route::group(['prefix' => 'admin'],function(){
  Route::get('/', 'Admin\DashboardController@index');
  Route::get('/manage_papers', 'Admin\UserPaperController@index');

  Route::get('/manage_journals', 'Admin\UploadedPaperController@index');
  Route::get('/edit_journal/{id}', 'Admin\UploadedPaperController@edit');
  //Route::get('/edit_journal/delete/{id}', 'Admin\UploadedPaperController@delete_file');
  Route::post('/edit_journals/edit/{uploadedPaper}',['uses'=>'Admin\UploadedPaperController@update','as'=>'journalPaper-update']);
  Route::delete('/manage_journals/delete/{id}', 'Admin\UploadedPaperController@destroy');
  

  Route::get('/add_banner', 'Admin\BannerImageController@index');
  Route::post('/add_banner', 'Admin\BannerImageController@store');

  Route::get('/cover_image', 'Admin\CoverImageController@index');
  Route::post('/cover_image', 'Admin\CoverImageController@store');

  Route::get('/add_journal', 'Admin\UploadedPaperController@create');
  Route::post('/add_journal', 'Admin\UploadedPaperController@store');

  Route::get('/send_mail', 'Admin\MailController@index'); 

  Route::get('/add_issue', 'Admin\IssueController@create');
  Route::post('/add_issue', 'Admin\IssueController@store');

  Route::get('/manage_issue', 'Admin\IssueController@show'); 
  Route::get('/call_paper', 'Admin\CallPaperController@index');

  Route::get('/wise_word', 'Admin\WiseWordController@index');
  Route::post('/wise_word', 'Admin\WiseWordController@store');

  Route::get('/member', 'Admin\IrsMemberController@create');
  Route::post('/member', 'Admin\IrsMemberController@store');

  Route::get('/manage_member', 'Admin\IrsMemberController@show');
  Route::get('/editorial_team/{id}', 'Admin\EditorialTeamController@edit');
});



Route::group(['prefix' => 'user'],function(){
  Route::get('/', 'User\DashboardController@index');
  Route::get('/submit_paper', 'Admin\UserPaperController@create');
  Route::get('/view_submitted_paper/{id}', 'Admin\UserPaperController@show');
  Route::get('/inbox/{id}', 'Admin\UserPaperController@inbox');
  Route::get('/change_pass', 'User\UserController@index');
  Route::get('/login', 'User\UserController@login');
});