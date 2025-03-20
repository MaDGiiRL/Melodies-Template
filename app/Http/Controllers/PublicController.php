<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index']),
            'verified'
        ];
    }

    public function index()
    {
        return view('index');
    }
}
