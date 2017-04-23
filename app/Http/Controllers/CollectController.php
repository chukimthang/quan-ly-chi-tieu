<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CollectRequest;
use App\Collect;

class CollectController extends Controller
{
    public function index()
    {
        $collects = Collect::orderBy('created_at', 'desc')->get();

        return view('collect.index', compact('collects'));
    }

    public function postAddAjax(CollectRequest $request)
    {
        $data = $request->only('price');
        Collect::create($data);
        $collects = Collect::orderBy('created_at', 'desc')->get();

        return view('collect.list', compact('collects'));
    }

    public function postDeleteAjax(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $collect = Collect::find($id);
            $collect->delete();
            $collects = Collect::orderBy('created_at', 'desc')->get();

            return view('collect.list', compact('collects'));
        }
    }

    public function postFilterDate(Request $request)
    {
        $start = $request->start;
        $finish = $request->finish;
        $collects = Collect::filterDate($start, $finish)->get();

        return view('collect.list', compact('collects'));
    }
}
