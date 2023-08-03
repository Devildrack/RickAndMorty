<!DOCTYPE html>
<html>

<head>
    <title>Rick and Morty App - {{ $character['name'] }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <a class="navbar-brand" href="#">Logo</a>
            <a class="navbar-brand ml-auto {{ Request::is('Personajes') ? 'text-primary' : 'text-secondary' }}"
                href="{{ url('/') }}">Personajes</a>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center">{{ $character['name'] }}</h1>
                <div class="text-center">
                    <img src="{{ $character['image'] }}" class="img-fluid mt-3" alt="Imagen de {{ $character['name'] }}"
                        style="max-height: 400px;">
                    <div class="bg-white mt-3 d-flex justify-content-center align-items-center"
                        style="max-width: 400px; margin: 0 auto;">
                        <div
                            class="{{ $character['status'] === 'Alive' ? 'bg-success' : ($character['status'] === 'Dead' ? 'bg-danger' : 'bg-secondary') }} text-white p-2 rounded">
                            Estado: {{ $character['status'] }}
                        </div>
                    </div>
                </div>
                <p class="text-center">Género: {{ $character['gender'] }}</p>
                <p class="text-center">Ubicación: {{ $character['location']['name'] }}</p>
                <p class="text-center">Origen: {{ $character['origin']['name'] }}</p>
                <p class="text-center">Especie: {{ $character['species'] }}</p>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
