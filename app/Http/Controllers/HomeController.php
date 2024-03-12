<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use App\Models\Region;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/appeal');
    }

    public function appealIndex()
    {
        $appeals = Appeal::latest()->paginate(15);

        return view('appeal.index', ['appeals' => $appeals]);
    }

    public function regionIndex()
    {
        $regions = Region::paginate(15);

        return view('region.index', ['regions' => $regions]);
    }
    public function regionCreate()
    {
        $regions = Region::where('parent_id', Region::PARENT)->get();

        return view('region.create', ['regions' => $regions]);
    }

    public function regionStore(Request $request)
    {
        $validated = $request->validate([
            'parent' => 'nullable|integer',
            'tuman' => 'required|string|max:60',
        ]);

        $region = new Region();

        $region->parent_id = $request->input('parent') ?? Region::PARENT;
        $region->region = $request->input('tuman');
        $region->save();

        return redirect('/region');
    }

    public function regionEdit(Region $region)
    {
        $regions = Region::where('parent_id', Region::PARENT)->get();

        return view('region.edit', ['region' => $region, 'regions' => $regions]);
    }

    public function regionUpdate(Request $request, Region $region)
    {
        $validated = $request->validate([
            'parent' => 'nullable|integer',
            'tuman' => 'required|string|max:60',
        ]);

        $region->parent_id = $request->input('parent') ?? Region::PARENT;
        $region->region = $request->input('tuman');
        $region->update();

        return redirect('/region');
    }
}
