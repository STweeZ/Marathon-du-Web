@extends('layouts.app')

@section('content')





        <title>Choix série</title>
        <link rel="stylesheet" href="/style/style.css">
    </head>
    <body>

    <div class="container serie_show">
        <div class="serie_top_infos">
            <img src="http://172.31.146.100/~dut19_groupe16{{$serie->urlImage}}" class="serie_img_affiche">


            <div class="serie_infos_name">
                <div class="serie_top_genre">
                    <div class="carre_rose_genre"></div>
                    <p class="noms_genre">Genres:</p>

                    @foreach($genres as $genre)
                        <p>{{$genre->nom}}</p>
                    @endforeach
                </div>
                <div class="serie_top_infos_name">
                    <div class="carre_rose"></div>
                    <span class="serie_nom_serie">{{$serie->nom}}</span>
                    <div class="serie_checkbox">
                        <span>Vu</span>

                        <label class="serie_btn_vue" for="checkbox_seen" aria-describedby="label"></label>
                        <input type="checkbox" id="checkbox_seen">

                    </div>


                </div>
                @if(!empty($serie->urlAvis))
    <div class="playerYoutube">
        <iframe class="youtube" width="1280" height="720" src="{{$serie->urlAvis}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

    </div>
                    @endif

</div>

</div>


<div class="serie_mid_infos">
<div class="serie_mid_infos_synopsis">
    <div class="serie_mid_infos_name">
        <div class="carre_rose_mid"></div>
        <span class="serie_synopsis_titre">Synopsis</span>
    </div>

    <div class="serie_mid_notes">
        <p class="note"><span>Note de la communauté: </span>{{$serie->note}}</p> <!-- ICI IL FAUT METTRE LA VARIABLE DE LA MOYENNE DES NOTES DES COMMENTAIRES-->
        <p class="note"><span>Note de la rédaction: </span>{{$serie->note}}</p> <!-- ICI IL FAUT METTRE LA VARIABLE DE LA MOYENNE DES NOTES DES COMMENTAIRES-->
    </div>

    <span class="serie_synopsis_text">{!!$serie->resume!!}</span>
</div>



@if(!empty($serie->avis))

    <div class="serie_mid_infos_avis">
        <div class="serie_mid_infos_name">
            <div class="carre_rose_mid"></div>
            <span class="serie_synopsis_titre">Avis de la rédaction</span>
        </div>



        <span class="serie_synopsis_text">{{$serie->avis}}</span>
    </div>

@endif



</div> <!-- FIN MID INFO-->

        <div class="saisonall">
            @foreach($saisons as $saison)
                <div class="btn_saison">Saison {{$saison->saison}}</div>
                <div class="saison_item">
                @foreach($episodes as $episode)
                    @if($saison->saison==$episode->saison)
                        @if(($episode->urlImage)==null)
                            <div class="episode">
                                <a class="lien_epi" href="{{route('episode.show',$episode->id)}}">{{$episode->nom}}</a>
                            </div>

                        @else
                            <div class="episode">

                                <a href="{{route('episode.show',$episode->id)}}"><img src="{{url($episode->urlImage)}}"></a>
                                <p>Episode {{$episode->numero}}: {{$episode->nom}}</p>
                            </div>

                        @endif
                    @endif

                @endforeach
                </div>
            @endforeach

        </div>

<!-- Il faut mettre le choix des saisons..... -->
<hr class="serie_info">
<div class="serie_mid_infos_name">
<div class="carre_rose_mid"></div>
<span class="serie_synopsis_titre">Commentaires</span>
</div>
<div class="serie_form_commentaire">
    <form action="{{route('comment.store',$serie->id)}}" method="GET">
        <input type="hidden" name="idSerie" value="{{$serie->id}}">
<textarea class="textarea_serie_commentaire" placeholder="Votre commentaire sur {{$serie->nom}}" name="contenu"></textarea>
<div class="bottom_form_comment">
    <div><label for="note_serie">Ajouter une note</label>
     <input type="text" id="note_serie" name="note">
    </div>
    <div>
        <input class="btn_envoi_form_commentaire" type="submit">
    </div>
</div>
    </form>

</div>




@if(!$isAdmin)
<div>
@foreach($commentaires as $commentaire)
    @if(($commentaire->validated)==true)
        <p id="comment"><strong>Commentaires: </strong></p>
        <p>Utilisateur: {{$commentaire->user_id}}</p>
        <p>{{$commentaire->content}}</p>
            <p>Note : {{$commentaire->note}}</p>
            <p id="datecom">Date de mise en ligne : {{$commentaire->created_at}}</p>
    @endif
@endforeach
</div>
@else
<div>
@foreach($commentaires as $commentaire)
    <p><strong>Commentaires: </strong></p>
    <p>Utilisateur: {{$commentaire->user_id}}</p>
    <p>{{$commentaire->content}}</p>
        <p>Note : {{$commentaire->note}}</p>
        <p>Date de mise en ligne : {{$commentaire->created_at}}</p>
        <div style="text-align:center;">
            <div>
                <a class="btn btn-success" type="submit" href="{{url("comment/destroy/$commentaire->id")}}">Supprimer le commentaire</a>
            </div>
            @if($commentaire->validated==0)
                <div>
                    <a class="btn btn-success" type="submit" href="{{url("comment/update/$commentaire->id/1")}}">Valider le commentaire</a>
                </div>
            @else
                <div>
                    <a class="btn btn-success" type="submit" href="{{url("comment/update/$commentaire->id/0")}}">Dévalider le commentaire</a>
                </div>
            @endif
        </div>
@endforeach
</div>
@endif







</div>




@endsection
