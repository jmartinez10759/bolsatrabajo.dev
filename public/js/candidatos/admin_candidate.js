new Vue({
  el: ".vue_candidate_admin",
  created: function () {
    this.consulta_general();
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
      ,'confirmed_nss': false
      ,'photo': ''

    },
    fillKeep: {
        'id':''
      ,'cargo': ''
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
      ,'confirmed_nss': false
      ,'photo': ''
    },
    offset: 4
  },
  mixins : [mixins],
  methods:{

    insert_candidate: function(){

        var url = domain("candidate/insert");
        var refresh = domain('candidate/show');
        if ( !curpValida( convert_letters( this.newKeep.curp,'UPPER') ) ) {
            toastr.error( validate ,"Curp Incorrecto" );
            $('#curp').parent().addClass('has-error');
            return;
        }
        //setter los datos.
        this.newKeep.id_state = this.datos.id_state;

        this.insert_general(url, refresh, function( object ){
            jQuery('#modal_insert').modal('hide');
        },function(){ });

    },
    update_candidate: function(){

      var url = domain("candidate/update");
      var refresh = domain("candidate/show");
      var modal = 'modal_update';
      axios.post(url, this.fillKeep, csrf_token ).then(response => {
          this.get_general(refresh,{}, csrf_token );
          for( var i in this.newKeep ){
              this.newKeep[i] = "";
          }
          jQuery('#'+modal).modal('hide');
          toastr.info(update,title);
      }).catch(error => {
          toastr.error( error, expired );
      });
      //this.update_general(url,refresh,'modal_update');

    },
    destroy_candidate: function( keep ){

      var url = domain("candidate/destroy/"+keep.id);
      var refresh = domain("candidate/show");
      axios.get( url, csrf_token ).then(response => {
        this.get_general(refresh, {}, csrf_token ); //listamos
        toastr.success('Registro eliminado correctamente',title); //mensaje

      }).catch(error => {
          toastr.error( error, expired );
      });
      //this.delete_general(url,refresh,keep.id);

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
          toastr.error( "¡Debe de ingresar un NSS!" ,"NSS Vacio" );
          return;
        }
        var url = domain("nss/insert");
        var refresh = domain("details/show");
        this.insert_general(url,refresh,function(obj){
          $('#modal-nss').modal('hide');
        },function(){});

    },
    details_vacantes( data ){

        var url = domain("details/vacante");
        //se mete en localstorage el id de vacante para poder hacer la consulta.
        $myLocalStorage.set('id_vacante', data.id );
        redirect( url );

    },
    change_page( page ){
        this.pagination.current_page = page;
        var url = domain('candidate/show');
        var fields = {'page': page};
        this.get_general( url,fields );

    },
    consulta_general: function(){

        var url = domain('candidate/show');
        var fields = {};
        axios.get(url,fields).then( response => {

          if( response.data.success == true){
            this.datos = response.data.result;
            this.pagination = response.data.result.pagination;
            console.log( this.datos );
          }else{
              toastr.error( response.data.message, "Ningun Registro Encontrado" );
          }

        });

    },
    edit_nss: function( fields ){

        this.edit_general( fields,'modal-nss-edit' );

    },
    destroy_nss: function( fields ){
        var url = domain('nss/detele/'+fields.id);
        var refresh =  domain('details/show');
        axios.get( url, csrf_token ).then(response => {
          this.get_general(refresh, {}, csrf_token ); //listamos
          toastr.success('Registro eliminado correctamente',title); //mensaje

        }).catch(error => {
            toastr.error( error, expired );
        });
        //this.delete_general(url,refresh,fields.id);

    },
    update_nss: function(){
      var url = domain('nss/update');
      var uri = domain('details/show');
      var modal = 'modal-nss-edit';
      axios.post(url, this.fillKeep, csrf_token ).then(response => {
          this.get_general(refresh,{}, csrf_token );
          for( var i in this.newKeep ){
              this.newKeep[i] = "";
          }
          $('#'+modal).modal('hide');
          toastr.info(update,title);
      }).catch(error => {
          toastr.error( error, expired );
      });
      //this.update_general(url,uri,'modal-nss-edit');

    }

  }

});
