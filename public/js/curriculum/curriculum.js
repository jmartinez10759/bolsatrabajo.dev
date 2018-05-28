new Vue ({
  el: "#vue-curriculum",
  created: function () {
    var url = domain("cv/show");
    this.get_general(url,{});
  },
  data: {
    datos: [],
    newKeep: {
        'id_state': ''
        ,'id_categoria': ''
        ,'email': ''
        ,'email2': ''
        ,'nombre': ''
        ,'puesto': ''
        ,'descripcion': ''
        ,'telefono': ''
        ,'direccion': ''
        ,'id_cv': ''
        //seccion de escuela
        ,'escuela': ''
        ,'id_nivel': ''
        ,'id_categorias_educativas':''
        ,'otros':''
        ,'id_estatus_academico':''
        ,'cedula':''
        ,'fecha_inicio': ''
        ,'fecha_final': ''
        //seccion de skill
        ,'habilidad': ''
        ,'porcentaje': ''
        ,'skill_orden': ''
        //seccion de trabajos
        ,'jobs_empresa' : ''
        ,'jobs_puesto' : ''
        ,'jobs_descripcion': ''
        ,'jobs_orden': ''
        ,'jobs_fecha_inicio': ''
        ,'jobs_fecha_final': ''
        ,'jobs_jefe_inmediato': ''
        ,'jobs_telefono': ''
        //,'url_cv': ''
    },
    fillKeep: {
         'id':''
        ,'id_state': ''
        ,'id_categoria': ''
        ,'email': ''
        ,'email2': ''
        ,'nombre': ''
        ,'puesto': ''
        ,'descripcion': ''
        ,'telefono': ''
        ,'direccion': ''
        ,'id_cv': ''
        //seccion de estudios
        ,'escuela': ''
        ,'id_nivel': ''
        ,'id_categorias_educativas':''
        ,'otra_categoria':''
        ,'id_estatus_academico':''
        ,'cedula':''
        ,'fecha_inicio': ''
        ,'fecha_final': ''
        //seccion de skills
        ,'habilidad': ''
        ,'porcentaje': ''
        ,'skill_orden': ''
        //seccion de trabajos
        ,'jobs_empresa' : ''
        ,'jobs_puesto' : ''
        ,'jobs_descripcion': ''
        ,'jobs_orden': ''
        ,'jobs_fecha_inicio': ''
        ,'jobs_fecha_final': ''
        ,'jobs_jefe_inmediato': ''
        ,'jobs_telefono': ''
        ,'jobs_sucursal' : ''
        //,'url_cv': ''
    },

  },
  mixins: [mixins],
  methods:{

    insert_detalles: function(){

        var url = domain('cv/insert');
        var refresh = domain('cv/show');

        this.newKeep.id_state     = this.datos.id_state;
        this.newKeep.id_categoria = this.datos.id_categoria;
        this.newKeep.email        = this.datos.email;
        this.newKeep.email2       = this.datos.email2;
        this.newKeep.nombre       = this.datos.nombre;
        this.newKeep.puesto       = this.datos.puesto;
        this.newKeep.descripcion  = this.datos.descripcion;
        this.newKeep.telefono     = this.datos.telefono;
        this.newKeep.direccion    = this.datos.direccion;

        this.insert_general( url,refresh,function(json){
          jQuery('#seccion-cv').show('slow');
        },function(json){
          jQuery('#seccion-cv').hide('slow');
        });

    },
    insert_study: function(){
      var url = domain('study/insert');
      var refresh = domain('cv/show');
      //setter las propiedades para enviarlas.
      this.newKeep.id_cv                  = this.datos.id_cv;
      this.newKeep.escuela                = this.datos.escuela;
      this.newKeep.id_nivel               = this.datos.id_nivel;
      this.newKeep.id_categorias_educativas  = this.datos.id_categorias_educativas;
      this.newKeep.otra_categoria         = this.datos.otra_categoria;
      this.newKeep.id_estatus_academico   = this.datos.id_estatus_academico;
      this.newKeep.cedula                 = this.datos.cedula;
      this.newKeep.fecha_inicio           = jQuery('#fecha_inicio').val();
      this.newKeep.fecha_final            = jQuery('#fecha_final').val();


       this.insert_general(url,refresh,function(json){
          buildSweetAlertOptions("¡Registro agregado.!", "¿Desea seguir agregando registros?", function(){
            jQuery('#modal-educacion').modal('hide');
          }, 'success', true );

        },function(json){
          //jQuery('#modal-educacion').modal('hide');
        });

    },
    insert_jobs: function(){

      var url = domain('jobs/insert');
      var uri = domain('cv/show');
      //setter las propiedades para enviarlas.
      this.newKeep.id_cv                = this.datos.id_cv;
      this.newKeep.jobs_empresa         = this.datos.jobs_empresa;
      this.newKeep.jobs_puesto          = this.datos.jobs_puesto;
      this.newKeep.jobs_descripcion     = this.datos.jobs_descripcion;
      this.newKeep.jobs_fecha_inicio    = jQuery('#jobs_fecha_inicio').val();
      this.newKeep.jobs_fecha_final     = jQuery('#jobs_fecha_final').val();;
      this.newKeep.jobs_jefe_inmediato  = this.datos.jobs_jefe_inmediato;
      this.newKeep.jobs_telefono        = this.datos.jobs_telefono;
      this.newKeep.jobs_sucursal        = this.datos.jobs_sucursal;

       this.insert_general(url,uri,function(json){

            buildSweetAlertOptions("¡Registro agregado.!", "¿Desea seguir agregando registros?", function(){
                jQuery('#modal-experiencia').modal('hide');
            }, 'success', true );

        },function(json){
            jQuery('#modal-experiencia').modal('hide');
        });

    },
    insert_skills: function(){

      var url = domain('skills/insert');
      var uri = domain('cv/show');
      //setter las propiedades para enviarlas.
      this.newKeep.id_cv                = this.datos.id_cv;
      this.newKeep.habilidad            = this.datos.habilidad;
      this.newKeep.porcentaje           = this.datos.porcentaje;

       this.insert_general(url,uri,function(json){

          buildSweetAlertOptions("¡Registro agregado.!", "¿Desea seguir agregando registros?", function(){
              jQuery('#modal-skill').modal('hide');
          }, 'success', true );

        },function(json){
          jQuery('#modal-skill').modal('hide');
        });

    },
    update_study: function(){
      var url = domain('study/update');
      var refresh = domain('cv/show');
      var modal = 'modal-edit-educacion';
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
      //this.update_general( url,uri,'modal-edit-educacion' );

    },
    update_jobs: function(){
      var url = domain('jobs/update');
      var refresh = domain('cv/show');
      var modal = 'modal-edit-experiencia';
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
      //this.update_general( url,uri,'modal-edit-experiencia' );

    },
    update_skills: function(){

      var url = domain('skills/update');
      var refresh = domain('cv/show');
      var modal = 'modal-edit-skill';
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
      //this.update_general( url,uri,'modal-edit-skill' );

    },
    delete_study:function( keep ){
      var url = domain('study/delete/'+keep.id);
      var refresh = domain('cv/show');
      axios.get( url, csrf_token ).then(response => {
        this.get_general(refresh, {}, csrf_token ); //listamos
        toastr.success('Registro eliminado correctamente',title); //mensaje

      }).catch(error => {
          toastr.error( error, expired );
      });
      //this.delete_general(url,uri, keep.id );
    },
    delete_jobs:function( keep ){
      var url = domain('jobs/delete/'+keep.id);
      var refresh = domain('cv/show');
      axios.get( url, csrf_token ).then(response => {
        this.get_general(refresh, {}, csrf_token ); //listamos
        toastr.success('Registro eliminado correctamente',title); //mensaje

      }).catch(error => {
          toastr.error( error, expired );
      });
      //this.delete_general(url,uri, keep.id );

    },
    delete_skills:function( keep ){
      var url = domain('skills/delete/'+keep.id);
      var refresh = domain('cv/show');
      axios.get( url, csrf_token ).then(response => {
        this.get_general(refresh, {}, csrf_token ); //listamos
        toastr.success('Registro eliminado correctamente',title); //mensaje

      }).catch(error => {
          toastr.error( error, expired );
      });
      //this.delete_general(url,uri, keep.id );

    }


  }


});

function nivel_academico(obj){
  var $this = jQuery(obj);
  jQuery('.div_otros').hide('slow');
}

function estatus_academico(object){

  var id_estatus_academico = jQuery(object).val();
  if(id_estatus_academico == 4){
      jQuery('.div_cedula').show('slow');
  }else{
      jQuery('.div_cedula').hide('slow');
  }

}

function categorias_educativas(object){

  var $this = jQuery(object);
  var select = jQuery(object).val();
  var options = $this.children();
  for (var i = 0; i < options.length; i++) {
      if( options[i].value == select ){

        if( options[i].innerHTML == "Otro"){
          jQuery('.div_otros').show('slow');
        }else{
          jQuery('.div_otros').hide('slow');
        }

      }
  }

}
