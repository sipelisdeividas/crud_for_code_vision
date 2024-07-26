<x-layout docTitle="Produkto '{{$product->product_name}}'' Redagavimas">

    <div class="container container--narrow">
        <h1 class="mb-4">Redaguoti Produktą</h1>
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="product_name" class="text-muted mb-1"><small>Pavadinimas</small></label>
                <input name="product_name" id="product_name" class="form-control form-control-lg" type="text" value="{{ old('product_name', $product->product_name) }}" />
                @error('product_name')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="mileage" class="text-muted mb-1"><small>Kilometražas</small></label>
                <input name="mileage" id="mileage" class="form-control form-control-lg" type="number" value="{{ old('mileage', $product->mileage) }}" />
                @error('mileage')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="euro_standart" class="text-muted mb-1"><small>Euro Standartas</small></label>
                <input name="euro_standart" id="euro_standart" class="form-control form-control-lg" type="text" value="{{ old('euro_standart', $product->euro_standart) }}" />
                @error('euro_standart')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="year" class="text-muted mb-1"><small>Metai</small></label>
                <input name="year" id="year" class="form-control form-control-lg" type="number" value="{{ old('year', $product->year) }}" />
                @error('year')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="engine_type" class="text-muted mb-1"><small>Variklio Tipas</small></label>
                <input name="engine_type" id="engine_type" class="form-control form-control-lg" type="text" value="{{ old('engine_type', $product->engine_type) }}" />
                @error('engine_type')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="price" class="text-muted mb-1"><small>Kaina</small></label>
                <input name="price" id="price" class="form-control form-control-lg" type="number" value="{{ old('price', $product->price) }}" />
                @error('price')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="description" class="text-muted mb-1"><small>Aprašymas</small></label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                @error('description')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="user_id" class="text-muted mb-1"><small>Vairuotojas</small></label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $product->user_id ? 'selected' : '' }}>{{ $user->username }}</option>
                    @endforeach
                </select>
                @error('user_id')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

            <button title="Produkto Informacijos Atnaujinimas" data-toggle="tooltip" data-placement="bottom" class="btn btn-primary">Atnaujinti</button>
        </form>
    </div>

</x-layout>
