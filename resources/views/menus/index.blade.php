@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Listado de comidas</h3>
                    </div>

                    <a class="btn btn-success" href="{{ Route('menu.add') }}"><i class="fa-solid fa-plus"></i></a>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">nombre</th>

                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($menus as $menu)
                                    <tr>
                                        <td scope="row">menu id</td>
                                        <td scope="row">menu nombre</td>

                                        <td scope="row">
                                            <a href="#" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
