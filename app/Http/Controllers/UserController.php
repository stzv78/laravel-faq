<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //авторизация администратора
    public function check(Request $request)
    {
        $user = User::check($request);
        if ($user) {
            //пишем администратора в сессию
            $request->session()->put(['id' => $user->id, 'name' => $user->name, 'role' => 'admin']);
            return view('main');//перенаправляем на Главную страницу
        } else {
            //пишем пользователя в сессию
            $request->session()->put(['role' => 'user']);
            $data = [
                'class' => 'danger',
                'message' => 'Пользователь не найден!',
                'text' => 'Войти снова',
                'route' => '/log'
            ];
            // Генерим страницу с сообщением, что пользователь не найден, и надписью на ней и ссылкой куда нужно Войти снова
            return view('templates.message', $data);
        }
    }

    //все администраторы
    public function index()
    {
        $users = User::latest()->get();
        return view('templates.admin.list', ['users' => $users]);
    }

    public function create()
    {
        //отдаем форму регистрации
        return view('register');
    }

    //сохраняем данные нового администратора
    public function store(Request $request)
    {
        //есть ли такой e-mail в БД
        if (User::where('email', $request->email)->first()) {
            $data = [
                'class' => 'danger',
                'message' => 'Пользователь уже существует!',
                'text' => 'Ok',
                'route' => '/register'
            ];
        } else {
            //пишем пользователя в БД
            User::create($request->all());
            $data = [
                'class' => 'success',
                'message' => 'Новая учетная запись успешно создана!',
                'text' => 'Ok',
                'route' => '/admin'
            ];
        }
        // Отдаем страницу с сообщением
        return view('templates.message', $data);
    }

    //отдаем форму для смены пароля администратора
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('templates.admin.edit', ['user' => $user]);
    }

    //обновляем пароль (и имя при необходимости) в бд
    public function update(Request $request, User $user)
    {

        if ($user) {
            $user->name = $request->name;
            $user->password = $user->hash($request->password);
            //если нужно менять и логин(e-mail)
            //$user->email = $request->email;
            $user->save();
            $data = [
                'class' => 'success',
                'message' => 'Пароль успешно изменен!',
                'text' => 'Ok',
                'route' => '/index'
            ];
        } else {
            $data = [
                'class' => 'danger',
                'message' => 'Ошибка данных!',
                'text' => 'Ok',
                'route' => '/index'
            ];
        }
        return view('templates.message', $data);
    }

    public function destroy(User $user)
    {

        User::destroy($user->id);
        $data = [
            'class' => 'success',
            'message' => 'Администратор успешно удален!',
            'text' => 'Ok',
            'route' => '/admin'
        ];
        return view('templates.message', $data);
    }

    //выход администратора
    public function logout()
    {
        //проверяем
        if (session()->get('role') === 'admin') {
            //удаление сессии
            session()->flush();
        }
        $data = [
            'class' => 'success',
            'message' => 'Сеанс работы завершен!',
            'text' => 'Ok',
            'route' => '/index'
        ];
        // Отдаем страницу с сообщением
        return view('templates.message', $data);
    }

}

