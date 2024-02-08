@extends('layout.app')

@section('app')
    <main>
        <ul>
            @foreach($sessions as $s)
                <li><a href="{{ route('welcome', $s->name) }}">{{ $s->name }}</a></li>
            @endforeach
        </ul>
        <h1>Session : {{ $session->name }}</h1>
        <h2>Scramble</h2>
        <p>{{ $scramble }}</p>
        <form action="{{ route('time.store', $session) }}" method="post">
            @csrf
            <div>
                <input type="number" step="0.01" name="time">
                <input type="hidden" name="scramble" value="{{ $scramble }}">
                <input type="checkbox" name="is_incomplete" id="is_incomplete">
                <label for="is_incomplete">+ 2</label>
                <input type="checkbox" name="is_dnf" id="is_dnf">
                <label for="is_dnf">DNF</label>
                <button type="submit">Envoyer</button>
            </div>
        </form>
        <ul>
            @foreach ($session->times as $time)
                <li>{{ $time->time }} s - {{ $time->scramble }}</li>
            @endforeach
        </ul>
    </main>
@endsection
