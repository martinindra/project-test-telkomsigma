<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\ViewDataPerDate;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class DashboardController extends Controller
{
    // dashboard show
    function showDashboard()
    {
        // select count(platform), platform from games group by platform;
        $dataPlatform = Game::select('platform', Game::raw('count(*) as total'))
            ->groupBy('platform')->get();
        $namaPlatform = $dataPlatform->pluck('platform')->toArray();
        $jumlahPlatform = $dataPlatform->pluck('total')->toArray();

        // data for column chart
        $columnChart = ViewDataPerDate::get();
        $columnChartName = $columnChart->pluck('Date')->toArray();
        $columnChartJumlah = $columnChart->pluck('jumlah')->toArray();

        // Latest 5 Game Released
        $dataGame = Game::orderBy('release_date', 'DESC')->take(5)->get();

        // return view
        return view('dashboard.home', compact('dataGame', 'dataPlatform', 'namaPlatform', 'jumlahPlatform', 'columnChartName', 'columnChartJumlah'));
    }

    // CRUD
    // Read All Data Game
    function showGameList()
    {
        $dataGame = Game::query()
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('dashboard.gamelist', compact('dataGame'));
    }

    // show add form
    function showAddGame()
    {
        return view('dashboard.gameform');
    }
    // add form process
    function submitAddGame(Request $request)
    {
        $game = new Game();
        $game->title = $request->title;
        $game->thumbnail = $request->thumbnail;
        $game->short_description = $request->desc;
        $game->game_url = $request->url;
        $game->genre = $request->genre;
        $game->platform = $request->platform;
        $game->publisher = $request->publisher;
        $game->developer = $request->developer;
        $game->release_date = $request->releasedate;
        $game->profile_url = $request->profile;
        $game->save();
        return redirect()->route('dashboard.gamelist')->with('msg', 'Game Added');
    }

    // show edit form
    function showEditGame($id)
    {
        $dataGame = Game::find($id);
        // format date for input date value
        $d = new DateTime($dataGame->release_date);
        $formatted_date = $d->format('Y-m-d');
        return view('dashboard.gameedit', compact('dataGame', 'formatted_date'));
    }
    // update form process
    function submitEditGame(Request $request, $id)
    {
        $game = Game::find($id);
        $game->title = $request->title;
        $game->thumbnail = $request->thumbnail;
        $game->short_description = $request->desc;
        $game->game_url = $request->url;
        $game->genre = $request->genre;
        $game->platform = $request->platform;
        $game->publisher = $request->publisher;
        $game->developer = $request->developer;
        $game->release_date = $request->releasedate;
        $game->profile_url = $request->profile;
        $game->save();
        return redirect()->route('dashboard.gamelist')->with('msg', 'Game Updated');
    }

    // delete data
    function destroy($id)
    {
        $game = Game::find($id);
        if ($game) {
            if ($game->delete()) {
                return redirect()->route('dashboard.gamelist')->with('msg', 'Game Deleted');;
            } else {

                return redirect()->route('dashboard.gamelist')->with('msg', 'Something Wrong');;
            }
        } else {

            return redirect()->route('dashboard.gamelist')->with('msg', 'Game Not Exist');
        }
    }
}
