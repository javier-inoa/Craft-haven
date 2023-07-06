<x-html>
    <div class="container" style="background-color: rgb(232, 227, 217)">

        <h2 class="h1">Mejores Puntuados</h2>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ $products[0]->images[0]->name }}" class="d-block w-100 img-fluid" alt="..."
                        style="height: 10cm">
                    <div class="carousel-caption d-none d-md-block">
                        <a href=" {{ route('products.show', $products[0]->id) }} " class="h2 rounded-pill"
                            style="background-color: rgb(163, 88, 40); color:white; text-decoration-line:none;">{{ $products[0]->name }}
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ $products[1]->images[1]->name }}" class="d-block w-100 img-fluid" alt="..."
                        style="height: 10cm">
                    <div class="carousel-caption d-none d-md-block">
                        <a href=" {{ route('products.show', $products[1]->id) }} " class="h2 rounded-pill"
                            style="background-color: rgb(163, 88, 40); color:white; text-decoration-line:none;">{{ $products[1]->name }}
                        </a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ $products[2]->images[2]->name }}" class="d-block w-100 img-fluid" alt="..."
                        style="height: 10cm">
                    <div class="carousel-caption d-none d-md-block">
                        <a href=" {{ route('products.show', $products[2]->id) }} " class="h2 rounded-pill"
                            style="background-color: rgb(163, 88, 40); color:white; text-decoration-line:none;">{{ $products[2]->name }}
                        </a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" style="background-color: rgba(0, 0, 0,0.3)" type="button"
                data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" style="background-color: rgba(0, 0, 0,0.3)" type="button"
                data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <h3 class="h2" style="margin: 3% 0% -3%">Productos</h3>
        <div class="row justify-content-center align-items-center">
            @foreach ($products as $product)
                <div class="col-4">
                    <div class="card" style="width: 18rem; margin-top:10%;">
                        <img src="{{ $product->images[0]->name }}" class="card-img-top" alt="...">
                        <div class="card-body" style="background-color: #C19A6B">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 120, '...') }}</p>
                            <p class="card-text"> <b>Precio por unidad: {{ Str::limit($product->price, 120, '...') }}
                                    Bs </b></p>
                            <a href="{{ route('products.show', $product->id) }}" class="btn text-white"
                                style="background-color: rgb(163, 88, 40)">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            
        </div>
    </div>

</x-html>
