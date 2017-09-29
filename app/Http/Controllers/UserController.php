<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Answer;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    //авторизация администратора
    public function check(Request $request)
    {
        $user = User::check($request);
        if ($user) {
            //пишем администратора в сессию
            $request->session()->put(['id' => $user->id, 'name' => $user->name, 'role' => 'admin']);
            $categories = Category::all();
            return view('main', ['categories' => $categories]);//отдаем Главную страницу администратору
        } else {
            //пишем пользователя в сессию
            $request->session()->put(['role' => 'user']);
            return redirect('log')->with('message', 'Пользователь не найден!');
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
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|max:255',
            'email' => 'bail|required|email|max:255|unique:users,email',
            'password' => 'bail|required|min:5|max:255',
        ], [
            'required' => 'Обязательное поле',
            'unique' => 'Пользователь с таким именем уже существует',
            'max' => 'Не более 255 символов',
            'min' => 'Не менее 5 символов в пароле'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        //пишем пользователя в БД
        User::create($request->all());
        return redirect('admin')->with('message', 'Новая учетная запись успешно создана.');
    }

    //отдаем форму для смены пароля администратора
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('templates.admin.edit', ['user' => $user]);
    }

    //обновляем пароль в бд
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'bail|required|min:5|max:255',
        ], [
            'required' => 'Обязательное поле',
            'max' => 'Не более 255 символов',
            'min' => 'Не менее 5 символов в пароле'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $user = User::findOrFail($id);
            if ($user) {
                $user->password = ($request->password);
                $user->save();
                $message = 'Пароль успешно изменен!';
            } else {
                $message = 'Пользователь не найден!';
            }
            return redirect(route('admin.list'))->with('message', $message);
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $answers = $user->answer()->get();
        //если есть ответы к вопросам, то перед удалением ответов изменить статус вопросов на "не опубликован"
        if (isset($answers)) {
            foreach ($answers as $value) {
                $answer = Answer::find($value->id);
                $answer->question->status = '0';
                $answer->question->save();
            }
        }

        User::destroy($id);
        return redirect(route('admin.list'))->with('message', 'Администратор успешно удален!');
    }

    //выход администратора
    public function logout()
    {
        //проверяем администратора
        if (session()->get('role') === 'admin') {
            //удаление сессии
            session()->flush();
        }
        return redirect(route('index'))->with('message', 'Сеанс работы завершен!');
    }

}

