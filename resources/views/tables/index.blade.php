@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Listado de comidas</h3>
                    </div>



                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body">
                        <a class="btn btn-success" href="{{ route('table.create') }}"><i class="fa-solid fa-plus"></i></a>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">mesa</th>
                                    <th scope="col">nombre</th>
                                    <th scope="col">celular</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($table as $tables)
                                    @if ($user->id == $tables->users_id)
                                        <tr>
                                            <td scope="row">{{ $tables->id }}</td>
                                            <td scope="row">{{ $tables->name }}</td>
                                            <td scope="row">{{ $tables->clients->fullname }}</td>
                                            <td scope="row">{{ $tables->clients->phone }}</td>


                                            <td scope="row">
                                                {{-- editar --}}
                                                <a href="#" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                {{-- eliminar --}}
                                                <a href="#" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
