<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $count = session('count', 0);

        $count++;

        session(['count' => $count]);

        if(!session()->has('first_visit')) {

            session([
                'first_visit' => now()
            ]);
        }

        session([
            'last_visit' => now()
        ]);

        return view('dashboard', [

            'count' => session('count'),

            'first' => session('first_visit'),

            'last' => session('last_visit')

        ]);
    }

    public function reset()
    {
        session()->forget([
            'count',
            'first_visit',
            'last_visit'
        ]);

        return redirect('/dashboard');
    }
}
