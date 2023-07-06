<x-html>
    <div class="container">
        <div class="row">
            <h2 class="h1 text-center">Categorias</h2>
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
                                <footer class="blockquote-footer">Esta categoria tiene: {{$category->products->count()}} productos</footer>
                                <a href=" {{route('categories.show',$category->id)}} " class="btn btn-danger">Ver Productos</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-html>
