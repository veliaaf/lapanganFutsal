<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Gate::allows('thisAdmin')) {
            return redirect()->route('log-viewer::dashboard');
        }elseif (Gate::allows('thisOwner')) {
            Log::info("User ".Auth::user()->Owner->first_name." ".Auth::user()->Owner->last_name." Berhasil melakukan login ke aplikasi");
            return view ('backend.owner.dashboard');
        }elseif (Gate::allows('thisCustomer')) {
            Log::info("User ".Auth::user()->Customer->first_name." ".Auth::user()->Customer->last_name." Berhasil melakukan login ke aplikasi");
            return redirect()->route('landing.index');
        }
    }
}
