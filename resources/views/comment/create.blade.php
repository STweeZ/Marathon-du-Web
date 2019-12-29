@extends('layouts.app')

@section('content')

    <h3>Ajouter un commentaire à la série {{$serie->nom}}</h3>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('comment.store')}}" method="POST">
        <input type="hidden" name="idSerie" value="{{$serie->id}}">
        <div class="text-center" style="margin-top: 2rem">
            <h3>Création d'un commentaire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div>
            <label for="content"><strong>Contenu :</strong></label>
            <input type="text" id="content" name="contenu"
                   value="{{ old('content') }}">
        </div>
        <div>
            <label for="note"><strong>Note :</strong></label>
            <input type="float" id="note" name="note"
                   value="{{ old('note') }}">
        </div>
        <div>
            <button class="btn btn-success" type="submit">Valide</button>
        </div>
    </form>

@endsection