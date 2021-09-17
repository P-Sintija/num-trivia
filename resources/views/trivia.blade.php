@extends('layout')

@section('content')
<div>
    <span class="multipoint-answer">
        ...
    </span>
    <span class="question">
        {{ $question }}
    </span>
</div>
<form method="post" action="/trivia/processAnswer/{{ $id }}">
    @csrf
    @foreach($answers as $answer)
    <button type="submit" value="{{ $answer->answer() }}" name="answer">
        {{ $answer->answer() }}
    </button>
    @endforeach
</form>
@endsection