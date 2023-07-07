<x-html>
    <div class="container">
        <div class="row rounded-4" style="background-color: #6D4C35">
            <div class="col" style="padding: 2% 2% 2%;">
                <div class="row text-center mx-auto">
                    <div class="col">
                        <a href="{{ route('visitor.index', $user) }}" class="col h3 text-end"
                            style="color: rgb(255, 255, 255); text-decoration-line:none;">
                            Inicio
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('visitor.categories', $user) }}" class="col h3 text-center"
                            style="color: rgb(255, 255, 255); text-decoration-line:none;">
                            Categorias
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('visitor.tags', $user) }}" class="col h3 text-start"
                            style="color: rgb(107, 192, 111); text-decoration-line:none;">
                            Etiquetas
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="h2" style="margin: 3% 0% 0%">Etiqueta: {{ $tag->name }}</h3>
        <div class="row justify-content-center align-items-center">
            @foreach ($tags as $product)
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:10%;">
                        <img src="{{ $product->images[0]->name }}" class="card-img-top" alt="...">
                        <div class="card-body" style="background-color: #C19A6B">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 120, '...') }}</p>
                            <p class="card-text"> <b>Precio por unidad: {{ Str::limit($product->price, 120, '...') }} Bs
                                </b></p>
                            <a href="{{ route('visitor.products.show', ['user'=>$user,'product'=>$product->id]) }}" class="btn text-white"
                                style="background-color: rgb(163, 88, 40)">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-html>
