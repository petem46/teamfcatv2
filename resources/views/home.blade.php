@extends('layouts.vue')

@section('content')
@php
    $avatar = '' . Auth::user()->avatar . '';
@endphp

<app></app>

@endsection
