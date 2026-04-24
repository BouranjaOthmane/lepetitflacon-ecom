@extends('admin.layout.master')

@section('title', 'Gestion des commandes — Lepetitflacon')

@section('page_title', 'Commandes')
@section('page_subtitle', 'Suivi et gestion des commandes clients')

@section('content')
    @include('admin.sections.orders', ['isActive' => true])
@endsection