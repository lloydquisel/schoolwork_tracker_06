<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Schoolwork;

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
        $currentDate = date('m/d/Y');

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $schoolworks = Schoolwork::where(['status' => '0', 'user_id' => $user_id])->orderBy('deadline')->get();
        $deadlines = Schoolwork::where([
            ['status','=', '0'], 
            ['user_id', '=', $user_id], 
            ['deadline', '<', $currentDate],
            ['status', '=', '0']
        ])->orderBy('deadline')->get();
        
        return view('home', [
            'schoolworks' => $schoolworks,
            'deadlines' => $deadlines
        ]);
    }
}
