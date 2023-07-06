
@extends('layouts.admin')
@section('contenido')
    {{-- Contenido titulo --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row bm-2">
                <div class="col-sm-6">
                    <h1>Listado de todos los productos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Productos</li>
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
                            <form action="{{ route('producto.index') }}" method="get">
                                
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                                            <input type="text" class="form-control" name="texto" placeholder="Buscar productos" value="{{ $texto }}" aria-label="Recipient's username" aria-describedby="button-addon2"></input>
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group mb-6">
                                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-plus-circle-fill"></i></span>
                                            <a  href="{{route('producto.create')}}" class="btn btn-success">Nueva</a>
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
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Stock</th>
                                        <th>Imagen</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $prod)
                                        <tr>
                                            <td>
                                                <a href="{{ route('producto.edit', $prod->id_producto) }}" class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-delete-{{ $prod->id_producto }}"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                            <td>{{ $prod->codigo }}</td>
                                            <td>{{ $prod->nombre }}</td>
                                            <td>{{ $prod->stock }}</td>
                                            <td><img src="{{asset('imagenes/productos/'.$prod->imagen)}}" alt="{{ $prod->nombre }}" height="70px" width="70px" class="img-thumbnail"></td>
                                            <td>{{ $prod->descripcion }}</td>
                                            <td>{{ $prod->estatus }}</td>
                                        </tr>
                                    @include('almacen.producto.modal')
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $productos->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection