@extends('layout')

@section('content')
<div>
@if (isset($correctAnsweredCount))
    <p>Correctly answered questions: </p>
    <span>{{ $correctAnsweredCount }}</span>
    <br>
    <p>Last question: </p>
    <p>{{ $lastQuestion->question }}</p>
    <p>{{ $lastQuestion->answer }}</p>
@else
    <h1>You won!</h1>
@endif
</div>
@endsection