@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Lista de Contenidos</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.posts.create')}}" class="btn btn-secondary">Agregar post</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th>Categoria</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td>
                                <span class="btn {{($post->status==1)?'btn-warning':'btn-success'}} btn-sm">{{($post->status==1)?'Revisión':'publicado'}}</span>
                            </td>
                            <td>{{$post->user->name}}</td>
                            <td>{{$post->category->name}}</td>
                            <td width="10px">
                                <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer d-flex justify-content-end">
            {!! $posts->links('pagination::bootstrap-4') !!}
        </div>
    </div>
@stop
