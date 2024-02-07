@extends('layout.app')

@section('app')
    <main>
        <h1>Scramble</h1>
        <p>{{ $scramble }}</p>
        <ul>
            @foreach($times as $time)
                <li>{{ $time->time }} ms - {{ $time->scramble }}</li>
            @endforeach
        </ul>
    </main>
@endsection
