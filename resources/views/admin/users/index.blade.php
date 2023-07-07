<x-html-admin>
    <div class="row">
        <div class="col-9" style="background-color: rgb(193, 154, 107)">
            <div class="row" style="margin: 2% 0% 1%">
                <p class="h2">Tabla Usuarios</p>
            </div>
            <div class="row" style="margin:1% 1% 1%">
                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table" style="background-color: rgba(255, 255, 255, 0.3)">
                        <thead style="position: sticky;top: 0; background-color: #D4B898;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Type</th>
                                <th scope="col">Administrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users->sortByDesc('type')->values() as $index => $user)
                                <tr>
                                    <th>{{ $index + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td><a href="{{route('admin.users.edit',['admin'=>$admin,'user'=>$user->id])}}" class="btn btn-warning">Administrar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3 rounded-end" style="background-color: rgb(109, 76, 53)">
            <div class="row" style="margin:18% 2% 2%">
                <a href="{{ route('users.show', $admin) }}" class="btn btn-secondary">Inicio</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.products', $admin) }}" class="btn btn-secondary">Productos</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.users', $admin) }}" class="btn btn-success">Usuarios</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.categories', $admin) }}" class="btn btn-secondary">Categorias</a>
            </div>
            <div class="row" style="margin:2% 2% 2%">
                <a href="{{ route('admin.tags', $admin) }}" class="btn btn-secondary">Etiquetas</a>
            </div>
            <div class="row" style="margin:2% 2% 15%">
                <a href="{{ route('admin.notifications', $admin) }}" class="btn btn-secondary">Notificaciones Realizadas</a>
            </div>
        </div>
    </div>
    </x-html-adm>
