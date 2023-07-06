<x-html-admin>
    <div class="row">
        <div class="col-9" style="background-color: rgb(193, 154, 107)">
            <div class="row" style="margin: 2% 0% 1%">
                <p class="h2">Notificaciones Realizadas</p>
            </div>
            <div class="row" style="margin:1% 1% 1%">
                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table" style="background-color: rgba(255, 255, 255, 0.3)">
                        <thead style="position: sticky;top: 0; background-color: #D4B898;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Notification</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notifications as $index => $notification)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $notification->notification }}</td>
                                    <td>{{$notification->product->name}}</td>
                                    <td><a href="{{ route('admin.notifications.edit', ['user' => $user, 'notification' => $notification->id]) }}" class="btn btn-secondary">Editar</a></td>
                                    <td>
                                        <form action="{{route('admin.notifications.destroy',['user' => $user, 'notification' => $notification->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
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
                <a href="{{ route('admin.products', $user) }}" class="btn btn-secondary">Productos</a>
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
                <a href="{{ route('admin.notifications', $user) }}" class="btn btn-success">Notificaciones
                    Realizadas</a>
            </div>
        </div>
    </div>
</x-html-admin>
