<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Category;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
}
