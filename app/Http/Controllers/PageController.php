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
        return view('main', ['categories' => $categories]);
    }
}
