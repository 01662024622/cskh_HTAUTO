<?php

namespace App\Http\Controllers\HT50;

use App\Http\Controllers\Controller;
use App\Models\HT20\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function index()
    {
        return view('errors.404');
    }
    public function show($id)
    {
        if ($id=="") return view('errors.404');
        $user=User::where('code_bravo',$id)->first();
        if ($user){
            Auth::login($user);
            return view('survey.accumulate');
        }
        return view('errors.404');
    }
}
