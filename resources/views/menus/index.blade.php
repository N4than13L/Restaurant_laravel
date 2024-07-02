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
                        <a class="btn btn-success" href="{{ Route('menu.add') }}"><i class="fa-solid fa-plus"></i></a>
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Monto</th>

                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($menus as $menu)
                                    @if ($user->id == $menu->users_id)
                                        <tr>
                                            <td scope="row">{{ $menu->id }}</td>
                                            <td scope="row">{{ $menu->name }}</td>
                                            <td scope="row"> DOP: {{ $menu->amount }}</td>

                                            <td scope="row">
                                                {{-- editar --}}
                                                <a href="{{ route('menu.edit', $menu->id) }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                {{-- eliminar --}}
                                                <a href="{{ route('table.destroy', $menu->id) }}"
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
