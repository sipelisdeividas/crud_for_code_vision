<header class="header-bar mb-3 border-bottom">

    <div class="container d-flex flex-column flex-md-row align-items-center p-3">
        <img style="width: 55px; height: 50px; margin-right: 5px" src="https://res.cloudinary.com/dp0m5mp1s/image/upload/v1721928411/Tutolis/tutolis-logo_ud5p74.png" />
      <h4 class="my-0 mr-md-auto font-weight-normal"><a href="{{ route('login')}}" class="text-dark">Tutolis Veža</a></h4>

      @auth
      <div class="flex-row my-3 my-md-0">
        <a href="{{ route('login') }}" class="mr-2">
            @if (auth()->user()->is_admin)
            <img title="Mano Paskyra" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://cdn-icons-png.freepik.com/512/6830/6830335.png" />
            @else
            <img title="Mano Paskyra" data-toggle="tooltip" data-placement="bottom" style="width: 32px; height: 32px; border-radius: 16px" src="https://static.vecteezy.com/system/resources/thumbnails/004/975/153/small_2x/driver-color-icon-transportation-service-isolated-illustration-vector.jpg" />
            @endif
        </a>

        @if (auth()->user()->is_admin)
            <a title="Produkto Talpinimas" data-toggle="tooltip" data-placement="bottom" class="btn btn-sm btn-info mr-2" href="{{ route('products.create.form') }}"><i class="fa-solid fa-upload"></i> Talpinti</a>
            <a title="Visi Produktai" data-toggle="tooltip" data-placement="bottom" class="btn btn-sm btn-secondary mr-2" href="{{ route('products.index') }}"><i class="fa-solid fa-truck-front"></i> Produktai</a>
        @endif

        <form action="/logout" method="POST" class="d-inline">
            @csrf
          <button title="Atsijungimas" data-toggle="tooltip" data-placement="bottom" class="btn btn-sm btn-light"><i class="fa-solid fa-right-from-bracket"></i> Atsijungti</button>
        </form>
      </div>

          @else
          <form action="/login" method="POST" class="mb-0 pt-2 pt-md-0">
            @csrf
            <div class="row align-items-center">
              <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                <input name="loginemail" class="form-control form-control-sm input-dark" type="email" placeholder="El. Paštas" autocomplete="off" />
              </div>
              <div class="col-md mr-0 pr-md-0 mb-3 mb-md-0">
                <input name="loginpassword" class="form-control form-control-sm input-dark" type="password" placeholder="Slaptažodis" />
              </div>
              <div class="col-md-auto">
                <button class="btn btn-info btn-sm" title="Prisijungimas Prie Sistemos" data-toggle="tooltip" data-placement="bottom"><i class="fa-solid fa-right-to-bracket"></i> Prisijungti</button>
              </div>
            </div>
          </form>
      @endauth

    </div>
  </header>
