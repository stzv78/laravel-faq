<?php

namespace App\Http\Controllers;

use App\Models\Category;

class PageController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        if (session()->get('role') !== 'admin') {
            session()->put(['role' => 'user']);
        }
        return view('main', ['categories' => $categories]);
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
