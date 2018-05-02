new Vue ({
  el: "#vue-password",
  created: function () {
  },
  data: {
    datos: [],
    newKeep: { 
        'correo': ""
    },
    fillKeep: {
    	'correo': ""
    },

  },
  mixins : [mixins],
  methods:{

  	reset_password: function(){

  		if ( !emailValidate( this.newKeep.correo ) ) {
            toastr.error( validate ,"Correo Incorrecto" );
            $('#emails').parent().parent().addClass('has-error');
            return;
        }
        var url = domain("../password/verify");
        var refresh = domain("../password/request");
        this.insert_general(url,refresh,function( object ){
        	$('#signup').modal('show');
        },function(){});


  	}

  }


});
