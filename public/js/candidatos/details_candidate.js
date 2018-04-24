
new Vue({
  el: "#vue-details",
  created: function () {
    var url = domain('details/show');
    this.get_general(url,{});
  },
  data: {
    datos: [],
    newKeep: {   
      'cargo': ''
      ,'codigo': ''
      ,'curp': ''
      ,'descripcion': ''
      ,'direccion': ''
      ,'email': ''
      ,'first_surname': ''
      ,'name': ''
      ,'nss': ''
      ,'second_surname': ''
      ,'telefono': ''
      ,'password': ''
      ,'id_state': ''

    },
    fillKeep: { 
       'cargo': ''
      ,'codigo': ''
      ,'curp': ''
      ,'descripcion': ''
      ,'direccion': ''
      ,'email': ''
      ,'first_surname': ''
      ,'name': ''
      ,'nss': ''
      ,'second_surname': ''
      ,'telefono': ''
      ,'password': ''
      ,'id_state': ''
    },

  },
  mixins : [mixins],
  methods:{ 

    insert: function(){

        var url = domain("details/insert");
        var uri = domain('details/show');
        for ( var i in this.newKeep){
            this.newKeep[i] = this.datos[i];
        }

        if ( !curpValida(this.newKeep.curp) ) {
            toastr.error( validate ,"Curp Incorrecto" );
            $('#curp').parent().addClass('has-error');
            return;
        }

        this.insert_general(url, uri, function( obj ){
          
          $('#upload_cv').show('slow');

        },function( obj ){ });

    },
    insert_nss: function(){

        if (this.newKeep.nss) {
           //se realiza las validaciones de los datos de NSS
            if ( !nssValido(this.newKeep.nss) ) {
                toastr.error( validate ,"NSS Incorrecto" );
                $('#nss').parent().parent().addClass('has-error');
                return;
            }
        }else{
          toastr.error( "Debe de ingresar un NSS" ,"NSS Vacio" );
          return;
        }
        var url = domain("details/insert/nss");
        var refresh = domain("details/show");
        this.insert_general(url,refresh,function(obj){
          $('#modal-nss').modal('hide');
        },function(){});



    }

  }

});