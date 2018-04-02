@extends('layouts.app')

@section('content')
<div class="container" id="vue-candidate">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registro de Candidato</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" v-on:submit.prevent="insertar('register/insert')" >
                        {{ csrf_field() }}

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

                        <div class="form-group">
                            <label for="curp" class="col-md-4 control-label">Curp *</label>
                            <div class="col-sm-6">
                                <input id="curp" type="text" class="form-control" v-model="newKeep.curp" required>
                            </div>
                        </div>

                         <div class="form-group">
                            <label for="numero_credito_infonavit" class="col-md-4 control-label">Credito Infonavit *</label>

                            <div class="col-md-6">
                                <input id="numero_credito_infonavit" type="checkbox" v-model="newKeep.numero_credito_infonavit">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Correo *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="newKeep.email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="newKeep.password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passwordConfirm" class="col-md-4 control-label">Confirmar Password *</label>

                            <div class="col-md-6">
                                <input id="passwordConfirm" type="password" class="form-control" v-model="newKeep.passwordConfirm" required>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label for="nss" class="col-md-4 control-label">NSS *</label>
                            <div class="col-sm-6">
                                <input id="nss" type="text" class="form-control" v-model="newKeep.nss" required>
                            </div>
                        </div>

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
                                <button type="submit" class="btn btn-primary">
                                    Registrar Candidato
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h2 class="modal-title">Términos y Condiciones</h2></center>
        </div>
        <div class="modal-body" style="overflow:scroll; height:400px;">
          @include('termino.termino')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"> Cerrar </button>
        </div>
      </div>
      
    </div>
  </div>


@endsection

@push('scripts')
    <script type="text/javascript" src="{{asset('js/candidatos/register.js')}}"></script>
@endpush
