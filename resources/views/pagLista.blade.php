@extends('pagPlantilla')

@section('titulo')
    <h1 class="display-4">PAGINA DE LISTA </h1>
@endsection

@section('seccion')
    @if(session('msj'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('msj')}}
        </div>
    @endif

    <form action="{{ route('Estudiante.xRegistrar')}}" method="post" class="d-grid gap-2">
        @csrf

        @error('codEst')
            <div class="alert alert-danger">
                Codigo Requerido
            </div>
        @enderror

        @error('nomEst')
            <div class="alert alert-danger">
                Nombre Requerido
            </div>
        @enderror

        @error('apeEst')
            <div class="alert alert-danger">
                Apellido Requerido
            </div>
        @enderror

        @error('fnaEst')
            <div class="alert alert-danger">
                Fecha de nacimiento requerido
            </div>
        @enderror
        @error('turnMat')
            <div class="alert alert-danger">
                Turno Requerido
            </div>
        @enderror
        @error('semMat')
            <div class="alert alert-danger">
                Semestre requerido
            </div>
        @enderror
        @error('estMat')
            <div class="alert alert-danger">
                estado requerido
            </div>
        @enderror

        <input type="text" name="codEst" placeholder="Código" value="{{ old('codEst')}}" class="form-control mb-2">
        <input type="text" name="nomEst" placeholder="Nombres" value="{{ old('nomEst')}}" class="form-control mb-2">
        <input type="text" name="apeEst" placeholder="Apellidos" value="{{ old('apeEst')}}" class="form-control mb-2">
        <input type="date" name="fnaEst" placeholder="Fecha de nacimiento" value="{{ old('fnaEst')}}" class="form-control mb-2">
        <select name="turnMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="1">Turno Día</option>
            <option value="2">Turno Noche</option>
            <option value="3">Turno Tarde</option>
        </select>
        <select name="semMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            @for($i=1; $i < 7; $i++)
                <option value="{{$i}}">Semestre {{$i}}</option>
            @endfor
        </select>
        <select name="estMat" class="form-control mb-2">
            <option value="">Seleccione...</option>
            <option value="0">Inactivo</option>
            <option value="1">Activo</option>
        </select>
        <button class="btn btn-success" type="submit">Agregar</button>
    </form>

    <br/>

    <div class="btn btn-dark fs-3 fw-bold d-grid"> Lista de siguimiento</div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Codigo</th>
                <th scope="col">Apellidos y Nombres</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
    

            @foreach($xAlumnos as $item)
            <tr>
                <th scope="row">{{ $item->id}}</th>
                <td>{{ $item->codEst}}</td>
                <td>
                    <a href="{{ route('Estudiante.xDetalle', $item->id) }}"> 
                        {{ $item -> apeEst }} - {{ $item -> nomEst }} 
                    </a>

                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

@endsection