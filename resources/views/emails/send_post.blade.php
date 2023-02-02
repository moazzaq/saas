@extends('layouts.emails')
@section('content')

    <h3>Dear: {{ $post->user->name }}</h3>

    @if($body != '')
        <p>{!! $body !!}</p>
    @endif

@endsection
