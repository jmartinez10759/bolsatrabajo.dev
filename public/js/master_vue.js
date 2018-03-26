var title       = "Registros Correctos";
var success     = "Registro insertado corretamente.";
var error       = "Ocurrio un error, Favor de verificar";
var title_error = "Registros Incorrectos";
var update      = "Registro actualizado corretamente.";

new Vue({
    mixins : [mixins],
    methods: {
        get_general: function( url ) {
            axios.get(url).then(response => {
                //console.log( response.data.tasks );return;
                this.datos = response.data.tasks
            });
        },
        edit_general: function( obj ) {
            for ( var i in this.fillKeep){
                this.fillKeep[i] = obj[i];
            }
            $('#edit_form').modal('show');
        },
        insert_general: function( uri, url ) {

            axios.post(uri, {
                datos: this.newKeep
            }).then(response => {
                
                this.get_general( url );
                for( var i in this.newKeep ){ 
                    this.newKeep[i] = ""; 
                }
                $('#create_form').modal('hide');
                toastr.success( success , title );

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
                swal(update);
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

        }

    }
});