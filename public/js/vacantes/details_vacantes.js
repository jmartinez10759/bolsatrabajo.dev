mixins = {
  el: "#vue-datails-offers",
  created: function () {
    var fields  = {
      'id_vacante' : $myLocalStorage.get('id_vacante')
    } 
    var url = "/details/vacante/show";
    this.get_general( url, fields);
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