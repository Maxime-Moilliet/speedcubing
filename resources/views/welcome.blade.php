@extends('layout.app')

@section('app')
    <main>
        <h1>Scramble</h1>
        <p>{{ $scramble }}</p>
        <form action="{{ route('times.store') }}" method="post">
            @csrf
            <div>
                <input type="string" name="time">
                <input type="hidden" name="scramble" value="{{ $scramble }}">
                <button type="submit">Envoyer</button>
            </div>
        </form>
        <ul>
            @foreach ($times as $time)
                <li>{{ $time->time }} ms - {{ $time->scramble }}</li>
            @endforeach
        </ul>
    </main>
@endsection
