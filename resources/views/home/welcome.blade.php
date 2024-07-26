<x-layout>

    <div>

        <div class="row align-items-center">
            <div class="col-lg-7 py-3 py-md-5">
                <h1 class="display-3">Tutolis Veža</h1>
                <p class="lead text-muted">Pervežimų įmonės aplikacija, skirta sunkvežimių pridėjimui ir jų priskyrimui atitinkamam darbuotojui.</p>
            </div>

            <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
                <form action="/register" method="POST" id="registration-form">
                    @csrf
                    <div class="form-group">
                        <label for="username-register" class="text-muted mb-1"><small>Vairuotojo Vardas</small></label>
                        <input name="username" value="{{old('username')}}" id="username-register" class="form-control" type="text"
                            placeholder="Įveskite vairuotojo vardą" autocomplete="off" />
                            @error('username')
                                <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="email-register" class="text-muted mb-1"><small>El. Paštas</small></label>
                        <input name="email" value="{{old('email')}}" id="email-register" class="form-control" type="text"
                            placeholder="tutolis.veza@pavyzdys.com" autocomplete="off" />
                            @error('email')
                            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-register" class="text-muted mb-1"><small>Slaptažodis</small></label>
                        <input name="password" id="password-register" class="form-control" type="password"
                            placeholder="Sukurkite slaptažodį" />
                            @error('password')
                            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-register-confirm" class="text-muted mb-1"><small>Slaptažodžio
                                Patvirtinimas</small></label>
                        <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password"
                            placeholder="Patvirtinkite slaptažodį" />
                            @error('password_confirmation')
                            <p class="m-0 small alert alert-danger shadow-sm">{{ $message }}</p>
                            @enderror
                    </div>

                    <button title="Registracija Prie Sistemos" data-toggle="tooltip" data-placement="bottom" type="submit" class="py-3 mt-4 btn btn-lg btn-info btn-block">Registruotis</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
