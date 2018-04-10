
mixins = {
  el: "#vue-curriculum",
  created: function () {
    var url = "/cv/show";
    this.get_general(url);
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
        //,'url_cv': ''
    },
    fillKeep: { 
        'id_state': ''
        ,'id_categoria': ''
        ,'email': ''
        ,'email2': ''
        ,'nombre': ''
        ,'puesto': ''
        ,'descripcion': ''
        ,'telefono': ''
        ,'direccion': ''
        //,'url_cv': ''
    },

  },
  methods:{

    insert_detalles: function(){
        
        var url = domain('cv/insert');
        var uri = domain('cv/show');

        for ( var i in this.newKeep){
            this.newKeep[i] = this.datos[i];
        }
        this.insert_general(url,uri,function(json){
          $('#seccion-cv').show('slow');
        },function(json){
          $('#seccion-cv').hide('slow');
        });
    
    },
    insert_study: function(){

      var url = domain('study/insert');
      var uri = domain('cv/show');
      this.newKeep.id_cv        = this.datos.id_cv;
      this.newKeep.escuela      = this.datos.escuela;
      this.newKeep.id_nivel     = this.datos.id_nivel;
      this.newKeep.fecha_inicio = this.datos.fecha_inicio;
      this.newKeep.fecha_final  = this.datos.fecha_final;

       this.insert_general(url,uri,function(json){
          $('#modal-educacion').modal('hide');
        },function(json){
          $('#modal-educacion').modal('hide');
        });



    }


  }


}
