<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index($id)
    {
        $data = Game::find($id);

        $hasil = compact('data');
        return view('detail')->with($hasil);
    }

    public function dashboardDetail($id)
    {
        $data = Game::find($id);

        $hasil = compact('data');
        return view('dashboard.gamedetail')->with($hasil);
    }
}
