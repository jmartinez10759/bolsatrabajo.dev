 <!-- Sign Up Window Code -->
    <div class="modal fade" id="modal-edit-educacion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Educación</h4>
			    </div>

                <div class="modal-body ">

                   	<form class="form-horizontal" >
						  <div class="form-group">
						    <label class="control-label col-sm-2">Escuela</label>
						    <div class="col-sm-10">
						      <input type="text" id="escuela" class="form-control" placeholder="Nombre de la escuela" v-model="fillKeep.escuela">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" >Nivel Academico</label>
						    <div class="col-sm-10">
						      <select class="form-control" v-model="fillKeep.id_nivel">
						      	 <option v-for="nivel in datos.niveles" :value="nivel.id">@{{nivel.nombre}}</option>
						      </select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2" >Fecha Inicio</label>
						    <div class="col-sm-4">
						      <input type="text" id="fecha_inicio" class="form-control" placeholder="" v-model="fillKeep.fecha_inicio">
						    </div>
						    <label class="control-label col-sm-2" >Fecha Final</label>
						    <div class="col-sm-4">
						      <input type="text" id="fecha_final" class="form-control" placeholder="" v-model="fillKeep.fecha_final">
						    </div>
						  </div>

					</form> 


                </div>

                <div class="modal-footer">
			        <button type="button" class="btn btn" v-on:click.prevent="update_study()" >Actualizar</button>
			        <button type="button" class="btn btn" data-dismiss="modal">Cancelar</button>
			    </div>

            </div>
        </div>
    </div>   
    <!-- End Sign Up Window -->

<!-- Sign Up Window Code -->
<div class="modal fade" id="modal-edit-experiencia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Experiencia</h4>
		    </div>

            <div class="modal-body ">
               	
               	<form class="form-horizontal" >
					  <div class="form-group">
					    <label class="control-label col-sm-2" >Empresa</label>
					    <div class="col-sm-10">
					      <input type="text" name="jobs_empresa" class="form-control" placeholder="Nombre de la Empresa" v-model="fillKeep.jobs_empresa">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-2" >Puesto</label>
					    <div class="col-sm-10">
					      <input type="text" name="jobs_puesto" class="form-control" placeholder="Puesto Desempeñado" v-model="fillKeep.jobs_puesto">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-2" >Fecha Inicio</label>
					    <div class="col-sm-4">
					      <input type="text" name="jobs_fecha_inicio" class="form-control" placeholder="" v-model="fillKeep.jobs_fecha_inicio">
					    </div>
					    <label class="control-label col-sm-2" >Fecha Final</label>
					    <div class="col-sm-4">
					      <input type="text" name="jobs_fecha_inicio" class="form-control" placeholder="" v-model="fillKeep.jobs_fecha_final">
					    </div>
					  </div>

					   <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Notas</label>
					    <div class="col-sm-10">
					      <textarea class="form-control" name="jobs_descripcion" placeholder="Notas" v-model="fillKeep.jobs_descripcion"></textarea>
					    </div>
					  </div>
					  
				</form> 

            </div>

            <div class="modal-footer">
		        <button type="button" class="btn btn" v-on:click.prevent="update_jobs()">Actualizar</button>
		        <button type="button" class="btn btn" data-dismiss="modal">Cancelar</button>
		    </div>

        </div>
    </div>
</div>   
<!-- End Sign Up Window -->



<!-- Sign Up Window Code -->
    <div class="modal fade" id="modal-edit-skill" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Habilidades</h4>
			    </div>

                <div class="modal-body ">
                   	
                   	<form class="form-horizontal" >
						  <div class="form-group">
						    <label class="control-label col-sm-2">Habilidad</label>
						    <div class="col-sm-10">
						      <input type="text" name="habilidad" class="form-control" placeholder="Habilidad" v-model="fillKeep.habilidad">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2">Porcentaje</label>
						    <div class="col-sm-10">
						      <input type="text" name="porcentaje" class="form-control" placeholder="Porcenteje" v-model="fillKeep.porcentaje">
						    </div>
						  </div>						  
					</form> 

                </div>

                <div class="modal-footer">
			        <button type="button" class="btn btn" v-on:click.prevent="update_skills()">Actualizar</button>
			        <button type="button" class="btn btn" data-dismiss="modal">Cancelar</button>
			    </div>

            </div>
        </div>
    </div>   
    <!-- End Sign Up Window -->

  