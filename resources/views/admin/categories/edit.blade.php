<x-html-admin>
    <div class="row">
        <div class="row" style="background-color: #6D4C35;padding:2% 0% 2%">
            <div class="col-4">
                <a href="{{ route('admin.categories',$user) }}" class="btn btn-warning">Atras</a>
            </div>
            <div class="col-8 text-white">
                <p class="h3">Editar Categoria</p>
            </div>
        </div>
        <div class="row justify-content-md-center" style="background-color: #C19A6B;padding: 1% 0% 2%">
            <div class="col-8">
                <form action="{{ route('admin.categories.update', ['user' => $user, 'category' => $category->id]) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label">Nombre de la categoria</label>
                        <input type="text" name="name" class="form-control" 
                        value="{{@old('name',$category->name)}}">
                        <div class="form-text text-white bg-danger"><x-input-error :messages="$errors->get('name')" class="mt-2" /></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Descripcion</label>
                        <textarea class="form-control" name="description" style="resize: none" rows="5">{{@old('description',$category->description)}}</textarea>
                        <div class="form-text text-white bg-danger"><x-input-error :messages="$errors->get('description')" class="mt-2" /></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</x-html-admin>