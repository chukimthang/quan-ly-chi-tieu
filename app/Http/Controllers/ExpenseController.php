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
        $category_all = Category::all();
        $users = User::pluck('name', 'id');
        $userAdmin = User::getAdmin();

        return view('expense.index', compact('expenses', 'categories', 
            'users', 'category_all', 'userAdmin'));
    }

    public function postAddAjax(ExpenseRequest $request)
    {
        $data = $request->only('name', 'price', 'category_id', 
            'user_id', 'description');
        $expense = Expense::create($data);
        $expenses = Expense::orderBy('id', 'desc')->get();

        $user = User::getAdmin();
        $user->total_money -= $expense->price;
        $user->update([
            'total_money' => $user->total_money
        ]);
        $userAdmin = User::getAdmin();

        return view('expense.list', compact('expenses', 'userAdmin'));
    }

    public function postUpdateAjax(ExpenseRequest $request)
    {
        $id = $request->id;
        if ($id) {
            $data = $request->only('name', 'price', 'category_id', 
                'user_id', 'description');
            $expense = Expense::find($id);
            $oldPrice = $expense->price;
            $expense->update($data);
            $expenses = Expense::orderBy('id', 'desc')->get();
            
            $user = User::getAdmin();
            $user->total_money = $user->total_money + $oldPrice - $expense->price;
            $user->update([
                'total_money' => $user->total_money
            ]);
            $userAdmin = User::getAdmin();

            return view('expense.list', compact('expenses', 'userAdmin'));
        }
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $expense = Expense::find($id);
            $expense->delete();
            $expenses = Expense::orderBy('id', 'desc')->get();

            $user = User::getAdmin();
            $user->total_money += $expense->price;
            $user->update([
                'total_money' => $user->total_money
            ]);
            $userAdmin = User::getAdmin();
            
            return view('expense.list', compact('expenses', 'userAdmin'));
        }
    }

    public function postFilterCategory(Request $request)
    {
        $categoryId = $request->categoryId;

        $expenses = Expense::filterByCategory($categoryId)->get();
        $userAdmin = User::getAdmin();

        return view('expense.list', compact('expenses', 'userAdmin'));
    }

    public function postFilterCategoryDate(Request $request)
    {
        $categoryId = $request->categoryId;
        $start = $request->start;
        $finish = $request->finish;
        $expenses = Expense::filterCategoryDate($categoryId, $start, $finish)
            ->get();
        $userAdmin = User::getAdmin();

        return view('expense.list', compact('expenses', 'userAdmin'));
    }
}
