@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CRUD LiveWire</h1>
@stop

@section('content')
    {{-- <a class="btn btn-secondary float-right" href="{{route('admin.posts3.create')}}">Nuevo Post</a> --}}
    @livewire('admin.posts-index')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop