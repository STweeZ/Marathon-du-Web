@extends('layouts.app')

@section('content')



    <div class="container_user">
        <div class="nomdelapersonne">
            <span>{{$user->name}}</span>
        </div>

        <p>Ses commmentaires :

        @if($nbComments==0)
            Aucun.
        @else
            @foreach($comments as $comment)
                @if($comment->user_id==$user->id)
                    <ul>
                    <li>Date du commentaire : {{$comment->created_at}}</li>
                    <li>Note : {{$comment->note}}</li>
                    <li>Contenu : {{$comment->content}}</li>
                    </ul>
                    <br>
                @endif
            @endforeach
        @endif
                </p>
        <br>
        <p>Les séries que {{$user->name}} suit :
        @if($nbSeries==0)
            Aucune.
        @elsen
            @foreach($series as $serie)
                <br>
                <ul>
                    <img src="{{url($serie->urlImage)}}">
                    <li>{{$serie->id}}</li>
                </ul>
            @endforeach
        @endif
            </p>
        <br>
        <p>Durée totale de vision : {{$duree}}</p>
    </div>
@endsection
