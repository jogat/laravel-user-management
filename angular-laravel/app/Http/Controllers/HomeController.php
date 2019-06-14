<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Contact;

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
        $userId = Auth::id();
        // Get the contact linked with this user
        $me = Contact::where('user_id', $userId)->firstOrFail();
        $me['relationships'] = $me->relationships()->get();
        $me['meta'] = $me->meta()->where('user_modified',$userId)->get();
        
        return view('home')->with(compact('me'));
    }
}
