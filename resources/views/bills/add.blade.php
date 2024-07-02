@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">agregar tus facturas</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('bills.store') }}">
                            @csrf

                            {{-- menu --}}
                            <div class="row mb-3">
                                <label for="menu_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Menu') }}</label>

                                <div class="col-md-6">
                                    <select name="menu_id" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona el menu</option>
                                        @foreach ($menu as $menus)
                                            <option value="{{ $menus->id }}">
                                                <p>{{ $menus->name }}</p>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- client --}}
                            <div class="row mb-3">
                                <label for="client_id"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cliente') }}</label>

                                <div class="col-md-6">
                                    <select name="client_id" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona el cliente</option>
                                        @foreach ($client as $clients)
                                            <option value="{{ $clients->id }}">
                                                <p>{{ $clients->fullname }}</p>
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-regular fa-floppy-disk"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
