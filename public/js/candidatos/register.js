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
        //,'second_surname': ''
        ,'correo': ''
        ,'pass': ''
        ,'passwordConfirm': ''
        ,'confirmed_nss': false
        ,'email': ''
        ,'password': ''
    },
    fillKeep: {
        'id': ''
        ,'name': ''
        //,'first_surname': ''
        //,'second_surname': ''
        ,'correo': ''
        ,'pass': ''
        ,'passwordConfirm': ''
        ,'confirmed_nss': false
        ,'email': ''
        ,'password': ''
    },

  },
  mixins:[mixins],
  methods:{

    insertar: function(){

        var url = domain("register/insert");
        var refresh = "";
        if ( !emailValidate(this.newKeep.correo) ) {
            toastr.error( validate ,"Correo Incorrecto" );
            $('#correo').parent().parent().addClass('has-error');
            return;
        }
        //se manda a llamar la funcion de insertar de vue master_vue.js
        this.insert_general( url, refresh ,function( object ){
            $.each(this.newKeep,function(key, value){
                $('#'+key).parent().parent().removeClass('has-error');
            });
            $('#signup').modal('hide');
            buildSweetAlert('Candidato registrado','Favor de verificar su correo electronico para continuar','success',3000);
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
