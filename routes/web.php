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

Route::get('/session',function (){
//$session = [
  //'2015' => '2014-15',
  //'2016' => '2015-16', 
//];

//$student=[];

//$student[0]['name'] = 'xyz';
//$student[0]['year'] = '2015';
//$student[0]['session'] = $session[$student[0]['year']];
//$student[1]['name'] = 'xyz';
//$student[1]['year'] = '2016';
//$student[1]['session'] = $session[$student[1]['year']];

//dd($student);
  echo '<pre>';
  print_r(Session::all());
  //print_r(Session::get('name'));
  //$user = Session::get('user')['name'];
  //print_r($user);

  // print_r(session()->all());
  // print_r(Session::token());
});
Route::get('/logout',function (){
  session()->flush();
});

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomePageController@index');
Route::get('/irs_member', 'HomePageController@member');
Route::get('/editorial_team', 'HomePageController@editorial_team');
Route::get('/current', 'HomePageController@current');
Route::get('/archive', 'HomePageController@archive');

Route::get('/user_registration', 'User\UserController@user_registration');
Route::post('/user_registration', 'User\UserController@store');

Route::get('/contact', 'HomePageController@contact');



Route::get('admin/login', 'Admin\AdminController@login');
Route::post('admin/checkLogin', 'Admin\AdminController@checkLogin');

Route::group(['middleware' => ['checkadminsession']], function () {
Route::group(['prefix' => 'admin'],function(){
  Route::get('/', 'Admin\DashboardController@index');

  Route::get('/manage_papers', 'Admin\UserPaperController@index');
  Route::get('/review_paper/{id}', 'Admin\UserPaperController@edit');
  Route::post('/review_paper/edit/{userPaper}',['uses'=>'Admin\UserPaperController@update','as'=>'userPaper-review']);
  Route::delete('/manage_papers/delete/{id}', 'Admin\UserPaperController@destroy');


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
  
  Route::get('/manage_issue', 'Admin\IssueController@index');
  Route::delete('/manage_issue/delete/{id}', 'Admin\IssueController@destroy');
  Route::put('/manage_issue/status/{id}', 'Admin\IssueController@status');

  Route::get('/call_paper', 'Admin\CallPaperController@index');

  Route::get('/wise_word', 'Admin\WiseWordController@index');
  Route::post('/wise_word', 'Admin\WiseWordController@store');

  Route::get('/member', 'Admin\IrsMemberController@create');
  Route::post('/member', 'Admin\IrsMemberController@store');

  Route::get('/manage_member', 'Admin\IrsMemberController@index');
  Route::get('/edit_member/{id}', 'Admin\IrsMemberController@edit');
  Route::post('/edit_member/edit/{irsMember}',['uses'=>'Admin\IrsMemberController@update','as'=>'irsMember-update']);
  Route::delete('/manage_member/delete/{id}', 'Admin\IrsMemberController@destroy');

  Route::get('/editorial_team', 'Admin\EditorialTeamController@index');
  Route::post('/editorial_team', 'Admin\EditorialTeamController@store');

  Route::get('/logout', 'Admin\AdminController@adminLogout');

});
});




Route::get('user/login', 'User\UserController@login');
Route::post('user/checkLogin', 'User\UserController@checkLogin');

  Route::group(['middleware' => ['checksession']], function () {
    Route::group(['prefix' => 'user'],function(){
      Route::get('/', 'User\DashboardController@index');
    
      Route::get('/submit_paper', 'Admin\UserPaperController@create');
      Route::post('/submit_paper', 'Admin\UserPaperController@store');
    
    
      Route::get('/view_submitted_paper', 'Admin\UserPaperController@viewSubmittedPaper');
    
      Route::get('/inbox/{id}', 'Admin\UserPaperController@inbox');
      Route::get('/change_pass', 'User\UserController@index');       
      Route::get('/logout', 'User\UserController@userLogout');
  
});




});