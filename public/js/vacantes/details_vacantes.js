new Vue({
  el: "#vue-datails-offers",
  created: function () {
    var fields  = {
      'id_vacante' : $myLocalStorage.get('id_vacante')
    } 
    var url = domain("details/vacante/show");
    this.get_general( url, fields);
  },
  data: {
    datos: [],
    newKeep: { 
       'terminos_condiciones': false
       ,'curp': ''
       ,'nss' : ''
       ,'confirmed_nss' : ''
       ,'id_vacante' : ''
    },
    fillKeep: { 
      'terminos_condiciones': false
      ,'curp': ''
      ,'nss' : ''
      ,'confirmed_nss' : ''
      ,'id_vacante' : ''
    },

  },
  mixins:[mixins],
  methods:{
    busqueda_vacantes: function( fields ){
        console.log(this.datos);
    },
    postulacion: function(){

      this.newKeep.curp           = this.datos.curp;
      this.newKeep.nss            = this.datos.nss;
      this.newKeep.confirmed_nss  = this.datos.confirmed_nss;
      this.newKeep.id_vacante     = $myLocalStorage.get('id_vacante');
      
      if (this.newKeep.terminos_condiciones == false) {
          toastr.error( "Debe de aceptar los terminos y condiciones para continuar." , "Terminos y Condiciones" );
          return;
      }
      if (this.newKeep.confirmed_nss == null) {
        toastr.error( "Favor de Iniciar Sesion, para poder postularte a esta vacante" , "Sesion Expirada" );
        return;
      }
      if (this.newKeep.curp == null) {
         toastr.error( "CURP es un dato obligatorio para solicitar la vacante" , "Verificar CURP" );
          return;
      }
      if ( this.newKeep.confirmed_nss == 1 && this.newKeep.nss == null) {
        toastr.error( "NSS es un dato obligatorio para solicitar la vacante" , "Verificar NSS" );
          return; 
      }
      /*se realiza la inserccion de los datos para la postulacion.*/
        var url = domain("postulacion/insert");
        var uri = "";
        this.insert_general(url,uri,function(obj){
            
        },function(){});


    }




  }


});