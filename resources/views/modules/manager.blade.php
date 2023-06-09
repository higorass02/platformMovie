@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Cursos</h1>
    <a href="{{ url('courseForm') }}"><button type="button" class="btn btn-primary">Novo Curso</button></a>
@stop

@section('content')
    <div>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Dt Criação</th>
                <th>Opções</th>
            </tr>
            @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->created_at->format('d/m/Y') }}</td>
                <td>
                    <button
                        class="btn btn-warning"
                        onclick="xama(this)"
                        data-type="{{ route('courseEdit', ':id') }}"
                        data-id="{{ $course->id }}">Editar</button>
                    <button
                        class="btn btn-primary"
                        onclick="xama(this)"
                        data-type="{{ route('movies', ':id') }}"
                        data-id="{{ $course->id }}">Abrir Lista Videos</button>
                    <button
                        class="btn btn-info"
                        onclick="xama(this)"
                        data-type="{{ route('subscribeByCourse', ':id') }}"
                        data-id="{{ $course->id }}">Exibir Estudantes</button>
                    <button
                        class="btn btn-danger delete" 
                        data-type="{{ route('courseDelete', ':id') }}"
                        onclick="xama(this)"
                        data-id="{{ $course->id }}" >Desabilitar</button>
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
            let id = element.getAttribute('data-id');
            let url = element.getAttribute('data-type');
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