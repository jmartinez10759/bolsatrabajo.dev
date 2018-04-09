
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
    
    }

  }


}
