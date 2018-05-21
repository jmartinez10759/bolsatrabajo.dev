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
        ,'escuela': ''
        ,'id_nivel': ''
        ,'fecha_inicio': ''
        ,'fecha_final': ''
        ,'habilidad': ''
        ,'porcentaje': ''
        ,'skill_orden': ''
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
        ,'escuela': ''
        ,'id_nivel': ''
        ,'fecha_inicio': ''
        ,'fecha_final': ''
        ,'habilidad': ''
        ,'porcentaje': ''
        ,'skill_orden': ''
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

  },
  mixins: [mixins],
  methods:{

    insert_detalles: function(){

        var url = domain('cv/insert');
        var uri = domain('cv/show');

        this.newKeep.id_state     = this.datos.id_state;
        this.newKeep.id_categoria = this.datos.id_categoria;
        this.newKeep.email        = this.datos.email;
        this.newKeep.email2       = this.datos.email2;
        this.newKeep.nombre       = this.datos.nombre;
        this.newKeep.puesto       = this.datos.puesto;
        this.newKeep.descripcion  = this.datos.descripcion;
        this.newKeep.telefono     = this.datos.telefono;
        this.newKeep.direccion    = this.datos.direccion;

        this.insert_general(url,uri,function(json){
          $('#seccion-cv').show('slow');
        },function(json){
          $('#seccion-cv').hide('slow');
        });

    },
    insert_study: function(){

      var url = domain('study/insert');
      var refresh = domain('cv/show');
      //setter las propiedades para enviarlas.
      this.newKeep.id_cv        = this.datos.id_cv;
      this.newKeep.escuela      = this.datos.escuela;
      this.newKeep.id_nivel     = this.datos.id_nivel;
      this.newKeep.fecha_inicio = this.datos.fecha_inicio;
      this.newKeep.fecha_final  = this.datos.fecha_final;

       this.insert_general(url,refresh,function(json){
          $('#modal-educacion').modal('hide');
        },function(json){
          $('#modal-educacion').modal('hide');
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
      this.newKeep.jobs_fecha_inicio    = this.datos.jobs_fecha_inicio;
      this.newKeep.jobs_fecha_final     = this.datos.jobs_fecha_final;
      this.newKeep.jobs_jefe_inmediato  = this.datos.jobs_jefe_inmediato;
      this.newKeep.jobs_telefono        = this.datos.jobs_telefono;

       this.insert_general(url,uri,function(json){
          $('#modal-experiencia').modal('hide');
        },function(json){
          $('#modal-experiencia').modal('hide');
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
          $('#modal-skill').modal('hide');
        },function(json){
          $('#modal-skill').modal('hide');
        });

    },
    update_study: function(){

      var url = domain('study/update');
      var uri = domain('cv/show');
      this.update_general( url,uri,'modal-edit-educacion' );

    },
    update_jobs: function(){

      var url = domain('jobs/update');
      var uri = domain('cv/show');
      this.update_general( url,uri,'modal-edit-experiencia' );

    },
    update_skills: function(){

      var url = domain('skills/update');
      var uri = domain('cv/show');
      this.update_general( url,uri,'modal-edit-skill' );

    },
    delete_study( keep ){
      var url = domain('study/delete');
      var uri = domain('cv/show');
      this.delete_general(url,uri, keep.id );

    },
    delete_jobs( keep ){
      var url = domain('jobs/delete');
      var uri = domain('cv/show');
      this.delete_general(url,uri, keep.id );

    },
    delete_skills( keep ){
      var url = domain('skills/delete');
      var uri = domain('cv/show');
      this.delete_general(url,uri, keep.id );

    }


  }


});

/*var empresa = ['BLA','BURO LABORAL MEXICO','CPA VISION', 'BGT SISTEMAS', 'NETZEN', 'INDUSTRIAS IDEAL','PAE MEXICO','INTELEGIS','AGUA DE MEXICO','STO CONSULTING','CESCIJUC','ICSI COMERCIAL'];

autocomplete("jobs_empresa", empresa);
autocomplete("jobs_puesto", empresa);*/
