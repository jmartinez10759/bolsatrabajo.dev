<!-- <div class="vue-candidate"> -->

        <form class="form-horizontal">

            <div class="form-group">
                <label for="name" class="col-md-4 control-label">Nombre *</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" v-model="newKeep.name" required autofocus>
                </div>
            </div>

             <div class="form-group">
                <label for="first_surname" class="col-md-4 control-label">Primer Apellido *</label>

                <div class="col-md-6">
                    <input id="first_surname" type="text" class="form-control" v-model="newKeep.first_surname" required autofocus>
                </div>
            </div>

             <div class="form-group">
                <label for="second_surname" class="col-md-4 control-label">Segundo Apellido</label>

                <div class="col-md-6">
                    <input id="second_surname" type="text" class="form-control" v-model="newKeep.second_surname">
                </div>
            </div>
            <!-- <div class="form-group">
                <label for="curp" class="col-md-4 control-label">Curp *</label>
                <div class="col-sm-6">
                    <input id="curp" type="text" class="form-control" v-model="newKeep.curp" required>
                </div>
            </div> -->
            <div class="form-group">
                <label for="correo" class="col-md-4 control-label">Correo *</label>

                <div class="col-md-6">
                    <input id="correo" type="email  " class="form-control" v-model="newKeep.correo" required>
                </div>
            </div>

            <div class="form-group">
                <label for="pass" class="col-md-4 control-label">Password *</label>

                <div class="col-md-6">
                    <input id="pass" type="password" class="form-control" v-model="newKeep.pass" required>
                </div>
            </div>

            <div class="form-group">
                <label for="passwordConfirm" class="col-md-4 control-label">Confirmar Password *</label>

                <div class="col-md-6">
                    <input id="passwordConfirm" type="password" class="form-control" v-model="newKeep.passwordConfirm" required>
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

            <!-- <div class="form-group">

                <div class="col-sm-offset-4">

                    <input id="terminos" type="checkbox" v-model="newKeep.terminos">
                    <a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
                        Terminos y Condiciones
                    </a>
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

<!-- </div> -->
@push('scripts')
    <script type="text/javascript" src="{{asset('js/candidatos/register.js')}}" ></script>
@endpush
