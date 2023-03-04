<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $teams = Team::where('serie', 'A')
            ->orderBy('points', 'DESC')
            ->orderBy('goal_difference', 'DESC')
            ->orderBy('short_name', 'ASC')
            ->get();

        return view('home', compact('teams'));
    }
}
