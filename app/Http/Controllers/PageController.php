<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PageController extends Controller
{
    public function index()
    {
        session()->put(['role' => 'user']);
        $categories = Category::all();
        //отдать страницу обычного пользователя
        //return view('main', ['categories' => $categories]);
        //не забыть поменять
        return view('admin', ['categories' => $categories]);
    }

    public function redirected()
    {
        return redirect('index');
    }

    public function login()
    {
        return view('login');
    }
}
