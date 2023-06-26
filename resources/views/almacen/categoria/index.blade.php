@extends('layouts.admin')
@section('contenido')
    {{-- Contenido titulo --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row bm-2">
                <div class="col-sm-6">
                    <h1>Todas las categroias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Categoria</li>
                    </ol>
                </div>
            </div>            
        </div>
    </div>
    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-xl-12">
                            <form action="{{ route('categoria.index') }}" method="get">
                                
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="texto" placeholder="Buscar categoria" value="{{ $texto }}" aria-label="Recipient's username" aria-describedby="button-addon2"></input>
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <a  href="{{route('categoria.create')}}" class="btn btn-success">Nueva</a>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        </div>
                        <div class="table-responsive custom-table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Opciones</th>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoria as $cat)
                                        <tr>
                                            <td>
                                                <a href="{{route('categoria.edit', $cat->id_categoria)}}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $cat->id_categoria }}"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                            <td>{{ $cat->id_categoria}}</td>
                                            <td>{{ $cat->categoria }}</td>
                                            <td>{{ $cat->descripcion }}</td>
                                        </tr>
                                    @include('almacen.categoria.modal')
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categoria->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection