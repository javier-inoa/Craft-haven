<x-html-admin>
    <div class="row">
        <div class="col-9 rounded-start" style="background-color: rgb(193, 154, 107)">
            <div class="row" style="margin:5% 0% 5%">
                <div class="card mb-3 bg-dark text-white">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-4">
                            <img src="https://d2gg9evh47fn9z.cloudfront.net/1600px_COLOURBOX25066784.jpg"
                                class="img-fluid rounded-circle" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$user->name}}</h5>
                                <p class="crad-text"><b>Rango:</b> Administrador</p>
                                <p class="card-text"><b>Correo Electronico:</b> {{$user->email}}</p>
                                <p class="card-text"><b>Contraseña:</b> **********</p>
                                <a href="" class="btn btn-warning">Editar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 rounded-end" style="background-color: rgb(109, 76, 53)">
            <div class="row" style="margin:18% 2% 2%">
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-success">Inicio</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.products', $user->id) }}" class="btn btn-secondary">Productos</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.users', $user->id) }}" class="btn btn-secondary">Usuarios</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.categories',$user->id)}}" class="btn btn-secondary">Categorias</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.tags',$user->id)}}" class="btn btn-secondary">Etiquetas</a>
            </div>
            <div class="row" style="margin:2% 2% 15%">
                <a href="{{ route('admin.notifications',$user->id)}}" class="btn btn-secondary">Notificaciones Realizadas</a>
            </div>
        </div>
    </div>
</x-html-admin>
