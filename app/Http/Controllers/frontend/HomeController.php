<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class HomeController extends Controller
{
    //
    public function index() {
        // Check if the user is authenticated
        if (Auth::check()) {
            // If authenticated, retrieve the user's email
            $email = Auth::user()->email;

            // You can also retrieve the user's name if available
            $name = Auth::user()->name;
        } else {
            // If not authenticated, set default values or handle accordingly
            $email = 'Guest'; // Set default email to 'Guest'
            $name = ''; // Set default name to empty string
        }

        // Pass the email and name variables to the view
        return view('frontend.home.index', compact('email', 'name'));
    }
}
