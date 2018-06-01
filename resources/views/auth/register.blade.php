<!-- <div class="vue-candidate"> -->

        <form class="form-horizontal">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nombre Completo <font size="3" color="red">*</font> </label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" v-model="newKeep.name" required autofocus style="text-transform: uppercase;">
                </div>
            </div>

            <div class="form-group">
                <label for="correo" class="col-md-4 control-label">Correo <font size="3" color="red">*</font></label>

                <div class="col-md-6">
                    <input id="correo" type="email  " class="form-control" v-model="newKeep.correo" required style="text-transform: lowercase;">
                </div>
            </div>

            <div class="form-group">
                <label for="pass" class="col-md-4 control-label">Contraseña <font size="3" color="red">*</font> </label>
                <a style="cursor:pointer;" title="Mostrar Contraseña" onclick="passUnmask('#pass',this)"><i class="fa fa-eye"></i></a>
                <div class="col-md-6">
                    <input id="pass" type="password" class="form-control" v-model="newKeep.pass" required>
                </div>
            </div>
            <!-- <div class="form-group">
              <label class="control-label">de 6 a 12 caracteres</label>
              <label class="control-label">al menos un número</label>
              <label class="control-label">una letra (sensible a mayúsculas)</label>
            </div> -->

            <div class="form-group">
                <label for="passwordConfirm" class="col-md-4 control-label">Confirmar Contraseña <font size="3" color="red">*</font> </label>
                <a style="cursor:pointer;" title="Mostrar Contraseña" onclick="passUnmask('#passwordConfirm',this)"><i class="fa fa-eye"></i></a>
                <div class="col-md-6">
                    <input id="passwordConfirm" type="password" class="form-control" v-model="newKeep.passwordConfirm" required>
                </div>
            </div>

            <div class="form-group pull-right">
              <div class="col-sm-offset-7">
                <font color="red" size="5">*</font> Campos Obligatorios
              </div>
            </div>

            <div class="form-group">

              <div class="col-sm-offset-2">
                <input id="condiciones_site" type="checkbox" v-model="newKeep.condiciones_site">
                <a href="{{ asset('condiciones') }}"  style="cursor: pointer;" target="_blank">
                  Al hacer clic en REGISTRAR CANDIDATO, aceptas las Condiciones de uso y la Política de privacidad.
                </a>

              </div>
            </div>


            <div class="form-group" style="display: none">
                <label class="col-md-4 control-label">¿Cuenta con NSS ?</label>
                <div class="col-md-6">
                    <input id="confirmed_nss" type="checkbox" v-model="newKeep.confirmed_nss">
                </div>
            </div>

            <!-- <div class="form-group">
                <label for="nss" class="col-md-4 control-label">NSS *</label>
                <div class="col-sm-6">
                    <input id="nss" type="text" class="form-control" v-model="newKeep.nss" required>
                </div>
            </div> -->

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="button" class="btn btn-primary" v-on:click.prevent="insertar()">
                        Registrar Candidato
                    </button>
                </div>
            </div>
    </form>

<!-- seccion de modal -->

<!-- </div> -->
@push('scripts')
    <script type="text/javascript" src="{{asset('js/candidatos/register.js')}}" ></script>
@endpush
