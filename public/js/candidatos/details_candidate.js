
mixins = {
  el: "#vue-proof",
  created: function () {
    this.newKeep.msg = "me carga correcatmente el vue";
  },
  data: {
    datos: [],
    newKeep: { 
      'msg' : ''
    },
    fillKeep: { 
        
    },

  },
  methods:{    
    foo: function(  ){
        alert(this.newKeep.msg = "hola mundo");
    }

  }

}