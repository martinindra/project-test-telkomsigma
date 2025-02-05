<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\DB;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{

    public function index(): View
    {
        $platforms = Game::select('platform')
            ->groupBy('platform')
            ->get();
        $datas = Game::orderBy('updated_at', 'desc')->paginate(15);
        $platform = compact('platforms');
        $data = compact('datas');

        return view('home')->with($data)->with($platform);
    }

    public function getDataWithPlatform($case)
    {
        switch ($case) {
            case '1':
                $platforms = Game::select('platform')
                    ->groupBy('platform')
                    ->get();
                $datas = Game::where('platform', 'PC (Windows)')->orderBy('updated_at', 'desc')->paginate(15);
                $platform = compact('platforms');
                $data = compact('datas');
                return view('home')->with($data)->with($platform);
                break;
            case '2':
                $platforms = Game::select('platform')
                    ->groupBy('platform')
                    ->get();
                $datas = Game::where('platform', 'PC (windows), Web Browser')->orderBy('updated_at', 'desc')->paginate(15);
                $platform = compact('platforms');
                $data = compact('datas');
                return view('home')->with($data)->with($platform);
                break;
            case '3':
                $platforms = Game::select('platform')
                    ->groupBy('platform')
                    ->get();
                $datas = Game::where('platform', 'Web Browser')->orderBy('updated_at', 'desc')->paginate(15);
                $platform = compact('platforms');
                $data = compact('datas');
                return view('home')->with($data)->with($platform);
                break;
            default:
                return redirect()->route('home');
                break;
        }
    }

    function searchFilterData(Request $request)
    {
        $searchValue = $request->input('searchGame');
        $platforms = Game::select('platform')
            ->groupBy('platform')
            ->get();
        $datas = Game::where('title', 'LIKE', "%$searchValue%")->orderBy('updated_at', 'desc')->paginate(15);
        // var_dump($searchValue);
        return view('home', compact('platforms', 'datas'));
    }
}
