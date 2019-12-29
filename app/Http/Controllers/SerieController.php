<?php

namespace App\Http\Controllers;


use App\Serie;
use App\Comment;
use App\Genre;
use App\Episode;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SerieController extends Controller{


    public function index(Request $request){
        $requete=$request->query('gre','All');
        if($requete!='All'){
            $series=Serie::where('genres.nom',$requete)->rightJoin('genre_serie','serie_id','=','genre_serie.serie_id')->get();
        }
        else{
            $series=Serie::all();
        }
        $genres=Genre::distinct('nom')->pluck('nom');

        return view('serie.index',['series'=>$series,'requete'=>$requete,'genres'=>$genres]);

    }

    public function show(Request $request,$id){
        $action = $request->query('action', 'show');
        $serie=Serie::find($id);
        $genres=$serie->genres;
        $commentaires=$serie->comments;
        $commentaires=$commentaires->sortBy('created_at');
        $episodes=$serie->episodes;
        $saisons=Episode::select('saison')->where('serie_id',$id)->groupBy('saison')->get();

        $isAdmin=false;
        $utilisateur = Auth::user();
        $name=null;
        if($utilisateur!=null) {
            $u=$utilisateur->id;
            $uId=User::find($u);
            if($uId->administrateur==true){
                $isAdmin=true;
            }
            $name=User::select('name')->where('id','=',$u)->get();
        }

        return view('serie.show',['serie'=>$serie,'action'=>$action,'episodes'=>$episodes,'commentaires'=>$commentaires,'genres'=>$genres,'saisons'=>$saisons,'isAdmin'=>$isAdmin,'utilisateur'=>$utilisateur,'name'=>$name]);
    }
}