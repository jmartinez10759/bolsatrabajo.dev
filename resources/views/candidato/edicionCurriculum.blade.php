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
						      <input type="text" class="form-control" placeholder="Nombre de la escuela" v-model="fillKeep.escuela" style="text-transform: uppercase;">
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

              <div class="form-group" v-if="fillKeep.id_nivel == 3">
						    <label class="control-label col-sm-2" for=""> Carreras </label>
						    <div class="col-sm-10">
						      <select class="form-control" id="select_licenciatura" onchange="categorias_educativas(this)" v-model="fillKeep.id_categorias_educativas">
						      	 <option v-for="licenciatura in datos.licenciatura" :value="licenciatura.id">@{{licenciatura.nombre}}</option>
						      </select>
						    </div>
						  </div>

							<div class="form-group" v-if="fillKeep.id_nivel == 1">
						    <label class="control-label col-sm-2" for=""> Carreras </label>
						    <div class="col-sm-10">
						      <select class="form-control" id="select_doctorado" onchange="categorias_educativas(this)" v-model="fillKeep.id_categorias_educativas">
						      	 <option v-for="doctorado in datos.doctorado" :value="doctorado.id">@{{doctorado.nombre}}</option>
						      </select>
						    </div>
						  </div>

							<div class="form-group" v-if="fillKeep.id_nivel == 2">
						    <label class="control-label col-sm-2" for=""> Carreras </label>
						    <div class="col-sm-10">
						      <select class="form-control" id="select_mestria" onchange="categorias_educativas(this)" v-model="fillKeep.id_categorias_educativas">
						      	 <option v-for="maestria in datos.maestria" :value="maestria.id">@{{maestria.nombre}}</option>
						      </select>
						    </div>
						  </div>

							<div class="form-group" v-if="fillKeep.id_nivel == 4">
						    <label class="control-label col-sm-2" for=""> Carreras </label>
						    <div class="col-sm-10">
						      <select class="form-control" id="select_bachillerato" onchange="categorias_educativas(this)" v-model="fillKeep.id_categorias_educativas">
						      	 <option v-for="bachillerato in datos.bachillerato" :value="bachillerato.id">@{{bachillerato.nombre}}</option>
						      </select>
						    </div>
						  </div>

							<div class="form-group div_otros" style="display:none;">
						    <label class="control-label col-sm-2" >Nombre de la Carrera</label>
						    <div class="col-sm-10">
						      <input type="text" id="otros_edit" class="form-control" placeholder="" v-model="fillKeep.otra_categoria">
						    </div>
						  </div>

							<div class="form-group">
						    <label class="control-label col-sm-2" for=""> Estatus Academico </label>
						    <div class="col-sm-10">
						      <select class="form-control" onchange="estatus_academico(this)" v-model="fillKeep.id_estatus_academico">
						      	 <option v-for="estatus_academico in datos.estatus_academico" :value="estatus_academico.id">@{{estatus_academico.nombre}}</option>
						      </select>
						    </div>
						  </div>

							<div class="form-group div_cedula" style="display:none;" >
						    <label class="control-label col-sm-2" >Cedula</label>
						    <div class="col-sm-10">
						      <input type="text" id="edit_cedula" class="form-control" placeholder="" v-model="fillKeep.cedula">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" >Fecha Inicio</label>
						    <div class="col-sm-4">
						      <input type="text"  class="form-control dateDropper" placeholder="" v-model="fillKeep.fecha_inicio">

						    </div>
						    <label class="control-label col-sm-2" >Fecha Final</label>
						    <div class="col-sm-4">
						      <input type="text" class="form-control dateDropper" placeholder="" v-model="fillKeep.fecha_final">
						    </div>
						  </div>

					</form>


                </div>

                <div class="modal-footer">
			        <button type="button" class="btn btn-info" v-on:click.prevent="update_study()" >Actualizar</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
		        <h4 class="modal-title">Experiencia Laboral</h4>
		    </div>

            <div class="modal-body ">

               	<form class="form-horizontal" >
					  <div class="form-group">
					    <label class="control-label col-sm-2" >Empresa</label>
					    <div class="col-sm-10">
					      <input type="text" name="jobs_empresa" class="form-control" placeholder="Nombre de la Empresa" v-model="fillKeep.jobs_empresa" style="text-transform: uppercase;">
					    </div>
					  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-2" >Puesto</label>
					    <div class="col-sm-10">
					      <input type="text" name="jobs_puesto" class="form-control" placeholder="Puesto Desempeñado" v-model="fillKeep.jobs_puesto" style="text-transform: uppercase;">
					    </div>
					  </div>
					   <div class="form-group">
					    <label class="control-label col-sm-2" >Jefe Inmediato</label>
					    <div class="col-sm-10">
					      <input type="text" name="jobs_jefe_inmediato" class="form-control" placeholder="Nombre" v-model="fillKeep.jobs_jefe_inmediato" style="text-transform: uppercase;">
					    </div>
					  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2" >Telefono</label>
						    <div class="col-sm-10">
						      <input type="text" name="jobs_telefono" class="form-control" placeholder="Lada + 10 digitos" v-model="fillKeep.jobs_telefono">
						    </div>
						  </div>

					  <div class="form-group">
					    <label class="control-label col-sm-2" >Fecha Inicio</label>
					    <div class="col-sm-4">
					      <input type="text" name="jobs_fecha_inicio" class="form-control dateDropper" placeholder="" v-model="fillKeep.jobs_fecha_inicio">
					    </div>
					    <label class="control-label col-sm-2" >Fecha Final</label>
					    <div class="col-sm-4">
					      <input type="text" name="jobs_fecha_inicio" class="form-control dateDropper" placeholder="" v-model="fillKeep.jobs_fecha_final">
					    </div>
					  </div>

					   <!-- <div class="form-group">
						    <label class="control-label col-sm-2" for="">Posicion</label>
						    <div class="col-sm-2">
						      <input type="text" class="form-control" placeholder="" v-model="fillKeep.jobs_orden">
						    </div>
					  </div> -->

					   <div class="form-group">
					    <label class="control-label col-sm-2" for="pwd">Notas</label>
					    <div class="col-sm-10">
					      <textarea class="form-control" name="jobs_descripcion" placeholder="Notas" v-model="fillKeep.jobs_descripcion" style="text-transform: uppercase;"></textarea>
					    </div>
					  </div>

				</form>

            </div>

            <div class="modal-footer">
		        <button type="button" class="btn btn-info" v-on:click.prevent="update_jobs()">Actualizar</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
						      <input type="text" name="habilidad" class="form-control" placeholder="Habilidad" v-model="fillKeep.habilidad" style="text-transform: uppercase;">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2">Porcentaje</label>
						    <div class="col-sm-2">
						      <input type="text" name="porcentaje" class="form-control" placeholder="Porcenteje" v-model="fillKeep.porcentaje" style="text-transform: uppercase;">
						    </div>
						  </div>

						  <!-- <div class="form-group">
							   <label class="control-label col-sm-2" for="">Posicion</label>
							   <div class="col-sm-2">
							      <input type="text" class="form-control" placeholder="" v-model="fillKeep.skill_orden">
							    </div>
						  </div> -->

					</form>

                </div>

                <div class="modal-footer">
			        <button type="button" class="btn btn-info" v-on:click.prevent="update_skills()">Actualizar</button>
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			    </div>

            </div>
        </div>
    </div>
    <!-- End Sign Up Window -->
