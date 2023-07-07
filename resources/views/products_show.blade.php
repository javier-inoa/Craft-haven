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
                            style="color: rgb(255, 255, 255); text-decoration-line:none;">
                            Etiquetas
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h1 class="h1 text-center">{{ $product->name }}</h1>
            <h2 class="h2">Imagenes</h2>
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $product->images[0]->name }}" class="d-block w-100" alt="..."
                            style="height: 10cm">
                    </div>
                    @foreach ($product->images as $image)
                        <div class="carousel-item">
                            <img src="{{ $image->name }}" class="d-block w-100" alt="..."style="height: 10cm">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev" style="background-color: rgba(0, 0, 0, 0.3)">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next" style="background-color: rgba(0, 0, 0, 0.3)">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row" style="margin: 5% 0% 5%">
            <div class="rounded-4" style="background-color: rgb(193, 154, 107)">
                <div class="row">
                    <b class="h2" style="padding: 2% 5% 1%">Creador: {{ $product->user->name }}</b>
                </div>
                <div class="row d-grid gap-2 col-4 mx-auto" style="padding: 3% 0% 0%;">
                    @if ($product->category && $product->category->id)
                        <a href="{{ route('visitor.categories.show', ['user' => $user, 'category' => $product->category->id]) }} "
                            class="btn btn-dark">
                            <p class="h3">Categoria: {{ $product->category->name }} </p>
                        </a>
                    @endif
                </div>
                <div class="row rounded-pill" style="margin: 3% 5% 0%; background-color: #A35828; padding:2% 0% 2%">
                    <h2 class="h3 text-center" style="color: white">Etiquetas:</h2>
                    @foreach ($product->tags as $tag)
                        <div class="col text-center">
                            <a href="{{ route('visitor.tags.show', ['user' => $user, 'tag' => $tag->id]) }}"
                                class="h4" style="text-decoration-line: none; color:white">{{ $tag->name }}</a>
                        </div>
                    @endforeach
                </div>
                <div class="row" style="padding: 3% 5% 2%; font-size: 170%">
                    {{ $product->description }}
                </div>
                <div class="row">
                    <b class="h4 text-center">Precio por unidad: {{ $product->price }} Bs</b>
                </div>
                <div class="row bg-dark text-white" style="padding: 3% 0% 3%">
                    <div class="col-6">
                        <b class="h4">
                            <p>Puntuacion de los usuarios: {{ $product->score() }}</p>
                            <p>Puntuado por {{ $product->scores->count() }} usuarios</p>
                        </b>
                    </div>
                    <div class="col-6">
                        <form
                            action="{{ route('visitor.scores.update', ['user' => $user, 'product' => $product->id]) }}"
                            method="post">
                            @csrf
                            @method('put')
                            <div class="text-center">
                                <div id="rangeValue" class="h5">5</div>
                                <input type="range" class="form-range" name="score" min="0" max="10"
                                    id="customRange2">
                                <button type="submit" class="btn btn-success">Puntuar</button>
                            </div>
                        </form>
                        <script>
                            var rangeInput = document.getElementById('customRange2');
                            var rangeValue = document.getElementById('rangeValue');
                            rangeInput.addEventListener('input', function() {
                                rangeValue.textContent = rangeInput.value;
                            });
                        </script>
                    </div>
                </div>
                <div class="row" style="padding: 0% 1% 0%">
                    <div class="col-6">
                        <form
                            action="{{ route('visitor.comments.store', ['user' => $user, 'product' => $product->id]) }}"
                            method="post">
                            @csrf
                            <div style="margin: 2% 0% 2%;">
                                <div class="card rounded-4 border border-dark border-4 rounded-5">
                                    <div class="h3 card-header">
                                        Comentar:
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <textarea name="comment" id="" class="form-control border border-dark" style="resize: none" rows="5"
                                                placeholder="Ingrese comentario">{{ @old('comment') }}</textarea>
                                        <div class="form-text text-white bg-danger">
                                            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
                                        </div>
                                        </p>
                                        <button type="submit" class="btn btn-primary">Comentar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form action="{{route('visitor.questions.store',['user'=>$user,'product'=>$product->id])}}" method="post">
                            @csrf
                            <div style="margin: 2% 0% 2%;">
                                <div class="card rounded-4 border border-dark border-4 rounded-5">
                                    <div class="h3 card-header">
                                        Preguntar:
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            <textarea name="question" id="" class="form-control border border-dark" style="resize: none"
                                                rows="5" placeholder="Ingrese su pregunta">{{@old('question')}}</textarea>
                                        <div class="form-text text-white bg-danger">
                                            <x-input-error :messages="$errors->get('question')" class="mt-2" />
                                        </div>
                                        </p>
                                        <button type="submit" class="btn btn-primary">Consultar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" style="padding: 0% 2% 3%">
                    <div class="col-6 border border-dark border-3" style="background-color: rgba(255,255,255,0.7)">
                        <b class="h3">Comentarios</b>
                        @foreach ($product->comments as $comment)
                            <div class="card border border-dark" style="margin: 3% 0%">
                                <h5 class="card-header border-dark">Usuario: {{ $comment->user->name }}</h5>
                                <div class="card-body">
                                    <p class="card-text">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-6 border border-dark border-3" style="background-color: rgba(255,255,255,0.7)">
                        <b class="h3">Preguntas</b>
                        @foreach ($product->questions as $question)
                            <div class="card border border-dark" style="margin: 3% 0%">
                                <h5 class="card-header border-dark">Usuario: {{ $question->user->name }}</h5>
                                <div class="card-body">
                                    <h5 class="card-title">Pregunta:</h5>
                                    <p class="card-text ">{{ $question->question }}</p>
                                </div>
                                <div class="card-footer border-dark">
                                    <h5 class="card-title">Respuesta del Artesano:</h5>
                                    <p class="card-text ">{{ $question->answer }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-html>
