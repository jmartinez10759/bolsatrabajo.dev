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

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="newKeep.name" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="newKeep.email" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="newKeep.password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passwordConfirm" class="col-md-4 control-label">Confirmar Contraseña *</label>

                            <div class="col-md-6">
                                <input id="passwordConfirm" type="password" class="form-control" v-model="newKeep.passwordConfirm" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="curp" class="col-md-4 control-label">Curp *</label>
                            <div class="col-sm-6">
                                <input id="curp" type="text" class="form-control" v-model="newKeep.curp" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="nss" class="col-md-4 control-label">NSS *</label>
                            <div class="col-sm-6">
                                <input id="nss" type="text" class="form-control" v-model="newKeep.nss" required>
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-offset-4">

                                <input id="terminos" type="checkbox" checked="" v-model="newKeep.terminos">
                                <a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">
                                    Terminos y Condiciones
                                </a>
                            </div>
                        </div>



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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>


@endsection

@push('scripts')

<script type="text/javascript">

var inicio = "/register";

mixins = {
  el: "#vue-candidate",
  /*created: function () {
    //this.get_general( inicio );
  },*/
  data: {
    datos: [],
    newKeep: { 
         'name': ''
        ,'email': ''
        ,'password': ''
        , 'passwordConfirm': '' 
        , 'curp': '' 
        , 'nss': '' 
        , 'terminos': '' 
    },
    fillKeep: { 
        'id': ''
        ,'name': '' 
        ,'email': '' 
        ,'password': ''
        ,'passwordConfirm': ''
        ,'curp': ''
        ,'nss': ''
        ,'terminos': ''
    },

  },
  methods:{
    insertar: function( uri ){

        this.insert_general( uri, inicio,function(json){

            $('#password').parent().parent().removeClass('has-error');
            $('#passwordConfirm').parent().parent().removeClass('has-error');

        },function(json){
            
            $('#password').parent().parent().addClass('has-error');
            $('#passwordConfirm').parent().parent().addClass('has-error');

        });
    }
  }
}

</script>
        
@endpush
