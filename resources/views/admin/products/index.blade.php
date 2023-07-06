<x-html-admin>
    <div class="row">
        <div class="col-2 rounded-start" style="background-color: rgb(109, 76, 53)">
            <div class="d-flex justify-content-center" style="margin: 5% 0% 0%">
                <a href="" class="btn btn-success">Nuevo Producto</a>
            </div>
        </div>
        <div class="col-7" style="background-color: rgb(193, 154, 107)">
            <div class="row" style="margin: 2% 0% 1%">
                <p class="h2">Tabla Productos</p>
            </div>
            <div class="row" style="margin:1% 1% 1%">
                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table" style="background-color: rgba(255, 255, 255, 0.3)">
                        <thead style="position: sticky;top: 0; background-color: #D4B898;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Score</th>
                                <th scope="col">Notificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index => $product)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->score() }}</td>
                                    <td><a href="{{route('admin.notifications.create',['user'=>$user,'product'=>$product->id])}}" class="btn btn-warning">Notificar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3 rounded-end" style="background-color: rgb(109, 76, 53)">
            <div class="row" style="margin:18% 2% 2%">
                <a href="{{ route('users.show', $user) }}" class="btn btn-secondary">Inicio</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.products', $user) }}" class="btn btn-success">Productos</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.users', $user) }}" class="btn btn-secondary">Usuarios</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.categories', $user) }}" class="btn btn-secondary">Categorias</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.tags', $user) }}" class="btn btn-secondary">Etiquetas</a>
            </div>
            <div class="row" style="margin:2% 2% 15%">
                <a href="{{ route('admin.notifications', $user) }}" class="btn btn-secondary">Notificaciones Realizadas</a>
            </div>
        </div>
    </div>
</x-html-admin>
