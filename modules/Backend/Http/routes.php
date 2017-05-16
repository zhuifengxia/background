<?php

Route::group(['middleware' => 'backend', 'prefix' => 'backend', 'namespace' => 'Modules\Backend\Http\Controllers'], function()
{
    //login
    Route::get('/auth/login', 'AuthController@getLogin')->name('login');
    Route::post('/auth/login', 'AuthController@login')->name('postLogin');
    Route::get('/auth/logout', 'AuthController@logout')->name('logout');
    //首页
    Route::get('/', 'BackendController@index')->name('home');

    //用户反馈
    Route::get('/feedback/examerrorlist', 'FeedbackController@examerrorlist')->name('examerrorlist');
    Route::get('/feedback/feedbacklist', 'FeedbackController@feedbacklist')->name('feedbacklist');
    Route::get('/feedback/examanalyze', 'FeedbackController@examanalyze')->name('examanalyze');

    //医考天地分类
    Route::get('/examtype/examtypelist', 'ExamtypeController@examtypelist')->name('examtypelist');
    Route::get('/examtype/addexamtype/{id?}', 'ExamtypeController@addexamtype')->name('addexamtype');
    Route::post('/examtypeveexamtype/{id?}', 'ExamtypeController@saveexamtype')->name('saveexamtype');
    Route::post('/examtype/delexamtype/{id?}', 'ExamtypeController@delexamtype')->name('delexamtype');

    //用户管理
    Route::get('/users', 'UsersController@index');
    Route::get('/users/create/{userid?}', 'UsersController@createuser');
    Route::post('/users/createPost/{userid?}', 'UsersController@createPost')->name('usercreate');


});