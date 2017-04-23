<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CollectRequest;
use App\Collect;
use App\User;

class CollectController extends Controller
{
    public function index()
    {
        $collects = Collect::orderBy('created_at', 'desc')->get();
        $userAdmin = User::getAdmin();

        return view('collect.index', compact('collects', 'userAdmin'));
    }

    public function postAddAjax(CollectRequest $request)
    {
        $data = $request->only('price');
        $collect = Collect::create($data);
        $collects = Collect::orderBy('created_at', 'desc')->get();

        $user = User::getAdmin();
        $user->total_money += $collect->price;
        $user->update([
            'total_money' => $user->total_money
        ]);
        $userAdmin = User::getAdmin();

        return view('collect.list', compact('collects', 'userAdmin'));
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $collect = Collect::find($id);
            $collect->delete();
            $collects = Collect::orderBy('created_at', 'desc')->get();
            
            $user = User::getAdmin();
            $user->total_money -= $collect->price;
            $user->update([
                'total_money' => $user->total_money
            ]);
            $userAdmin = User::getAdmin();

            return view('collect.list', compact('collects', 'userAdmin'));
        }
    }

    public function postFilterDate(Request $request)
    {
        $start = $request->start;
        $finish = $request->finish;
        $collects = Collect::filterDate($start, $finish)->get();
        $userAdmin = User::getAdmin();

        return view('collect.list', compact('collects', 'userAdmin'));
    }
}
