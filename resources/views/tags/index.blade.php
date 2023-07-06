<x-html>
    <div class="container">
        <div class="row">
            <h2 class="h1 text-center">Etiquetas</h2>
        </div>
        <div class="row">
            @foreach ($tags as $tag)
                <div class="col-6" style="margin: 1% 0% 1%">
                    <div class="card">
                        <div class="h3 card-header">
                            {{ $tag->name }}
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <p>{{ $tag->description }}</p>
                                <footer class="blockquote-footer">Esta etiqueta tiene: {{$tag->products->count()}} productos</footer>
                                <a href=" {{route('tags.show',$tag->id)}} " class="btn btn-danger">Ver Productos</a>
                            </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-html>
