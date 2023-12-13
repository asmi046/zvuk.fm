@extends('layouts.all')

@php
    $title = (empty($page->seo_title))?$page->title:$page->seo_title;
    $description = (empty($page->seo_description))?$page->title:$page->seo_description;;
@endphp

@section('title', $title)
@section('description', $description)

@section('main')
    <x-breadcrumbs :title="$title"></x-breadcrumbs>
    <h1>{{$page->title}}</h1>
    <x-page-banner :name=" basename($page->img)"></x-page-banner>
    {!! $page->description !!}
@endsection

