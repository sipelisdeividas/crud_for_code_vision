<x-layout>
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    @if (auth()->user()->is_admin)
                    <img src="https://cdn-icons-png.freepik.com/512/6830/6830335.png" title="{{(auth()->user()->username)}}" data-toggle="tooltip" data-placement="bottom" alt="{{auth()->user()->username}}" class="rounded-circle" width="150">
                    @else
                    <img src="https://static.vecteezy.com/system/resources/thumbnails/004/975/153/small_2x/driver-color-icon-transportation-service-isolated-illustration-vector.jpg" title="{{(auth()->user()->username)}}" data-toggle="tooltip" data-placement="bottom" alt="{{auth()->user()->username}}" class="rounded-circle" width="150">
                    @endif
                    <div class="mt-3">
                      <h4>{{ auth()->user()->username }}</h4>
                      <h5 class="text-secondary mb-1">
                        <span class="badge badge-info">{{ auth()->user()->isAdmin ? 'Administratorius' : 'Vairuotojas' }}</span>
                    </h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">{{ auth()->user()->isAdmin ? 'Administratoriaus' : 'Vairuotojo' }} Vardas</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->username }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">El. Paštas</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Priklausančio Vilkiko ID</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       {{ auth()->user()->product_id }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Priklausančio Vilkiko Pavadinimas</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        {{ auth()->user()->product->product_name ?? "" }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</x-layout>
