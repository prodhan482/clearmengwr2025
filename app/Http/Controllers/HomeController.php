<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;

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
    // public function index()
    // {
    //     return view('web.home');
    // }
    public function index()
    {
        $participants = Participant::whereNotNull('drive_video_file_id')
            ->latest()
            ->take(8)
            ->get();

        return view('web.home', compact('participants'));
    }

    public function participantsList()
    {
        return view('web.participants.dashboard');
    }

    public function dashboard()
    {
        return view('common_views.dashboard');
    }
}
