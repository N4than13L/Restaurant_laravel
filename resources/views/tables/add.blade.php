@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">agregar tus mesas</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('table.store') }}">
                            @csrf

                            {{-- nombre --}}
                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- cliente --}}
                            <div class="row mb-3">
                                <label for="client"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cliente') }}</label>

                                <div class="col-md-6">
                                    <select name="client" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona el cliente</option>
                                        @foreach ($client as $clients)
                                            <option value="{{ $clients->id }}">
                                                <p>{{ $clients->fullname }}</p>
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            {{-- menu --}}
                            <div class="row mb-3">
                                <label for="client"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Cliente') }}</label>

                                <div class="col-md-6">
                                    <select name="client" class="form-select" aria-label="Default select example">
                                        <option selected>Selecciona el menu</option>
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
