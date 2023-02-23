<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Telegram;

class MainController extends Controller
{
    public function index(Request $request)
    {
        return view('main');
    }
}
