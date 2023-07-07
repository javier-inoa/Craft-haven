<x-html-creator>
    <div class="row">
        <div class="row" style="background-color: #6D4C35;padding:2% 0% 2%">
            <div class="col-4">
                <a href="{{ route('users.show', $user) }}" class="btn btn-warning">Atras</a>
            </div>
            <div class="col-8">
                <p class="h2 text-white">Mi Nuevo Producto</p>
            </div>
        </div>
        <div class="row justify-content-md-center" style="background-color: #C19A6B;padding: 1% 0% 2%">
            <div class="col-8 rounded-5" style="background-color: rgba(255, 255, 255, 0.3);padding:2% 2% 2%">
                <form action="{{ route('creator.products.store', $user) }}" method="post">
                    @csrf
                    <div class="mb-3 rounded-4"
                        style="background-color: rgba(0, 255, 0, 0.2);padding: 1% 1% 1%;margin:1% 0% 1%">
                        <label for="" class="h4 form-label">Nombre del Producto</label>
                        <input type="text" name="name" id="" class="form-control"
                            value="{{ @old('name') }}">
                        <div class="form-text text-white bg-danger">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-3 rounded-4"
                        style="background-color: rgba(0, 255, 0, 0.2);padding: 1% 1% 1%;margin:1% 0% 1%">
                        <label for="" class="h4 form-label">Imagenes</label>
                        <input type="text" name="img1" id="" class="form-control"
                            placeholder="Link 1"value="{{ @old('img1') }}">
                        <div class="form-text text-white bg-danger">
                            <x-input-error :messages="$errors->get('img1')" class="mt-2" />
                        </div>
                        <input type="text" name="img2" id=""
                            class="form-control"placeholder="Link 2"value="{{ @old('img2') }}">
                        <div class="form-text text-white bg-danger">
                            <x-input-error :messages="$errors->get('img2')" class="mt-2" />
                        </div>
                        <input type="text" name="img3" id=""
                            class="form-control"placeholder="Link 3"value="{{ @old('img3') }}">
                        <div class="form-text text-white bg-danger">
                            <x-input-error :messages="$errors->get('img3')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-3 rounded-4"
                        style="background-color: rgba(0, 255, 0, 0.2);padding: 1% 1% 1%;margin:1% 0% 1%">
                        <label for="" class="h4 form-label">Descripcion</label>
                        <textarea type="text" name="description" id="" class="form-control" style="resize: none" rows="5">{{ @old('description') }}</textarea>
                        <div class="form-text text-white bg-danger">
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                    </div>
                    <div class="mb-3 rounded-4"
                        style="background-color: rgba(0, 255, 0, 0.2);padding: 1% 1% 1%;margin:1% 0% 1%">
                        <div class="row">
                            <div class="col-6">
                                <label for="" class="h4 form-label">Precio por unidad</label>
                                <input type="text" name="price" id="" class="form-control"
                                    value="{{ @old('price') }}" placeholder="145 o 12.51">
                                <div class="form-text text-white bg-danger">
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-6 ">
                                <label for="" class="h4 form-label">Estado</label><br>
                                <div class="form-text text-white bg-danger">
                                    <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="state" value="visible"
                                            {{ old('state') == 'visible' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">
                                            Visible
                                        </label>
                                    </div>
                                    <div class="col-6">
                                        <input class="form-check-input" type="radio" name="state" value="private"
                                            {{ old('state') == 'private' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="">
                                            Privado
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 rounded-4"
                        style="background-color: rgba(0, 255, 0, 0.2);padding: 1% 1% 1%;margin:1% 0% 1%">
                        <label for="" class="h4 form-label">Seleccione una Categoria</label>
                        <div class="form-text text-white bg-danger">
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-3 align-items-center">
                                    <input class="form-check-input" type="radio" name="category"
                                        value="{{ $category->id }}"
                                        {{ old('category') == $category->id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mb-3 rounded-4"
                        style="background-color: rgba(0, 255, 0, 0.2);padding: 1% 1% 1%;margin:1% 0% 1%">
                        <label for="" class="h4 form-label">Seleccione los tags necesarios</label>
                        <div class="row">
                            @foreach ($tags as $tag)
                                <div class="col-3 align-items-center">
                                    <input class="form-check-input" type="checkbox" name="tags[]"
                                        value="{{ $tag->id }}"
                                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="">
                                        {{ $tag->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary col-6">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-html-creator>
