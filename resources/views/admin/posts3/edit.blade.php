@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($post,['route'=>['admin.posts3.update',$post] ,'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
            {!! Form::hidden('user_id',auth()->user()->id) !!}
            <div class="form-group">
                {!! Form::label('name','Nombre') !!}
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del post']) !!}
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug','Slug') !!}
                {!! Form::text('slug',null,['class'=>'form-control','placeholder'=>'Ingrese el slug del post','readonly']) !!}
                @error('slug')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('category_id','Categoria') !!}
                {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
                @error('category_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Etiquetas</p>
                @foreach ($tags as $tag)
                    <label class="mr-2">
                        {!! Form::checkbox('tags[]',$tag->id,null) !!}
                        {{$tag->name}}
                    </label>
                @endforeach
                @error('tags')
                    <br>
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <p class="font-weight-bold">Estado</p>
                <label class="mr-2">
                    {!! Form::radio('status',1,true) !!}
                    Revisión
                </label>
                <label>
                    {!! Form::radio('status',2,false) !!}
                    Publicado
                </label>
                @error('status')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper">
                        @if ($post->image)
                            <img src="{{Storage::url($post->image->url)}}">
                        @else
                            <img id="picture" src="/storage/posts/default.jpg" alt="">
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('file','Imagen del post',['class'=>'form-label']) !!}
                        {!! Form::file('file', ['class'=>'form-control','accept'=>'image/*']) !!}
                    </div>
                </div>
                @error('file')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('extract','Extracto') !!}
                {!! Form::textarea('extract',null,['class'=>'form-control']) !!}
                @error('extract')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('body','Cuerpo del post') !!}
                {!! Form::textarea('body',null,['class'=>'form-control']) !!}
                @error('body')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>

            {!! Form::submit('Editar post',['class'=>'btn btn-primary']) !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
@stop

@section('js')
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
    </script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#extract' ) )
            .catch( error => {
                console.error( error );
        } );
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
        } );
    </script>
    <script>
        //Cambiar imagen
        document.getElementById("file").addEventListener('change',cambiarImagen);
        function cambiarImagen(event){
            var file=event.target.files[0];
            var reader=new FileReader();
            reader.onload=(event)=>{
                document.getElementById("picture").setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);

        }
    </script>
@stop
