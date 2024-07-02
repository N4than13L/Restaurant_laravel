@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Listado de facturas</h3>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card-body">
                        <a class="btn btn-success" href="{{ Route('bills.create') }}"><i class="fa-solid fa-plus"></i></a>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Comida</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Direccion</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($bill as $bills)
                                    @if ($user->id == $bills->users_id)
                                        <tr>
                                            <td scope="row">{{ $bills->id }}</td>
                                            <td scope="row">{{ $bills->clients->fullname }}</td>
                                            <td scope="row">{{ $bills->menus->name }}</td>


                                            <td scope="row">DOP$:{{ $bills->menus->amount }}</td>
                                            <td scope="row">{{ $bills->clients->address }}</td>
                                            <td scope="row">{{ $bills->clients->phone }}</td>
                                            <td scope="row">
                                                {{-- editar --}}
                                                <a href="{{ route('bills.edit', $bills->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                {{-- eliminar --}}
                                                <a href="{{ route('bills.destroy', $bills->id) }}"
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
