<x-html-creator>
    <div class="row">
        <div class="col-9 rounded-start" style="background-color: rgb(193, 154, 107)">
            <div class="row">
                <div class="col text-center" style="margin: 2% 0% 1%">
                    <p class="h3">Usuario: {{ $user->name }}</p>
                </div>
            </div>
            <div class="row">
                <div class="h4">Mis Productos</div>
            </div>
            <div class="row" style="margin:1% 1% 1% 1%">
                <div class="h5">Productos visibles</div>
                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table align-middle" style="background-color: rgba(255,255,255,0.3);">
                        <thead style="position: sticky;top: 0; background-color: #D4B898;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ver</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Puntuacion</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 0;
                            @endphp
                            @foreach ($user->products as $product)
                                @if ($product->state == 'visible')
                                    <tr>
                                        <th>{{ $contador = $contador + 1 }}</th>
                                        <td><a href="{{ route('creator.products.show', ['user' => $user->id, 'product' => $product->id]) }}"
                                            class="btn btn-success">Ver</a></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td class="text-center">{{ $product->score() }}</td>
                                        <td><a href="{{ route('creator.products.edit', ['user' => $user->id, 'product' => $product->id]) }}"
                                                class="btn btn-secondary">editar</a></td>
                                        <td>
                                            <form
                                                action="{{ route('creator.products.destroy', ['user' => $user->id, 'product' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row" style="margin:1% 1% 1% 1%">
                <div class="h5">Productos privados</div>
                <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                    <table class="table align-middle" style="background-color: rgba(255,255,255,0.3);">
                        <thead style="position: sticky;top: 0; background-color: #D4B898;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ver</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Puntuacion</th>
                                <th scope="col">Editar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $contador = 0;
                            @endphp
                            @foreach ($user->products as $product)
                                @if ($product->state == 'private')
                                    <tr>
                                        <th>{{ $contador = $contador + 1 }}</th>
                                        <td><a href="{{ route('creator.products.show', ['user' => $user->id, 'product' => $product->id]) }}"
                                            class="btn btn-success">Ver</a></td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td class="text-center">{{ $product->score() }}</td>
                                        <td><a href="{{ route('creator.products.edit', ['user' => $user->id, 'product' => $product->id]) }}"
                                                class="btn btn-secondary">editar</a></td>
                                        <td>
                                            <form
                                                action="{{ route('creator.products.destroy', ['user' => $user->id, 'product' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-3 rounded-end" style="background-color: rgb(109, 76, 53)">
            <div class="row" style="margin: 5% 1% 1%">
                <a href="{{ route('creator.products.create', $user->id) }}" class="btn btn-success">Nuevo Producto</a>
            </div>
            <div class="row" style="margin: 10% 1% 1%">
                <div class="h5 text-white text-center" style="margin: 1% 1% 1%">Avisos de los Administradores</div>
            </div>
            <div class="row" style="padding: 2% 0% 5%">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    @foreach ($user->products as $product)
                        @if ($product->notifications->isNotEmpty())
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading{{ $loop->iteration }}">
                                    <button class="accordion-button collapsed bg-danger text-white" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{ $loop->iteration }}" aria-expanded="false"
                                        aria-controls="flush-collapse{{ $loop->iteration }}">
                                        Producto: {{ $product->name }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $loop->iteration }}" class="accordion-collapse collapse"
                                    aria-labelledby="flush-heading{{ $loop->iteration }}"
                                    data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        @foreach ($product->notifications as $notification)
                                            <b>Administrador: {{ $notification->administrator->name }}</b>
                                            <p><b>Notificación: </b>{{ $notification->notification }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-html-creator>
