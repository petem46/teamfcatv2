@extends('layouts.vue')

@section('content')
    @php
    $avatar = '' . Auth::user()->avatar . '';
    if (session('url.intended')) {
        $intended = session('url.intended');
    }
    @endphp

    <app></app>

@endsection
