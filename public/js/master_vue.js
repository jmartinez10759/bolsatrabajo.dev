var title       = "Registros Correctos";
var success_mgs = "Registro insertado corretamente.";
var error_mgs   = "Ocurrio un error, Favor de verificar";
var title_error = "Registros Incorrectos";
var update      = "Registro actualizado corretamente.";
var validate    = "Favor de Verificar los campos color Rojo";
var params = {};

new Vue({
    mixins : [mixins],
    methods: {
        get_general: function( url, data ) {
            params = data;
            axios.get(url, params ).then(response => {
                console.log( response.data.result );
                this.datos = response.data.result
            });
        
        },
        edit_general: function( obj ) {
            for ( var i in this.fillKeep){
                this.fillKeep[i] = obj[i];
            }
            $('#edit_form').modal('show');
        
        },
        insert_general: function( uri, url, funcion , errors ) {
            
            axios.post(uri, this.newKeep).then(response => {
                
                if (response.data.success == true) {

                    this.get_general( url );
                    for( var i in this.newKeep ){ 
                        this.newKeep[i] = ""; 
                    }
                    $('#create_form').modal('hide');
                    toastr.success( response.data.message , title );
                    funcion( response.data );

                }else{
                    toastr.error( response.data.message,title_error );
                    errors( response.data );
                }

                

            }).catch(error => {
                toastr.error( error,title_error );
            });
        
        },
        update_general: function( uri,url ) {
            
            axios.put(uri, this.fillKeep).then(response => {

                this.get_general(url);
                for( var i in this.newKeep ){ 
                    this.newKeep[i] = ""; 
                }
                $('#edit_form').modal('hide');
                toastr.info(update,title);

            }).catch(error => {
                
                toastr.error( error, title_error );

            });
        
        },
        delete_general: function( uri ,refresh ,keep ) {

             var url = uri +"/"+keep;
              axios.delete(url).then(response => { //eliminamos
                    
                    this.get_general(refresh); //listamos
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

        }


    }
});