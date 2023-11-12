@extends('layouts.all')

@php
    $title = "On-line заказ";
    $description = "On-line заказ";
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$title}}</h1>
    <zakaz-form></zakaz-form>
@endsection

