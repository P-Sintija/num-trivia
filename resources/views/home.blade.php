@extends('layout')

@section('content')
<h1>
    Do you want to play a game?
</h1>
<form method="post" action="/trivia">
    @csrf
    <button type="submit">
        Yes
    </button>
    <button type="button" disabled>
        No
    </button>
</form>
@endsection