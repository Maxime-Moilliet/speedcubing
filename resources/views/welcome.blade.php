@extends('layout.app')

@section('app')
    <main>
        <h1>Scramble</h1>
        <p>{{ $scramble }}</p>
        <form action="{{ route('time.store') }}" method="post">
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
            @foreach ($times as $time)
                <li>{{ $time->time }} ms - {{ $time->scramble }}</li>
            @endforeach
        </ul>
    </main>
@endsection
