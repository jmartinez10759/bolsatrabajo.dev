mixins = {
  el: "#vue-datails-offers",
  created: function () {
    var fields  = {
      'id_vacante' : $myLocalStorage.get('id_vacante')
    } 
    var url = "/details/vacante/show";
    this.get_general( url, fields);
  },
  data: {
    datos: [],
    newKeep: { 
       'terminos_condiciones': false
       ,'curp': ''
       ,'nss' : ''
    },
    fillKeep: { 
      'curp': ''
      ,'nss' : ''
    },

  },
  methods:{
    busqueda_vacantes: function( fields ){
        console.log(this.datos);
    },
    postulacion: function(){

      var url = "/details/show";

      if (this.newKeep.terminos_condiciones == false) {
          toastr.error( "Debe de aceptar los terminos y condiciones para continuar." , "Terminos y Condiciones" );
          return;
      }
      
      this.show_general( url, {},function( obj ){

          if (obj.curp == null) {
             toastr.error( "CURP es un dato obligatorio para solicitar la vacante" , "Verificar CURP" );
              return;
          }
          if ( obj.confirmed_nss == 1 && obj.nss == null) {
            toastr.error( "NSS es un dato obligatorio para solicitar la vacante" , "Verificar NSS" );
              return; 
          }
          /*se realiza la inserccion de los datos para la postulacion.*/

          alert('Se estan registrando su vacante, por favor espere.....');



      },function(){
        
      });


    }




  }


}