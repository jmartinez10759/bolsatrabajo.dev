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
                            <label for="name" class="col-md-4 control-label">Nombre</label>

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
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

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
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="passwordConfirm" type="password" class="form-control" v-model="newKeep.passwordConfirm" required>
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
    },
    fillKeep: { 
        'id': ''
        ,'name': '' 
        ,'email': '' 
        ,'password': ''
        ,'passwordConfirm': ''
    },

  },
  methods:{
    insertar: function( uri ){

        this.insert_general( uri, inicio,function(json){

            console.log(json.data);

        },function(json){
            
            $('#password').parent().parent().addClass('has-error');
            $('#passwordConfirm').parent().parent().addClass('has-error');

        });
    }
  }
}

</script>
        
@endpush
