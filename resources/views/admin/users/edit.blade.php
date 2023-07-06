<x-html-admin>
    <div class="row">
        <div class="row" style="background-color: #6D4C35;padding:2% 0% 2%">
            <div class="col-4">
                <a href="{{ route('admin.users', $admin) }}" class="btn btn-warning">Atras</a>
            </div>
            <div class="col-8 text-white">
                <p class="h3">Usuario: {{ $user->name }}</p>
            </div>
        </div>
        <div class="row justify-content-md-center" style="background-color: #C19A6B;padding: 1% 0% 2%">
            <div class="col-8">
                <p class="h4">Email: {{ $user->email }} </p>
                <p class="h4">Productos Que tiene: {{ $user->products->count() }} </p>
                <p class="h4">Tipo de usuario: {{ $user->type }} </p>
                <div class="col-12 text-center rounded-pill"
                    style="margin: 2% 0% 2%;padding:1% 0% 1%; background-color:rgba(255, 255, 255, 0.5)">
                    <form action="{{ route('admin.users.update', ['admin' => $admin, 'user' => $user->id]) }}"
                        method="post">
                        @csrf
                        @method('put')
                        <p class="h3">Asignar Rango</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type"
                                value="visitor" >
                            <label class="form-check-label" for="">
                                Visitante
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type"
                                value="seller" checked>
                            <label class="form-check-label" for="">
                                Creador
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type"
                                value="administrator" >
                            <label class="form-check-label" for="">
                                Administrador
                            </label>
                        </div><br>
                        <button type="submit" class="btn btn-primary">Asignar Rango</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-html-admin>
