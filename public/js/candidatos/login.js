var inicio = "home";
mixins = {
  el: "#vue-login",
  /*created: function () {
    //this.get_general( inicio );
  },*/
  data: {
    datos: [],
    newKeep: { 
        'email': ''
        ,'password': ''
    },
    fillKeep: { 
        'email': '' 
        ,'password': ''
    },

  },
  methods:{

    inicio_sesion: function( uri, inicio ){
        this.insert_general(uri,inicio,function(response){},function(response){});
    }

  }


}
