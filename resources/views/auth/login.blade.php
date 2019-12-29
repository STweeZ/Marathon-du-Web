@extends('layouts.app')

@section('content')
    <div id="container_hr">
        <div id="container_scroll">
            <hr id="hrscroll">
            <span id="txt_scroll">scroll down</span>
        </div>
        <hr id="hr1">
        <hr id="hr2">
        <hr id="hr3">
        <hr id="hr4">
    </div>
    <div id="container_form">
            <div id="content_form">
                    <form method="POST" action="{{ route('login') }}" id="form_login">
                        @csrf




                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="EMAIL">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"placeholder="MOT DE PASSE">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button type="submit" class="btn_login">
                                    {{ __('Se connecter') }}
                                </button>
                                <span id="inscription">Pas encore de compte ? <a href="{{ url('/register') }}"> Inscrivez-vous</a></span>

                    </form>
            </div>
</div>
@endsection
