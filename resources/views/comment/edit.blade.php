@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('comment.update',$commentaire->id)}}" method="POST">
        {!! csrf_field() !!}
        @csrf
        @method('PUT')
        @if($commentaire->validated == 0)
            <div class="text-center" style="margin-top: 2rem">
                <h3>Validation d'un commentaire</h3>
                <hr class="mt-2 mb-2">
            </div>
            <div>
                <button class="btn btn-success" type="submit" href="{{URL::route('serie.index')}}">Valider le commentaire</button>
            </div>
        @else

        @endif
    </form>

@endsection