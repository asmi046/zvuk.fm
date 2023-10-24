@extends('layouts.all')

@php
    $title = "zvuk.fm";
    $description = "zvuk.fm";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')

    <div class="main_bnr">
        <img src="{{asset('../img/main_bnr.webp')}}" alt="">
    </div>

@endsection

