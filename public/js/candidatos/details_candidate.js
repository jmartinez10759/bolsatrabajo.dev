
new Vue({
  el: "#vue-details",
  created: function () {
    var url = 'details/show';
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

        var url = "details/insert";
        var uri = 'details/show';
        for ( var i in this.newKeep){
            this.newKeep[i] = this.datos[i];
        }
        if (this.newKeep.nss) {
           //se realiza las validaciones de los datos de NSS y CURP
            if ( !nssValido(this.newKeep.nss) ) {
                toastr.error( validate ,"NSS Incorrecto" );
                $('#nss').parent().addClass('has-error');
                return;
            }

        }
        if ( !curpValida(this.newKeep.curp) ) {
            toastr.error( validate ,"Curp Incorrecto" );
            $('#curp').parent().addClass('has-error');
            return;
        }

        this.insert_general(url, uri, function( obj ){
          
          $('#upload_cv').show('slow');

        },function( obj ){ });

    }

  }

});