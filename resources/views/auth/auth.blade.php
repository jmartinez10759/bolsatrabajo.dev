    <form class="form-horizontal" method="POST" v-on:submit.prevent="inicio_sesion()">

        <div class="form-group">
            <label for="email" class="col-md-4 control-label">Correo:</label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" required autofocus v-model="newKeep.email">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-md-4 control-label">Contraseña:</label>
            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" required v-model="newKeep.password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-7 col-md-offset-3">
                <button type="submit" class="btn btn-primary">
                    Inicio Sesion
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Olvido su Contraseña?
                </a>
            </div>
        </div>

    </form>


@push('scripts')

@endpush
