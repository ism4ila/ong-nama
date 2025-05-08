<?php

namespace App\Http\Controllers; // Gardez ce namespace

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller // <<< Changez ici
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
        $users = User::count();

        $widget = [
            'users' => $users,
            //...
        ];

        // La vue 'home' est le tableau de bord des utilisateurs connectés
        return view('home', compact('widget'));
    }
}