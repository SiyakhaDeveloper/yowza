<?php

namespace App\Http\Controllers\SMME;

use App\Http\Controllers\Controller;
use App\Models\Organization;
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
        $user = auth()->user();

        // Retrieve up to 3 workspaces where the user is the owner or has joined
        $workspaces = $user->organizations()->take(3)->get();

        return view('smme.index', compact('workspaces'));
    }

    
}
