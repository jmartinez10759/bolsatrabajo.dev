var title       = "Registros Correctos";
var success_mgs = "Registro insertado corretamente.";
var error_mgs   = "Ocurrio un error, Favor de verificar";
var title_error = "Registros Incorrectos";
var update      = "Registro actualizado corretamente.";
var validate    = "Favor de Verificar los campos color Rojo";
var expired     = "Ocurrio un Error, Favor de Verificar";
//var csrf_token  = { 'X-CSRF-TOKEN': document.getElementsByTagName("META")['3'].content }
var _method     = 'ORIGIN';
var csrf_token  = { 'X-CSRF-TOKEN': meta('csrf-token'),'Access-Control-Request-Method':_method };
var _token      = csrf_token[ Object.keys( csrf_token )[0] ];
var params = {};
var mixins = {
    //mixins : [mixins],
    methods: {

        get_general: function( url, fields ) {

            axios.get( url, { params: fields }, csrf_token ).then(response => {
                console.log( response.data.result );
                if( response.data.success == true ){
                  this.datos = response.data.result;
                }else{
                    //toastr.error( response.data.message, "Ningun Registro Encontrado" );
                }

            }).catch(error => {
                toastr.error( error, expired );
            });

        },
        edit_general: function( obj, modal ) {

            console.log(obj);
            for ( var i in this.fillKeep){
                this.fillKeep[i] = obj[i];
            }
            jQuery('#'+modal).modal('show');

        },
        insert_general: function( uri, url, function_success , function_errors ) {

            axios.post(uri, this.newKeep, csrf_token ).then(response => {

                if (response.data.success == true) {

                    this.get_general( url, params, csrf_token );
                    for( var i in this.newKeep ){
                        this.newKeep[i] = "";
                    }
                    jQuery('#create_form').modal('hide');
                    toastr.success( response.data.message , title );
                    function_success( response.data );

                }else{
                    toastr.error( response.data.message,title_error );
                    function_errors();
                }


            }).catch(error => {
                toastr.error( error,expired );
            });

        },
        update_general: function( uri, url, modal ) {

            axios.put(uri, this.fillKeep, csrf_token ).then(response => {

                this.get_general(url,params, csrf_token );
                for( var i in this.newKeep ){
                    this.newKeep[i] = "";
                }
                jQuery('#'+modal).modal('hide');
                toastr.info(update,title);

            }).catch(error => {

                toastr.error( error, expired );

            });

        },
        delete_general: function( uri ,refresh ,keep ) {

              var url = uri +"/"+keep;
              axios.delete(url, params, csrf_token).then(response => { //eliminamos

                    this.get_general(refresh, params, csrf_token ); //listamos
                    toastr.success('Registro eliminado correctamente',title); //mensaje

                }).catch(error => {
                    toastr.error( error, expired );
                });

        },
        validate_form: function(){

            $.each(this.newKeep,function(key, value){
                if (value == "" || value == false) {
                    jQuery('#'+key).parent().parent().addClass('has-error');
                    return;
                }
            });

        },
        show_general: function( url, fields, function_success, function_errors){

            axios.get( url, { params: fields }, csrf_token ).then( response => {
                console.log( response.data.result );
                if (response.data.success == true) {
                    function_success(response.data.result);
                }else{
                    function_errors();
                }

            }).catch(error => {
                toastr.error( "Favor de Iniciar Sesion, para continuar.", expired );
            });

        }

    }
};

/*

new Vue = ({
  el: "#vue-curriculum",
  created: function () {
    this.get_general();
  },
  data: {
    datos: [],
    newKeep: {

    },
    fillKeep: {

    },

  },
  mixins : [mixins],
  methods:{

  }


});

*/
