<?php

namespace App\Http\Controllers;

use App\Certificate;

use Illuminate\Http\Request;

use App\http\Requests;

use Redirect;

use Log;

use Input;

use Illuminate\Support\Facades\DB;

class CertificateController extends Controller
{
    public function index()
    {
        $downloads = DB::table('certificate')->get();
        return view('certificate', ['certificate' => Certificate::all()], compact('downloads'));
    }


}

