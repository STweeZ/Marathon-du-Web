@extends('layouts.app')
@section('content')
<div class="content_series">
    <div class="container_content_series">

            @if(!empty($series))
                <div class="container_form">
                <form action="{{route('serie.index')}}" method="get" id="form_series">
                    <label for="requete"></label>
                    <select name="requete" id="selection">
                        <option value="choisir un filtre">Filtres</option>
                                @if($requete == "All")selected @endif></option>
                        @foreach($genres as $genre)
                            <option value="{{$genre}}" @if($requete==$genre)selected @endif>{{$genre}}</option>
                            @endforeach
                    </select>
                    <input type="submit" class="btn_selection" value="Appliquer">


                </form>
                </div>


                <div class="liste_series">
                    @foreach($series as $serie)
                        <div class="carte_serie">
                            <a href="{{route('serie.show',$serie->id)}}" class="lien_serie_liste"><div class="serie_division_hover"><span>Plus...</span></div><img src="{{url($serie->urlImage)}}"></a>
                            <p>{{$serie->nom}}</p>
                        </div>
                    @endforeach
                </div>

            @else

                <h3>aucun jeux</h3>
            @endif

    </div>
</div>



@endsection


