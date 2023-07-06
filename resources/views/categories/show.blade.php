<x-html>
    <div class="container">
        <h3 class="h2" style="margin: 3% 0% 0%">Categoria: {{ $category->name }}</h3>
        <div class="row justify-content-center align-items-center">
            @foreach ($categories as $product)
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:10%;">
                        <img src="{{ $product->images[0]->name }}" class="card-img-top" alt="...">
                        <div class="card-body" style="background-color: #C19A6B">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 120, '...') }}</p>
                            <p class="card-text"> <b>Precio por unidad: {{ Str::limit($product->price, 120, '...') }} Bs
                                </b></p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn text-white"
                                style="background-color: rgb(163, 88, 40)">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-html>