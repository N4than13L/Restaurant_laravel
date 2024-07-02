@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://images.pexels.com/photos/941861/pexels-photo-941861.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/696218/pexels-photo-696218.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://images.pexels.com/photos/958545/pexels-photo-958545.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="col-md-8 mt-2">
                <div class="card">
                    <div class="card-body">

                        <img src="https://images.pexels.com/photos/1307698/pexels-photo-1307698.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="d-block w-50" />
                        <p>
                            En nuestro acogedor restaurante, ubicado en el corazón del Valle de Guadalupe, cada plato cuenta
                            una historia de frescura y tradición. Desde nuestras ensaladas de la huerta hasta los cortes de
                            carne a la parrilla, cada bocado está cuidadosamente preparado para deleitar sus sentidos.
                        </p>

                        <img src="https://images.pexels.com/photos/735869/pexels-photo-735869.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="d-block w-50" />
                        <p>
                            Déjese seducir por nuestro menú de temporada, diseñado para resaltar los sabores locales y los
                            ingredientes más frescos que nuestra región tiene para ofrecer. Acompañe su experiencia con una
                            selección de vinos cuidadosamente elegidos de las mejores bodegas de la zona, o pruebe nuestros
                            cócteles artesanales que celebran los sabores únicos de Baja California.
                        </p>

                        <img src="https://images.pexels.com/photos/687824/pexels-photo-687824.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            class="d-block w-50" />
                        <p>
                            Ya sea que venga a disfrutar de una comida íntima o celebrar una ocasión especial con amigos y
                            familiares, en el Bistró del Valle siempre encontrará una experiencia gastronómica inolvidable.
                            ¡Esperamos darle la bienvenida pronto!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-secondary text-light mt-2 p-4">
        <i class="fa-solid fa-location-dot"></i> Ubicacion: calle los limones esq, pica pollo

        <p><i class="fa-solid fa-phone"></i> Telefonos: 1+ 800 333 1111</p>
        <p>Accede al menu <a href="#" class="btn btn-info">aquí</a></p>
        <p>
            más información al correo <a href="#" class="bg-info text-dark">Restauranteprimos@gmail.com</a>
        </p>
    </footer>
@endsection
