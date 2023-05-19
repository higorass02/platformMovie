@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Curso: {{ $course['name'] }}</h1>
    <h2>Videos</h2>
    <a href="{{ route('moviesForm', $course->id) }}"><button type="button" class="btn btn-primary">Novo Video</button></a>
@stop

@section('content')
    <div>
        <table class="table table-striped">
            <tr>
                <th>Episódio</th>
                <th>Nome</th>
                <th>Resumo</th>
                <th>Ultima Atualização</th>
                <th>Opções</th>
            </tr>
            @foreach ($course->movies as $movie)
            <tr>
                <td>{{ $movie->ordination }}</td>
                <td>{{ $movie->name }}</td>
                <td>{{ $movie->summary }}</td>
                <td>{{ $movie->updated_at }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-id="{{ $movie->id }}" data-id-course="{{ $movie->id_course }}" onclick="xama(this)" data-type="{{ route('moviesEditForm', [':idModules', ':id']) }}">Editar</button>
                    <button type="button" class="btn btn-primary" data-id="{{ $movie->id }}" data-id-course="{{ $movie->id_course }}" onclick="xama(this)" data-type="{{ route('moviesOpenAdmin', [':idModules', ':id']) }}">Acessar como Admin</button>
                    <button type="button" class="btn btn-primary" data-id="{{ $movie->id }}" data-id-course="{{ $movie->id_course }}" onclick="xama(this)" data-type="{{ route('moviesOpen', [':idModules', ':id']) }}">Acessar como Aluno</button>
                    <button type="button" class="btn btn-danger delete"  data-id="{{ $movie->id }}" data-id-course="{{ $movie->id_course }}" onclick="xama(this)" data-type="{{ route('moviesDelete', [':idModules', ':id']) }}">Desabilitar</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@stop

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function xama(element) {
            let id = $(element).data('id');
            let idCourse = $(element).data('id-course');
            let url = $(element).data('type');
            url = url.replace(':idModules', idCourse);
            url = url.replace(':id', id);
            let MyClass = $(element).className;

            if($(element).hasClass('delete')){
                $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'JSON',
                data:{
                    '_token': '{{ csrf_token() }}',
                },
                success: function (data) {
                     alert(data.message)
                     $(element).parent().parent().remove()
                },
                error: function (xhr) {
                    console.log(xhr.message);
                }
            })
            }else{
                window.location.href = url;                
            }
        }
    </script>
@stop