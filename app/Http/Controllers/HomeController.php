<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $name = User::orderBy('id', 'DESC')->Paginate(7);
        return view('new')->with('name', $name);
        
    }
}
