
var inicio = "/home";
mixins = {
  el: "#vue-candidate",
  /*created: function () {
    //this.get_general( inicio );
  },*/
  data: {
    datos: [],
    newKeep: { 
         'name': ''
        ,'first_surname': ''
        ,'second_surname': ''
        ,'curp': '' 
        ,'numero_credito_infonavit': '' 
        ,'correo': ''
        ,'pass': ''
        ,'passwordConfirm': '' 
        ,'nss': '' 
        //,'terminos': true 
    },
    fillKeep: { 
        'id': ''
        ,'name': ''
        ,'first_surname': ''
        ,'second_surname': ''
        ,'curp': '' 
        ,'numero_credito_infonavit': '' 
        ,'correo': ''
        ,'pass': ''
        ,'passwordConfirm': '' 
        ,'nss': '' 
        //,'terminos': true
    },

  },
  methods:{
    
    insertar: function( uri ){

        //se realiza las validaciones de los datos de NSS y CURP
        if ( !nssValido(this.newKeep.nss) ) {
            toastr.error( validate ,"NSS Incorrecto" );
            $('#nss').parent().parent().addClass('has-error');
            return;
        }
        if ( !curpValida(this.newKeep.curp) ) {
            toastr.error( validate ,"Curp Incorrecto" );
            $('#curp').parent().parent().addClass('has-error');
            return;
        }
        //se manda a llamar la funcion de insertar de vue master_vue.js
        this.insert_general( uri, inicio,function(json){

            $.each(this.newKeep,function(key, value){
                $('#'+key).parent().parent().removeClass('has-error');
            });
            $('#signup').modal('hide');
        },function(json){
            
            $.each(this.newKeep,function(key, value){
                if (key == "password" || key == "passwordConfirm") {
                    $('#'+key).parent().parent().addClass('has-error');
                }
            });

        });
    }


  }


}
