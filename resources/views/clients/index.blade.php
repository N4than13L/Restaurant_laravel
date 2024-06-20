@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Listado de cientes</h3>
                    </div>

                    <a class="btn btn-success" href="{{ Route('clients.create') }}"><i class="fa-solid fa-plus"></i></a>

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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">direccion</th>
                                    <th scope="col">telofono</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($client as $clients)
                                    @if ($user->id == $clients->users_id)
                                        <tr>
                                            <td scope="row">{{ $clients->id }}</td>
                                            <td scope="row">{{ $clients->fullname }}</td>
                                            <td scope="row">{{ $clients->address }}</td>
                                            <td scope="row">{{ $clients->phone }}</td>

                                            <td scope="row">
                                                {{-- editar --}}
                                                <a href="{{ route('clients.edit', $clients->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                {{-- eliminar --}}
                                                <a href="{{ route('clients.destroy', $clients->id) }}"
                                                    class="btn btn-danger btn-sm">
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
