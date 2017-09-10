<?php

Route::get('/', function () {
    return redirect('index');
});
Route::get('index', 'PageController@index')->name('index');


Route::get('log', function () {
    //отдать страницу входа администратора
    return view('login');
});
//впустить администратора в систему
Route::post('admin/login', 'UserController@check')->name('admin.login');

Route::group(['middleware' => 'role'], function () {
    Route::resource('admin', 'UserController', ['except' => 'show']);
    //список всех администраторов
    Route::get('admin', 'UserController@index')->name('admin.list');

//отдать форму регистрации нового администратора
    Route::get('register', 'UserController@create')->name('register');

//выпустить администратоора
    Route::get('admin/logout', 'UserController@logout')->name('admin.logout');
});


//работа с категориями
Route::resource('category', 'CategoryController', ['except' => 'show']);

//работа с вопросами
Route::resource('question', 'QuestionController', ['except' => 'show', 'index']);

Route::get('category/{category}/question/create', 'QuestionController@create')->name('question.create');

Route::get('category/{id}/question', 'QuestionController@lister')->name('category.question');
