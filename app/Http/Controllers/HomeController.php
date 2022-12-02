<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emailtemplate;
use Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['temp'] = Emailtemplate::orderBy('id','desc')->paginate(10);
        return view('home',$data);
    }
}
