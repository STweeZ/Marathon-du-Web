<?php


namespace App\Http\Controllers;


use App\Serie;
use App\Comment;
use App\Genre;
use App\Episode;
use App\User;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController
{
    public function index()
    {
        $u = Auth::user();
        if($u!=null){
            $user=User::find($u->id);
            $comments=Comment::all();
            $seriesId=DB::table('seen')->join('episodes', 'episode_id', '=', 'episodes.id')->join('series', 'series.id', '=', 'serie_id')->where('user_id', Auth::id())->select('series.id')->get();
            $time=DB::table('seen')->join('episodes', 'episode_id', '=', 'episodes.id')->where('user_id', Auth::id())->select('episodes.id')->get();
            if($seriesId!=null){
                $series=Serie::find($seriesId);
                $nbSeries=$series->count('id');
                $duree=Episode::find($time)->sum('duree');
            }
            else $series=null;
            $nbComments=0;
            foreach($comments as $comment){
                if($comment->user_id==$user->id){
                    $nbComments++;
                }
            }
            return view('user.index',['user'=>$user,'comments'=>$comments,'series'=>$series,'nbSeries'=>$nbSeries,'duree'=>$duree,'nbComments'=>$nbComments]);
        }
        return redirect('/');
    }

    public function deconnexion()
    {
        auth()->logout();

        return redirect('/');
    }

}