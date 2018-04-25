
new Vue({
  el: "#vue-details",
  created: function () {
    this.consulta_general();
    /*var url = domain('details/show');
    this.get_general(url,{});*/
  },
  data: {
    datos: [],
    pagination: {
       'total': 0
      ,'current_page': 0
      ,'per_page': 0
      ,'last_page': 0
      ,'from': 0
      ,'to': 0
    },
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
    offset: 3

  },
  computed: {
    isActived: function() { return this.pagination.current_page; },
    pagesNumber: function() {
      if(!this.pagination.to){
        return [];
      }
      var from = this.pagination.current_page - this.offset; 
      if(from < 1){
        from = 1;
      }
      var to = from + (this.offset * 2); 
      if(to >= this.pagination.last_page){
        to = this.pagination.last_page;
      }
      var pagesArray = [];
      while(from <= to){
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    }
  
  },
  mixins : [mixins],
  methods:{ 

    insert: function(){

        var url = domain("../details/insert");
        var uri = domain('../details/show');
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
        var url = domain("../details/insert/nss");
        var refresh = domain("../details/show");
        this.insert_general(url,refresh,function(obj){
          $('#modal-nss').modal('hide');
        },function(){});

    },
    details_vacantes( data ){
          
        var url = domain("../details/vacante");
        //se mete en localstorage el id de vacante para poder hacer la consulta.
        $myLocalStorage.set('id_vacante', data.id );
        redirect( url );

    },
    changePage( page ){
        this.pagination.current_page = page;
        var url = domain('../details/show');
        var fields = {'page': page};
        this.get_general( url,fields );
    
    },
    consulta_general: function(){
        
        var url = domain('../details/show');
        var fields = {};
        axios.get(url,fields).then(response => {
          this.datos = response.data.result,
          this.pagination = response.data.result.pagination
        });

    }

  }

});