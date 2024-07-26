<x-layout docTitle='Produktai'>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Visi Produktai</h1>

            @if($products->isNotEmpty())
                <form action="{{ route('products.deleteAll') }}" method="POST" onsubmit="return confirm('Ar tikrai norite ištrinti visus produktus?');">
                    @csrf
                    @method('DELETE')
                    <button title="Pašalinti Visus Produktus" data-toggle="tooltip" data-placement="bottom" type="submit" class="btn btn-sm btn-danger">Šalinti produktus</button>
                </form>
            @endif

        </div>

        @if($products->isEmpty())
            <div class="alert alert-info" role="alert">
                Nėra jokių produktų.
            </div>
        @else
            <div class="table-responsive">
                <table id="products-table" class="display table table-bordered">
                    <thead>
                        <tr>
                            <th>Pavadininas</th>
                            <th>Aprašymas</th>
                            <th>Kilometražas</th>
                            <th>Euro Standartas</th>
                            <th>Metai</th>
                            <th>Variklio Tipas</th>
                            <th>Kaina</th>
                            <th>Vairuotojas</th>
                            <th>Veiksmai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->mileage }}</td>
                                <td>{{ $product->euro_standart }}</td>
                                <td>{{ $product->year }}</td>
                                <td>{{ $product->engine_type }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->user ? $product->user->username : 'Nepriskirta' }}</td>
                                <td>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Ar tikrai norite pašalinti šį produktą?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-2"><i title="Pašalinti Produktą" data-toggle="tooltip" data-placement="bottom" class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('products.edit.form', $product->id) }}" class="btn btn-sm btn-dark"><i title="Redaguoti Produktą" data-toggle="tooltip" data-placement="bottom" class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

</x-layout>
