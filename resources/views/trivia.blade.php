@extends('layout')

@section('content')
<div>
    <h1>
        {{ $question }}
    </h1>
    <form method="post" action="/trivia/processAnswer/{{ $id }}">
        @csrf
        @foreach($answers as $answer)
        <button type="submit" value="{{ $answer->answer() }}" name="answer">
            {{ $answer->answer() }}
        </button>
        @endforeach
    </form>
</div>
@endsection