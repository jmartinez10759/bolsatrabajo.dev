new Vue({
  el: "#vue-details",
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
      ,'confirmed_nss': ""
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
      ,'confirmed_nss': ""
      ,'photo': ''
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

        var url = domain("details/insert");
        var refresh = domain('details/show');
        for ( var i in this.newKeep){
            this.newKeep[i] = this.datos[i];
        }
        //console.log(this.newKeep);return;
        this.newKeep.photo = $('#url_file').val();
        //console.log(this.newKeep);return;
        if ( this.newKeep.descripcion == "") {
            toastr.error( validate ,"Descripcion Vacia" );
            jQuery('#descripcion').parent().addClass('has-error');
            return;
        }

        if ( !curpValida( convert_letters( this.newKeep.curp,'UPPER') ) ) {
            toastr.error( validate ,"Curp Incorrecto" );
            jQuery('#curp').parent().addClass('has-error');
            return;
        }

        this.insert_general(url, refresh, function( object ){
          jQuery('#upload_cv').show('slow');
          jQuery('#btn_update_candidato').hide();
          jQuery('#btn_editar_candidato').show();
          jQuery('#btn_cancel_candidato').hide();
          var inputs = ['nombre','primer_apellido','segundo_apellido','telefono','codigo','direccion','curp','estados','contraseña','confirmed_nss','descripcion'];
          for (var i = 0; i < inputs.length; i++) {
              jQuery('#'+inputs[i]).attr('disabled',true);
          }

          if( object.result.photo == "images/profile/profile.png" || object.result.photo == null ){

              buildSweetAlertOptions('¿Cargar Foto?','¿Desea cargar foto de su perfil?',function(){
                jQuery('#modal-upload').modal('show');
              },'success',true,['SI','NO']);
          }

        },function(){ });

    },
    insert_nss: function(){

        if (this.newKeep.nss) {
           //se realiza las validaciones de los datos de NSS
            if ( !nssValido(this.newKeep.nss) ) {
                toastr.error( validate ,"NSS Incorrecto" );
                jQuery('#nss').parent().parent().addClass('has-error');
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
    changePage( page ){
        this.pagination.current_page = page;
        var url = domain('details/show');
        var fields = {'page': page};
        this.get_general( url,fields );

    },
    consulta_general: function(){

        var url = domain('details/show');
        var fields = {};
        axios.get(url,fields).then( response => {
          //console.log( response.data.result );return;
          this.datos = response.data.result;
          this.pagination = response.data.result.pagination;
          console.log(this.datos.curp);
          if( !this.datos.curp ){
              jQuery('#upload_photo').hide();
          }else{
             jQuery('#upload_photo').show();
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
      var refresh = domain('details/show');
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
//se realiza la carga de la foto del candidato.
var upload_url = domain('details/upload');
upload_file('',upload_url,1,'.jpg,.png,.jpeg',function( object ){
    //jQuery('#url_file').val( domain( object.result.url_file ) );
    jQuery('#imagen').attr('src',false);
    jQuery('#imagen').attr('src', object.result.photo );
    jQuery('#modal-upload').modal('hide');
    //alert(  domain(object.result.url_file) );
    //redirect( domain('details') );
    //redirect('details');
});

jQuery('#btn_editar_candidato').click(function(){
    jQuery('#btn_update_candidato').show();
    jQuery('#btn_cancel_candidato').show();
    jQuery(this).hide();
    var inputs = ['nombre','primer_apellido','segundo_apellido','telefono','codigo','direccion','curp','estados','contraseña','confirmed_nss','descripcion'];
    for (var i = 0; i < inputs.length; i++) {
        jQuery('#'+inputs[i]).attr('disabled',false);
    }
});

jQuery('#btn_cancel_candidato').click(function(){
    jQuery('#btn_update_candidato').hide();
    jQuery('#btn_editar_candidato').show();
    jQuery(this).hide();
    var inputs = ['nombre','primer_apellido','segundo_apellido','telefono','codigo','direccion','curp','estados','contraseña','confirmed_nss','descripcion'];
    for (var i = 0; i < inputs.length; i++) {
        jQuery('#'+inputs[i]).attr('disabled',true);
    }
});


  jQuery('#btn_update_candidato').hide();
  jQuery('#btn_cancel_candidato').hide();
  jQuery('#btn_editar_candidato').show();
  var inputs = ['nombre','primer_apellido','segundo_apellido','telefono','codigo','direccion','curp','estados','contraseña','confirmed_nss','descripcion'];
  for (var i = 0; i < inputs.length; i++) {
    jQuery('#'+inputs[i]).attr('disabled',true);
  }
