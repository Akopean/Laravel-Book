<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandlerController extends Controller
{
    public function errorCode404()
    {
        return view('theme::errors.404');
    }

    public function errorCode405()
    {
        return view('theme::errors.405');
    }
}