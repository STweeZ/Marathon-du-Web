<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Genre;
use App\Comment;

class MainController extends Controller
{
    public function index() {
        $series4View=Serie::orderBy('note','DESC')->limit(4)->get();
        $series4Here=Serie::orderBy('created_at','DESC')->limit(4)->get();
        $fiveComments=Comment::orderBy('created_at','DESC')->limit(5)->get();
        return view("index",['series4View'=>$series4View,'series4Here'=>$series4Here,'fiveComments'=>$fiveComments]);
    }
}
