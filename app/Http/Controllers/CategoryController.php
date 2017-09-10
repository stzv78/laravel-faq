<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('templates.category.list', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //есть ли такая категория в БД
        if (Category::where('name', $request->name)->first()) {
            $data = [
                'class' => 'danger',
                'message' => 'Такая категория уже существует!',
                'text' => 'Ok',
                'route' => '/category'
            ];
        } else {
            //пишем категорию в БД
            Category::create($request->all());
            $data = [
                'class' => 'success',
                'message' => 'Новая категория успешно создана!',
                'text' => 'Ok',
                'route' => '/category'
            ];
        }
        // Отдаем страницу с сообщением
        return view('templates.message', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('templates.category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        $data = [
            'class' => 'success',
            'message' => 'Категория успешно изменена!',
            'text' => 'Ok',
            'route' => '/category'
        ];
        return view('templates.message', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        $data = [
            'class' => 'success',
            'message' => 'Категория успешно удалена!',
            'text' => 'Ok',
            'route' => '/category'
        ];
        return view('templates.message', $data);
    }
}
