var title       = "Registros Correctos";
var success_mgs = "Registro insertado corretamente.";
var error_mgs   = "Ocurrio un error, Favor de verificar";
var title_error = "Registros Incorrectos";
var update      = "Registro actualizado corretamente.";
var validate    = "Favor de Verificar los campos color Rojo";
var csrf_token  = { 'X-CSRF-TOKEN': document.getElementsByTagName("META")['3'].content }
var params = {};

new Vue({
    mixins : [mixins],
    methods: {

        get_general: function( url, fields ) {
            
            axios.get( url, { params: fields }, csrf_token ).then(response => {
                console.log( response.data.result );
                this.datos = response.data.result;
            }).catch(error => {
                toastr.error( error, title_error );
            });
        
        },
        edit_general: function( obj, modal ) {

            console.log(obj);
            for ( var i in this.fillKeep){
                this.fillKeep[i] = obj[i];
            }
            $('#'+modal).modal('show');
        
        },
        insert_general: function( uri, url, function_success , function_errors ) {
            
            axios.post(uri, this.newKeep, csrf_token ).then(response => {
                
                if (response.data.success == true) {

                    this.get_general( url, params );
                    for( var i in this.newKeep ){ 
                        this.newKeep[i] = ""; 
                    }
                    $('#create_form').modal('hide');
                    toastr.success( response.data.message , title );
                    function_success( response.data );

                }else{
                    toastr.error( response.data.message,title_error );
                    function_errors( response.data );
                }


            }).catch(error => {
                toastr.error( error,title_error );
            });
        
        },
        update_general: function( uri, url, modal ) {
            
            axios.put(uri, this.fillKeep, csrf_token ).then(response => {

                this.get_general(url,params, csrf_token );
                for( var i in this.newKeep ){ 
                    this.newKeep[i] = ""; 
                }
                $('#'+modal).modal('hide');
                toastr.info(update,title);

            }).catch(error => {
                
                toastr.error( error, title_error );

            });
        
        },
        delete_general: function( uri ,refresh ,keep ) {
             
              var url = uri +"/"+keep;
              axios.delete(url, params, csrf_token).then(response => { //eliminamos
                    
                    this.get_general(refresh, params ); //listamos
                    toastr.success('Registro eliminado correctamente',title); //mensaje

                }).catch(error => {
                    toastr.error( error, title_error );
                });

        },
        validate_form: function(){

            $.each(this.newKeep,function(key, value){
                if (value == "" || value == false) {
                    $('#'+key).parent().parent().addClass('has-error');
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
                toastr.error( error, title_error );
            }); 
        }

    }
});

/*

mixins = {
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
  methods:{

  }


}

*/