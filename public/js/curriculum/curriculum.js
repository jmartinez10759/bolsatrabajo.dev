mixins = {
  el: "#vue-curriculum",
  created: function () {
    var url = "/cv/show";
    this.get_general(url);
    
  },
  data: {
    datos: [],
    newKeep: { 
        
    },
    fillKeep: { 

    },

  },
  methods:{

  }


}
