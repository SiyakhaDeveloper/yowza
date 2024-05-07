<?php

namespace App\Http\Controllers\SMME;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmmeDashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index()
    {
        return view('smme.index');
    }
}
