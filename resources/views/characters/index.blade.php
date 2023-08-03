<!DOCTYPE html>
<html>

<head>
    <title>Rick and Morty App</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Logo de lado izquierdo -->
            <a class="navbar-brand" href="#">Logo</a>
            <!-- Etiqueta "a" de lado derecho que redirige a la ruta index -->
            <a class="navbar-brand ml-auto {{ Request::is('personajes') ? 'text-secondary' : 'text-primary' }}"
                href="{{ url('/') }}">Personajes</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h1 class="mb-4 text-center">Personajes</h1>


        <div class="row justify-content-center mb-4">
            <form action="/search" method="get" class="mb-3 col-12 col-md-6 mt-2">
                <div class="input-group me-2">
                    <input type="text" name="name" class="form-control" placeholder="Buscar por nombre">
                    <div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row">


            <div class="col-12 col-md-3 mb-4">
                <h2 class="text-center">Filtro de busqueda</h2>
                <div class="card p-4">
                    <form action="/filter" method="get">
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Human">Human</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Alien">Alien</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Humanoid">Humanoid</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Poopybutthole">Poopybutthole</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Mythological">Mythological</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Unknown">Unknown</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Animal">Animal</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Disease">Disease</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Robot">Robot</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Cronenberg">Cronenberg</button>
                        <button class="btn btn-outline-primary btn-filter" type="button"
                            data-species="Planet">Planet</button>

                        <input type="hidden" name="species" id="speciesInput">
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-9">
                <div class="row">
                    @if (isset($characters['results']) && count($characters['results']) > 0)
                        @foreach ($characters['results'] as $character)
                            <div class="col-md-4 mb-3">
                                <div class="col">
                                    <div class="card border-primary shadow-lg">
                                        <div class="position-absolute top-0 end-0 p-1 rounded {{ $character['status'] === 'Alive' ? 'bg-success' : ($character['status'] === 'Dead' ? 'bg-danger' : 'bg-secondary') }} text-white"
                                            style="font-size: 0.75rem; top: 5px; right: 5px;">
                                            {{ $character['status'] }}
                                        </div>
                                        <a href="/character/{{ $character['id'] }}"
                                            style="text-decoration: none; color: inherit;">
                                            <img src="{{ $character['image'] }}" class="card-img-top"
                                                alt="Imagen de {{ $character['name'] }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $character['name'] }}</h5>
                                                <p class="card-text">Localización: {{ $character['location']['name'] }}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-md-12">
                            <div class="alert alert-warning text-center" role="alert">
                                Lo sentimos, el nombre que buscas no se encuentra.
                            </div>
                            <div class="text-center">
                                <a href="{{ url('/') }}" class="btn btn-primary">Regresar</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Agregar enlaces JS de Bootstrap -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {

            $(".btn-filter").on("click", function() {
                const species = $(this).data("species");

                $("#speciesInput").val(species);

                $(this).closest('form').submit();
            });

            const currentSpecies = "{{ request('species') }}";
            $(".btn-filter").each(function() {
                if ($(this).data("species") === currentSpecies) {
                    $(this).removeClass("btn-outline-primary").addClass("btn-primary");
                }
            });
        });
    </script>
</body>

</html>
