@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Sessions de coaching à venir</h1>

    <ul>
        @foreach ($sessions as $session)
            <li>
                <strong>{{ $session->title }}</strong> – {{ $session->start_time->format('d/m/Y H:i') }}
                <a href="{{ route('sessions.show', $session->id) }}">Voir</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
