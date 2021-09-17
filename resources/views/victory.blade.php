@extends('layout')

@section('content')

@if (isset($correctAnsweredCount))
<div class="message-container">
    <span class="message">
        You Lost!
    </span>
    <i class="far fa-frown"></i>
</div>
<div class="correct-answers">
    <i class="fas fa-check"></i>
    <span>
        {{ $correctAnsweredCount }}
    </span>
</div>
<br>
<div>
    <span class="multipoint-answer">
        {{ $lastCorrectAnsver }}
    </span>
    <span class="question">
        {{ $lastQuestion }}
    </span>
</div>
@else
<div class="message-container">
    <span class="message">
        You won!
    </span>
    <i class="far fa-smile"></i>
</div>
@endif
<form method="get" action="/">
    @csrf
    <button id="play-again" type="submit">
        Play again
    </button>
</form>
@endsection