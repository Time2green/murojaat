<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppealRequest;
use App\Models\Appeal;
use App\Models\Helper;
use App\Models\Region;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use libphonenumber\Leniency\Valid;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        $regions = Region::where('parent_id', Region::PARENT)->get();
        return view('index', ['regions' => $regions]);
    }

    public function store(StoreAppealRequest $request)
    {
        $generate_code = Str::uuid()->toString();

        if ($request->file('files')){

            $path = $request->file('files')->store('public/uploaded');

        } else {
            $path = "";
        }

        $appeal = new Appeal();

        $appeal->fio = $request->input('fio');
        $appeal->hudud_id = $request->input('hudud');
        $appeal->tuman_id = $request->input('tuman');
        $appeal->manzil = $request->input('manzil');
        $appeal->email = $request->input('email');
        $appeal->tel = $request->input('tel');
        $appeal->tad = $request->input('tad');
        $appeal->tadname = $request->input('tadname') ?? null;
        $appeal->jins = $request->input('jins');
        $appeal->tugilgan = $request->input('tugilgan');
        $appeal->maqom = $request->input('maqom');
        $appeal->files = $path;
        $appeal->xizmat = $request->input('xizmat');
        $appeal->vitext = $request->input('vitext');
        $appeal->status = Appeal::STATUS_NEW;
        $appeal->generated_code = $generate_code;
        $appeal->save();

//        // File content
//        $content = "!!! DIQQAT !!!\n\nMUROJAATINGIZ HOLATINI QUYIDAGI ID va KALIT SO'ZLAR ORQALI TEKSHIRISHINGIZ MUMKIN\n\nID: ". $appeal->id."\nKalit so'z: ".$generate_code;
//
//        // File name
//        $fileName = $appeal->fio.'.txt';
//
//        // Storage path
//        $path = 'public/' . $fileName;
//
//        // Save the text content to a file in the storage directory
//        Storage::put($path, $content);
        Session::put('success', true);
        Session::put('id', $appeal->id);
        Session::put('kalit', $generate_code);
//        Session::put('download_link', storage_path("app/{$path}"));
//        Session::put('fileName', $fileName);
        // Return a download response
        return redirect('/');
    }
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function checkStatus(Request $request)
    {
        $validated = $request->validate([
            'checknum' => 'required|numeric',
            'checkpass' => 'required|string|max:60',
            'captcha_2' => 'required|captcha',
        ]);

        $id = $request->input('checknum');
        $code = $request->input('checkpass');
        $sts = Appeal::query()
            ->select('status')
            ->where('id', $id)
            ->where('generated_code', $code)
            ->value('status');

        return Appeal::status($sts);
    }

    public function getRegions(Request $request)
    {
        $validated = $request->validate([
            'hudud' => 'nullable|integer|between:0,15'
        ]);

        if ($request->input('hudud') == ""){
            return "";
        }

        $regions = Region::where('parent_id', $request->input('hudud'))->pluck('id', 'region');
        $response = "";
        foreach ($regions as $key => $region) {
            $response .=" <option value='".$region."'>".$key."</option>";
        }
        return $response;
    }

    public function download($id)
    {
        $path = Appeal::query()->where('id', $id)->get()->value('files');
        $file = basename($path);
        return \response()->download(storage_path("app/".$path), $file);
    }
}
