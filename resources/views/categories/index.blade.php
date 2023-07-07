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
                            style="color: rgb(107, 192, 111); text-decoration-line:none;">
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
            @foreach ($categories as $category)
                <div class="col-6" style="margin: 1% 0% 1%">
                    <div class="card">
                        <div class="h3 card-header">
                            {{ $category->name }}
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>{{ $category->description }}</p>
                                <footer class="blockquote-footer">Esta categoria tiene:
                                    {{ $category->products->count() }} productos</footer>
                                <a href=" {{ route('visitor.categories.show', ['user'=>$user,'category'=>$category->id]) }} " class="btn btn-danger">Ver
                                    Productos</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-html>
