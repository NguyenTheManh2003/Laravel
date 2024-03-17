<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Assuming your user model namespace is App\Models\User



class DashboardController extends Controller
{
    public function __construct()    
    {
        
    }

    public function index(){
        return view('backend.dashboard.index');
    }

}