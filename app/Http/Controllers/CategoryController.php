<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('category.index', compact('categories'));
    }

    public function postAddAjax(CategoryRequest $request)
    {
        $data = $request->only('name');
        Category::create($data);

        return response()->json(['status' => 200]);
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $category = Category::find($id);
            $category->delete();

            return 'success';
        }
    }
}
