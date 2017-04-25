<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Category;
use App\Activity;
use Auth;

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
        $category = Category::create($data);

        Activity::create([
            'user_id' => Auth::user()->id,
            'action' => 'thêm chuyên mục',
            'target_id' => $category->id
        ]);

        return response()->json(['status' => 200]);
    }

    public function postUpdateAjax(CategoryUpdateRequest $request)
    {
        $id = $request->id;
        if ($id) {
            $data = $request->only('name');
            $category = Category::find($id);
            $category->update($data);

            Activity::create([
                'user_id' => Auth::user()->id,
                'action' => 'sửa chuyên mục',
                'target_id' => $category->id
            ]);

            return response()->json(['status' => 200]);
        }
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $category = Category::find($id);
            $category->delete();

            Activity::create([
                'user_id' => Auth::user()->id,
                'action' => 'xóa chuyên mục',
                'target_id' => $category->id
            ]);

            return 'success';
        }
    }
}
