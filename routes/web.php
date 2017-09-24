<?php

Route::get('/', 'PageController@redirected');
Route::get('index', 'PageController@index')->name('index');
Route::get('log', 'PageController@login')->name('log');

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

    //работа с категориями
    Route::resource('category', 'CategoryController', ['except' => 'show']);

    //работа с вопросами в категориях
    Route::get('category/{category}/question/create', 'QuestionController@create')->name('question.create');
    Route::get('category/{id}/question', 'QuestionController@lister')->name('category.question');
    Route::get('question/edit/{id}', 'QuestionController@edit')->name('question.edit');

    //работа с ответами
    Route::resource('answer', 'AnswerController', ['except' => 'show', 'index']);
    Route::get('answer/{question}/create', 'AnswerController@create')->name('answer.create');

    //смена статуса вопроса (скрытый-опубликованный)
    Route::get('question/{question}/status/{status}',
        'QuestionController@changeStatusQuestion')->name('question.status');

});

//работа с вопросами
Route::resource('question', 'QuestionController', ['except' => 'show']);



