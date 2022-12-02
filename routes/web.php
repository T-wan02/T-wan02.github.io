<?php

use App\Http\Controllers\Admin\PageController;
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
    return redirect('/employee/login');
});

Route::group(['middleware' => ['RedirectIfAuthAdmin']], function () {
    //admin auth
    Route::get('/admin/login', 'AuthController@adminShowLogin');
    Route::post('/admin/login', 'AuthController@adminPostLogin');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['Admin']], function () {
    Route::get('/', 'PageController@home');

    Route::resource('/company', 'CompanyController');
    Route::get('/company/more-detail/{slug}', 'CompanyController@moreDetail');

    Route::resource('/employee', 'EmployeeController');
    Route::get('/employee/detail/{slug}', 'EmployeeController@detail');

    Route::resource('/hiring', 'HiringController');
    Route::get('/enrollment/{slug}', 'PageController@enrollmentDetail');
    Route::post('/enrollment/post-status/{slug}', 'PageController@postStatus');

    Route::get('/interview', 'PageController@interview');

    Route::resource('/task', 'TaskController');
    Route::get('/task/detail/{slug}', 'PageController@taskDetail');

    Route::get('/logout', 'AuthController@logout');

    Route::get('/interview/detail/{slug}', 'PageController@interviewDetail');
    Route::post('/interview/detail/post-result/{slug}', 'PageController@postResult');

    Route::post('/interview/detail/set-salary/{slug}', 'PageController@setSalary');

    Route::get('/resign', 'PageController@showResign');
    Route::get('/resign-detail/{slug}', 'PageController@resignDetail');
    Route::post('/submit-resign/{slug}', 'PageController@submitResign');
});

Route::group(['middleware' => ['RedirectIfAuthEmployee']], function () {
    // Register for the employee
    Route::get('/employee/register/{interview_slug}/{company_slug}/{role_slug}', 'AuthController@register');
    Route::post('/employee/post-register/{interview_slug}', 'AuthController@registerEmployee');

    //employee login
    Route::get('/employee/login', 'AuthController@showLogin');
});

Route::post('/employee/post-login', 'AuthController@postLogin');

Route::group(['prefix' => 'employee', 'namespace' => 'Employee', 'middleware' => ['Employee']], function () {
    Route::get('/', 'PageController@home');

    Route::get('/task', 'PageController@task');
    Route::get('/task/{slug}', 'PageController@taskDetail');
    Route::post('/task/start/{slug}', 'PageController@startTask');

    Route::get('/task-list', 'PageController@taskList');

    Route::get('/profile/{slug}', 'PageController@profile');
    Route::post('/change-password/{slug}', 'PageController@changePassword');

    Route::get('/resign', 'PageController@resign');
    Route::post('/post-resign', 'PageController@postResign');

    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/employee/login')->with('success', 'Logout successfully');
    });
});
