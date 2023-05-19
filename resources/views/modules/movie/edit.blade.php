@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Atualizar Video</h1>
@stop

@section('content')
    <div>
        <form method="POST" action="{{ route('moviesEdit', [ $movie->id_course, $movie->id ]) }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Ordem</label>
                <input name="ordination" type="text" class="form-control" id="ordination" placeholder="nome do Curso" value="{{ $movie->ordination }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="nome do Curso" value="{{ $movie->name }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Resumo</label>
                <input name="summary" type="text" class="form-control" id="summary" placeholder="nome do Curso" value="{{ $movie->summary }}">
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Descrição</label>
                <textarea name="desc" id="desc" class="form-control" cols="30"  rows="10" placeholder="Descrição">{{ $movie->description }}</textarea>
            </div>
            <p>upload de imagem / link</p>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@stop