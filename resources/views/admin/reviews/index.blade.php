@extends('admin.layout.master')

@section('title', 'Gestion des avis — Lepetitflacon')

@section('page_title', 'Avis')
@section('page_subtitle', 'Gestion des avis et retours clients')

@section('content')
    @include('admin.sections.reviews', ['isActive' => true])
@endsection