<?php
namespace App\Http\Controllers;
use App\Serie;
use App\Comment;
use App\Genre;
use App\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{

    public function index(){
        $episodes=Episode::all();
        return view('episode.index',['episodes'=>$episodes]);
    }


    public function show(Request $request,$id){
        $action = $request->query('action', 'show');
        $episodes=Episode::find($id);

        $seen=$episodes->seen;

        return view('episode.show',['episodes'=>$episodes,'seen'=>$seen,'action'=>$action]);
    }
}
