new Vue({
  el: ".vue-candidate",
  created: function () {
    //this.get_general('');
  },
  data: {
    datos: [],
    newKeep: { 
         'name': ''
        ,'first_surname': ''
        ,'second_surname': ''
        ,'correo': ''
        ,'pass': ''
        ,'passwordConfirm': '' 
        ,'confirmed_nss': true
        ,'email': ''
        ,'password': ''
    },
    fillKeep: { 
        'id': ''
        ,'name': ''
        ,'first_surname': ''
        ,'second_surname': ''
        ,'correo': ''
        ,'pass': ''
        ,'passwordConfirm': '' 
        ,'confirmed_nss': true 
        ,'email': ''
        ,'password': ''
    },

  },
  mixins:[mixins],
  methods:{
    
    insertar: function( uri ){
        //se realiza las validaciones de los datos de NSS y CURP
        /*if ( !nssValido(this.newKeep.nss) ) {
            toastr.error( validate ,"NSS Incorrecto" );
            $('#nss').parent().parent().addClass('has-error');
            return;
        }
        if ( !curpValida(this.newKeep.curp) ) {
            toastr.error( validate ,"Curp Incorrecto" );
            $('#curp').parent().parent().addClass('has-error');
            return;
        }*/
        if ( !emailValidate(this.newKeep.correo) ) {
            toastr.error( validate ,"Correo Incorrecto" );
            $('#correo').parent().parent().addClass('has-error');
            return;
        }

        //se manda a llamar la funcion de insertar de vue master_vue.js
        this.insert_general( uri, '' ,function(json){

            $.each(this.newKeep,function(key, value){
                $('#'+key).parent().parent().removeClass('has-error');
            });
            $('#signup').modal('hide');
                redirect( 'details' );

        },function(){
            
            $.each(this.newKeep,function(key, value){
                if (key == "password" || key == "passwordConfirm") {
                    $('#'+key).parent().parent().addClass('has-error');
                }
            });

        });

    },
    inicio_sesion: function(){

        var url = domain("login");
        this.insert_general(url,'',function( obj ){
            redirect( domain('details') );
        },function(){
            $('#email').parent().parent().addClass('has-error');
            $('#password').parent().parent().addClass('has-error');

        });


    }



  }


});