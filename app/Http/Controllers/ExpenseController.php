<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExpenseRequest;
use App\Expense;
use App\Category;
use App\User;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::orderBy('id', 'desc')->get();
        $categories = Category::pluck('name', 'id');
        $users = User::pluck('name', 'id');

        return view('expense.index', compact('expenses', 'categories', 
            'users'));
    }

    public function postAddAjax(ExpenseRequest $request)
    {
        $data = $request->only('name', 'price', 'category_id', 
            'user_id', 'description');
        Expense::create($data);
        $expenses = Expense::orderBy('id', 'desc')->get();

        return view('expense.list', compact('expenses'));
    }

    public function postUpdateAjax(ExpenseRequest $request)
    {
        $id = $request->id;
        if ($id) {
            $data = $request->only('name', 'price', 'category_id', 
                'user_id', 'description');
            $expense = Expense::find($id);
            $expense->update($data);
            $expenses = Expense::orderBy('id', 'desc')->get();

            return view('expense.list', compact('expenses'));
        }
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $expense = Expense::find($id);
            $expense->delete();
            $expenses = Expense::orderBy('id', 'desc')->get();
            
            return view('expense.list', compact('expenses'));
        }
    }
}
