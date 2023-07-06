@extends('layouts.admin')
@section('contenido')
    <div class="col-md-6">
        <div class="card card-primary">
            
            <div class="card-header">
                <h3 class="card-title"> Editar categoria {{ $categoria->categoria }}</h3>
            </div>

            <form action="{{ route('categoria.update', $categoria->id_categoria) }}" method="POST" class="form">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="categoria">Nombre</label>
                        <input type="text" class="form-control" name="categoria" id="categoria" value="{{ $categoria->categoria }}" placeholder="Ingrese una categoria">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion" value="{{ $categoria->descripcion }}" placeholder="Ingrese la descripción">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success me-1 mb-1">Editar</button>
                        <a href="{{ route('categoria.index') }}" class="btn btn-danger me-1 mb-1">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection