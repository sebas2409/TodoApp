@extends('app')
@section('content')
    <div class="container w-25 border p-4 mt-4">
        <form method="post" action="{{ route('todos') }}">
            @csrf
            @if(session('success'))
                <h6 class="alert alert-success">{{session('success')}}</h6>
            @endif
            @error('title')
                <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="title" class="form-label">Titulo de la tarea</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
        </form>
        <div>
            @foreach($todos as $todo)
                <div class="row py-1">
                    <div class="col-md-9 d-flex align-items-center">
                        <a href="{{ route('todos-edit',['id'=>$todo->id]) }}">{{ $todo->title }}</a>
                    </div>
                    <div class="col-md-3 d-flex justify-content-end">
                        <form action="{{ route('todos-destroy',[$todo->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
