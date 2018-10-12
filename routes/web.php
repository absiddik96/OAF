<?php
use App\Models\Admin\Department;

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

Route::get('/', 'Admission\Form\AdmissionFormsController@create')->name('home');
Route::post('admission-form', 'Admission\Form\AdmissionFormsController@store')->name('admission-form.store');

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::group(['prefix' => 'admin','middleware'=>['auth','isAdmin']], function() {

    Route::resource('user', 'Admin\User\UsersController');
    Route::get('users/{user_id}/activate', 'Admin\User\UsersController@user_activate')->name('user.activated');
    Route::get('users/{user_id}/deactivate', 'Admin\User\UsersController@user_deactivate')->name('user.deactivated');

    Route::resource('department', 'Admin\Department\DepartmentsController')->except('create', 'show');
    Route::resource('exam_seasons', 'Admin\ExamSeason\ExamSeasonsController')->except('show');
    Route::resource('application-deadlines', 'Admin\ApplicationDeadlines\ApplicationDeadlinesController')->except('show');
    Route::get('application-deadlines/{id}/status', 'Admin\ApplicationDeadlines\ApplicationDeadlinesController@status')->name('application-deadlines.status');

    Route::get('applicants', 'Admin\Applicant\ApplicantsController@index')->name('applicants.list');
    Route::get('applicant/{id}', 'Admin\Applicant\ApplicantsController@show')->name('applicant.show');
    Route::get('applicant/{id}/approve', 'Admin\Applicant\ApplicantsController@makeApproved')->name('applicant.approve');
    Route::get('applicant/{id}/unapprove', 'Admin\Applicant\ApplicantsController@makeUnapproved')->name('applicant.unapprove');

});

Route::group(['middleware'=>'auth'], function() {

    Route::get('profile/update','Profile\ProfilesController@editProfile')->name('profile.edit');
    Route::put('profile/update','Profile\ProfilesController@updateProfile')->name('profile.update');

    Route::get('password/update','Profile\ProfilesController@changePassword')->name('password.change');
    Route::put('password/update','Profile\ProfilesController@updatePassword')->name('password.update');

});
