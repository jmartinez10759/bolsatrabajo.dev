var admin = 1;

new Vue({
  el: ".vue-candidate",
  created: function () {

  },
  data: {
    datos: [],
    newKeep: {
         'name': ''
        //,'first_surname': ''
        ,'correo': ''
        ,'pass': ''
        ,'passwordConfirm': ''
        ,'confirmed_nss': false
        ,'email': ''
        ,'password': ''
        ,'condiciones_site': true
    },
    fillKeep: {
        'id': ''
        ,'name': ''
        //,'first_surname': ''
        ,'correo': ''
        ,'pass': ''
        ,'passwordConfirm': ''
        ,'confirmed_nss': false
        ,'email': ''
        ,'password': ''
        ,'condiciones_site': true
    },

  },
  mixins:[mixins],
  methods:{

    insertar: function(){

        var url = domain("register/insert");
        var refresh = "";
        var correo = this.newKeep.correo.trim().toLowerCase();

        //se realiza la validacion del correo.
        if (this.newKeep.condiciones_site == false) {
            toastr.error( "Favor de aceptar los terminos y condiciones." , "Aviso de Privacidad" );
            return;
        }
        if ( !emailValidate( correo ) ) {
            toastr.error( validate ,"¡Verificar Correo Electronico!" );
            $('#correo').parent().parent().addClass('has-error');
            return;
        }
        //se manda a llamar la funcion de insertar de vue master_vue.js
        this.insert_general( url, refresh ,function( object ){
            $.each(this.newKeep,function(key, value){
                $('#'+key).parent().parent().removeClass('has-error');
            });
            $('#signup').modal('hide');
            //buildSweetAlert(,,'success',3000);
            buildSweetAlertOptions('!Candidato registrado!','¡Favor de revisar su bandeja de entrada de su correo, dando click al enlace que aparece.!',function(){
              $('#signup').modal('show');
            },'success',false,['ACEPTAR','CANCELAR'] );
            //$('#signup').modal('show');
            //redirect( ('details') );
        },function(){

            $.each(this.newKeep,function(key, value){
                if (key == "password" || key == "passwordConfirm") {
                    $('#'+key).parent().parent().addClass('has-error');
                }
            });

        });

    },
    inicio_sesion: function(){

        var url = domain( "login" );
        this.insert_general(url,'',function( object ){
            if ( object.result.id_rol == admin ) {
                redirect( domain('dashboard') );
                return;
            }
            if( object.result.id_rol == 2 ){
                redirect( domain('details') );
                return;
            }

        },function(){
            $('#email').parent().parent().addClass('has-error');
            $('#password').parent().parent().addClass('has-error');

        });


    }

  }


});
