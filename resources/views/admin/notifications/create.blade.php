<x-html-admin>
    <div class="row">
        <div class="row" style="background-color: #6D4C35;padding:2% 0% 2%">
            <div class="col-4">
                <a href="{{ route('admin.products',$user) }}" class="btn btn-warning">Atras</a>
            </div>
            <div class="col-8 text-white">
                <p class="h3">Notificar</p>
            </div>
        </div>
        <div class="row justify-content-md-center" style="background-color: #C19A6B;padding: 1% 0% 2%">
            <div class="col-8">
                <div class="row border border-2 border-danger" style="margin: 1% 1% 1%;padding:2% 1% 2%; background-color:rgba(255, 255, 255, 0.3)">
                    <p class="h4"><b>El producto:</b> {{$product->name}}</p>
                    <p class="h5"><b>Con puntuacion:</b> {{$product->score()}}</p>
                    <p class="h5"><b>En estado:</b> {{$product->state}}</p>
                </div>
                <form action="{{route('admin.notifications.store',['user'=>$user,'product'=>$product])}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class=" h5 form-label">Notificacion</label>
                        <textarea class="form-control" name="notification" style="resize: none" rows="5">{{@old('notification')}}</textarea>
                        <div class="form-text text-white bg-danger"><x-input-error :messages="$errors->get('notification')" class="mt-2" /></div>
                    </div>
                    <button type="submit" class="btn btn-danger">Notificar</button>
                </form>
            </div>
        </div>
    </div>
</x-html-admin>