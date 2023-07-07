<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Craft Haven</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</head>

<body style="background-color: rgb(232, 227, 217)">
    <div class="container">
        <div class="row align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-6 text-center rounded-4 " style="background-color:rgb(109, 76, 53)">
                <div class=" rounded-5" style="margin: 5% 0% 5%; padding:2% 0% 2%;background-color: #D4B898">
                    <h1 class="h1">Inicio</h1>
                    <p class="h3">seleccion rapida</p><br>
                    @php
                        $adminRandom = $users->where('type', 'administrator')->random();
                        $creatorRandom = $users->where('type', 'seller')->random();
                        $visitorRandom = $users->where('type', 'visitor')->random();
                    @endphp
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('users.show', $adminRandom->id) }}" class="btn btn-danger"
                                style="margin: 1% 0% 1%">Administrador Random</a><br>
                            <a href="{{ route('users.show', $creatorRandom->id) }}"
                                class="btn btn-secondary"style="margin: 1% 0% 1%">Creador Random</a><br>
                            <a href="{{ route('users.show', $visitorRandom->id) }}"
                                class="btn btn-dark"style="margin: 1% 0% 1%">Visitante Random</a><br>
                        </div>
                        <div class="col-6">
                            <a href="{{ route('users.show', $users[0]->id) }}" class="btn btn-danger"
                                style="margin: 1% 0% 1%">Admin Static</a><br>
                            <a href="{{ route('users.show', $users[1]->id) }}"
                                class="btn btn-secondary"style="margin: 1% 0% 1%">Creador Static</a><br>
                            <a href="{{ route('users.show', $users[2]->id) }}"
                                class="btn btn-dark"style="margin: 1% 0% 1%">Visitante Static</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
