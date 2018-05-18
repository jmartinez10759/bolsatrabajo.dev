<!-- Modal -->
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Editar  Candidatos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
       

      	<form>
		  
		  <div class="form-group col-sm-6">
		    <label for="">Nombre</label>
		    <input type="text" class="form-control"  v-model="fillKeep.name" style="text-transform: uppercase;">
		  </div>

		  <div class="form-group col-sm-6">
		    <label for="">Primer Apellido</label>
		    <input type="text" class="form-control"  v-model="fillKeep.first_surname" style="text-transform: uppercase;">
		  </div>

		  <div class="form-group col-sm-6">
		    <label for="">Segundo Apellido</label>
		    <input type="text" class="form-control"  v-model="fillKeep.second_surname" style="text-transform: uppercase;">
		  </div>

		  <div class="form-group col-sm-6">
		    <label for="">Correo</label>
		    <input type="text" class="form-control"  v-model="fillKeep.email">
		  </div>

		  <div class="form-group col-sm-6">
		    <label for="">Password</label>
		    <input type="password" class="form-control" v-model="fillKeep.password"  style="text-transform: uppercase;">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Telefono</label>
		    <input type="text" class="form-control"  v-model="fillKeep.telefono" style="text-transform: uppercase;">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Codigo Postal</label>
		    <input type="text" class="form-control"  v-model="fillKeep.codigo" maxlength="5">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Direccion</label>
		    <input type="text" class="form-control"  v-model="fillKeep.direccion" style="text-transform: uppercase;">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Curp * </label>
		    <input type="text" class="form-control"  v-model="fillKeep.curp" style="text-transform: uppercase;">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Cargo</label>
		    <input type="text" class="form-control"  v-model="fillKeep.cargo" style="text-transform: uppercase;">
		  </div>
		   <div class="form-group">
		    <label for="">Estado</label>
		    <select class="form-control"  v-model="fillKeep.estados" ></select>
		  </div>
		  <!-- <div class="form-group">
		  	<label >Numero de Seguro Social</label>
            <input id="confirmed_nss" type="checkbox" v-model="fillKeep.confirmed_nss">
		  </div> -->
		  <div class="form-group ">
			  	<label for="">Acerca de </label>
			  	<textarea class="form-control"  v-model="fillKeep.descripcion" ></textarea>
                
          </div>
		
		</form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-info" v-on:click.prevent="update_candidate()">Actualizar</button>
      </div>
    </div>
  </div>

</div>