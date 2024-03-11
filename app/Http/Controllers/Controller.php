<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('index');
    }

    public function store(\Illuminate\Http\Request $request)
    {
        dd($request);
        $appeal = new Appeal();

        $appeal->parent_id = $request->input('parent') ?? Region::PARENT;
        $appeal->region = $request->input('tuman');
        $appeal->save();

        return redirect('/index');
        return view();
    }
}
