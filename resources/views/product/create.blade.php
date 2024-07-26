<x-layout docTitle='Produkto Pridėjimas'>

    <div class="container container--narrow">
        <h1 class="mb-4">Produkto Pridėjimas</h1>
        <form action="/products" method="POST">
            @csrf

            <div class="form-group">
                <label for="user_id" class="text-muted mb-1"><small>Vairuotojas</small></label>
                <select name="user_id" id="user_id" class="form-control form-control-lg form-control-select">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" class="h5">{{ $user->username }}</option>
                    @endforeach
                </select>
                @error('user_id')
                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                @enderror
            </div>

          <div class="form-group">
            <label for="product_name" class="text-muted mb-1"><small>Pavadinimas</small></label>
            <input name="product_name" value="{{old('product_name')}}" id="product_name" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('product_name')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="mileage" class="text-muted mb-1"><small>Kilometražas</small></label>
            <input name="mileage" value="{{old('mileage')}}" id="mileage" class="form-control form-control-lg form-control-title" type="number" placeholder="" autocomplete="off" />
            @error('mileage')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="euro_standart" class="text-muted mb-1"><small>Euro Standartas</small></label>
            <input name="euro_standart" value="{{old('euro_standart')}}" id="euro_standart" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('euro_standart')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="year" class="text-muted mb-1"><small>Metai</small></label>
            <input name="year" value="{{old('year')}}" id="year" class="form-control form-control-lg form-control-title" type="number" placeholder="" autocomplete="off" />
            @error('year')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
        </div>

          <div class="form-group">
            <label for="engine_type" class="text-muted mb-1"><small>Variklio Tipas</small></label>
            <input name="engine_type" value="{{old('engine_type')}}" id="engine_type" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('engine_type')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
          </div>

          <div class="form-group">
            <label for="price" class="text-muted mb-1"><small>Kaina</small></label>
            <input name="price" value="{{old('price')}}" id="price" class="form-control form-control-lg form-control-title" type="number" placeholder="" autocomplete="off" />
            @error('price')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
        </div>

          <div class="form-group">
            <label for="description" class="text-muted mb-1"><small>Aprašymas</small></label>
            <textarea name="description" id="description" class="body-content tall-textarea form-control" type="text">
                {{old('description')}}
            </textarea>
            @error('description')
            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
            @enderror
        </div>

          <button title="Naujo Produkto Sukūrimas" data-toggle="tooltip" data-placement="bottom" class="btn btn-success">Pridėti Naują Produktą</button>
        </form>
      </div>

</x-layout>
