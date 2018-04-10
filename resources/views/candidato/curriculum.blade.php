@extends('layouts.app')
@section('content')
@push('styles')
	<link href="{{ asset('plugins/date-dropper/datedropper.css') }}" rel="stylesheet">
@endpush

	<div class="clearfix"></div>
			
			<!-- Header Title Start -->
			<section class="inner-header-title blank">
				<div class="container">
					<h1>Curriculum</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Header Title End -->
		<div id="vue-curriculum"> 
			<!-- General Detail Start -->
				<div class="section detail-desc">

					<div class="container white-shadow">
					
						<div class="row">
							<div class="detail-pic js">
								<div class="box">
									<input type="file" name="upload-pic[]" id="upload-pic" class="inputfile" />
									<label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
								</div>
							</div>
						</div>
						
						<div class="row bottom-mrg">
							<form class="add-feild">
								<div class="col-md-6 col-sm-6">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Nombre" v-model="datos.nombre " disabled="">
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="input-group">
										<input type="email" class="form-control" placeholder="Email" v-model="datos.email" disabled="">
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Cargo" v-model="datos.puesto" disabled="">
									</div>
								</div>
								
								<div class="col-md-6 col-sm-6">
									<div class="input-group">
										<select class="form-control input-lg" v-model="datos.id_categoria">
											<option v-for="categorias  in datos.categorias" :value="categorias.id">
												@{{ categorias.nombre }}
											</option>
										</select>
									</div>
								</div>
								
								<div class="col-md-12 col-sm-12">
									<textarea class="form-control" placeholder="Notas" v-model="datos.descripcion" disabled=""></textarea>
								</div>
								
							</form>
						</div>
						
						<!-- <div class="row no-padd">
							<div class="detail pannel-footer">
								<div class="col-md-12 col-sm-12">
									<div class="detail-pannel-footer-btn pull-right">
										<a href="#" class="footer-btn choose-cover">Choose Cover Image</a>
									</div>
								</div>
							</div>
						</div> -->
						
					</div>
				</div>
				<!-- General Detail End -->
			
					<!-- full detail SetionStart-->
					<section class="full-detail">
						<div class="container">
							<div class="row bottom-mrg extra-mrg">
								<form>
									<h2 class="detail-title">Informacion General</h2>
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
											<input type="text" class="form-control" placeholder="Email" v-model="datos.email2">
										</div>	
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-phone"></i></span>
											<input type="text" class="form-control" placeholder="Telefono" v-model="datos.telefono" disabled="">
										</div>	
									</div>
									
									<!-- <div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-globe"></i></span>
											<input type="text" class="form-control" placeholder="Website Address">
										</div>	
									</div> -->
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
											<input type="text" class="form-control" placeholder="Direccion" v-model="datos.direccion" disabled="">
										</div>	
									</div>
									
									<!-- <div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
											<input type="text" id="dob" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
										</div>	
									</div> -->
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-flag"></i></span>
											<select class="form-control" v-model="datos.id_state" disabled="">
												<option value="0">Seleccione estado</option>
												<option value="1">Estado de Mexico</option>
											</select>
										</div>	
									</div>
									
								</form>
							</div>

							<div class="row bottom-mrg extra-mrg">
								<div class="col-md-12" >
									<button class="btn btn-success btn-primary small-btn" v-on:click.prevent="insert_detalles()">Guardar</button>
								</div>
								
							</div>	
							<!-- 
							<div class="row bottom-mrg extra-mrg">
								<form>
									<h2 class="detail-title">Perfil Social</h2>
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-facebook"></i></span>
											<input type="text" class="form-control" placeholder="Profile Link">
										</div>	
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
											<input type="text" class="form-control" placeholder="Profile Link">
										</div>	
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-twitter"></i></span>
											<input type="text" class="form-control" placeholder="Profile Link">
										</div>	
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-instagram"></i></span>
											<input type="text" class="form-control" placeholder="Profile Link">
										</div>	
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
											<input type="text" class="form-control" placeholder="Profile Link">
										</div>	
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
											<input type="text" class="form-control" placeholder="Profile Link">
										</div>	
									</div>
									
								</form>
							</div> -->
							
							<!-- <div class="row bottom-mrg extra-mrg">
								<form>
									<h2 class="detail-title">Curriculum</h2>
									<div class="col-md-12 col-sm-12">
										<textarea class="form-control" placeholder="Curriculum" rows="8"></textarea>
									</div>	
									
								</form>
							</div> -->
						<div id="seccion-cv" v-show="datos.status == 1">

							<div class="row bottom-mrg extra-mrg">

								<h2 class="detail-title">Educación</h2>

								<div class="table-responsive">
									<div class="pull-right">
										<button type="button" class="btn add-field" data-toggle="modal" data-target="#modal-educacion">Agregar Educacion</button>
									</div>
									<table class="table table-responsive table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Institucion</th>
												<th>Nivel Academico</th>
												<th>Fecha Inicio</th>
												<th>Fecha Final</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="study in datos.study">
												<td>@{{ study.id }}</td>
												<td>@{{ study.escuela }}</td>
												<td>@{{ study.nivel }}</td>
												<td>@{{ study.fecha_inicio }}</td>
												<td>@{{ study.fecha_final }}</td>
												<td>
													<button class="btn btn" type="button" v-on:click.prevent="edit_general(study,'modal-edit-educacion')">
														Detalles
													</button>
												</td>
												<td>
													<button class="btn" type="button" v-on:click.prevent="delete_study(study)">
														Quitar
													</button>
												</td>
											</tr>
										</tbody>
									</table>

								</div>

								 <!-- <form> 
									<h2 class="detail-title">Educación</h2>
									<div class="extra-field-box">
										<div class="multi-box">	
											<div class="dublicat-box">
												<div class="col-md-12 col-sm-12">
													<input type="text" class="form-control" placeholder="Nombre de la escuela">
												</div>
												
												<div class="col-md-12 col-sm-12">
													<input type="text" class="form-control" placeholder="Qualification, e.g. Master Of Arts">
												</div>
												
												<div class="col-md-6 col-sm-6">
													<div class="input-group">
														<span class="input-group-addon">Fecha desde</span>
														<input type="text" id="edu-start" data-lang="en" data-large-mode="true" data-min-year="2015" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
													</div>
												</div>
												
												<div class="col-md-6 col-sm-6">
													<div class="input-group">
														<span class="input-group-addon">Fecha hasta</span>
														<input type="text" id="edu-end" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
													</div>
												</div>
												
												 <div class="col-md-12 col-sm-12">
													<textarea class="form-control textarea" placeholder="Notes"></textarea>
												</div> 
												
												<button type="button" class="btn remove-field">Quitar</button>
											</div>
										</div>									
										<button type="button" class="add-field">Agregar</button>
									</div>
								</form> -->
							
							</div>
							
							<div class="row bottom-mrg extra-mrg">
								
								<h2 class="detail-title">Experencia Laboral</h2>

								<div class="table-responsive">
									<div class="pull-right">
										<button type="button" class="btn add-field" data-toggle="modal" data-target="#modal-experiencia">Experencia Laboral</button>
									</div>
									<table class="table table-responsive table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Empleo</th>
												<th>Puesto</th>
												<th>Fecha Inicio</th>
												<th>Fecha Final</th>
												<th>Descripción</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="jobs in datos.jobs">
												<td>@{{ jobs.id }}</td>
												<td>@{{ jobs.jobs_empresa }}</td>
												<td>@{{ jobs.jobs_puesto }}</td>
												<td>@{{ jobs.jobs_fecha_inicio }}</td>
												<td>@{{ jobs.jobs_fecha_final }}</td>
												<td>@{{ jobs.jobs_descripcion }}</td>
												<td>
													<button class="btn btn" type="button" v-on:click.prevent="edit_general(jobs,'modal-edit-experiencia')">
														Detalles
													</button>
												</td>
												<td>
													<button class="btn" type="button" v-on:click.prevent="delete_jobs(jobs)">
														Quitar
													</button>
												</td>
											</tr>
										</tbody>
									</table>

								</div>
								<!-- <form>
									<h2 class="detail-title">Experencia Laboral</h2>
									<div class="extra-field-box">
										<div class="multi-box">	
											<div class="dublicat-box">
												<div class="col-md-12 col-sm-12">
													<input type="text" class="form-control" placeholder="Employer">
												</div>
												
												<div class="col-md-12 col-sm-12">
													<input type="text" class="form-control" placeholder="Position, e.g. Web Designer">
												</div>
												
												<div class="col-md-6 col-sm-6">
													<div class="input-group">
														<span class="input-group-addon">Fecha Desde</span>
														<input type="text" id="exp-start" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
													</div>
												</div>
												
												<div class="col-md-6 col-sm-6">
													<div class="input-group">
														<span class="input-group-addon">Fecha Hasta</span>
														<input type="text" id="exp-end" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
													</div>
												</div>
												
												<div class="col-md-12 col-sm-12">
													<textarea class="form-control" placeholder="Notes" rows="8"></textarea>
												</div>
												
												<button type="button" class="btn remove-field">Quitar</button>
											</div>
										</div>									
										<button type="button" class="add-field">Agregar</button>
									</div>
								</form> -->

							</div>
							
							<div class="row bottom-mrg extra-mrg">
								
								<h2 class="detail-title">Habilidades</h2>
								
								<div class="table-responsive">
									<div class="pull-right">
										<button type="button" class="btn add-field" data-toggle="modal" data-target="#modal-skill">Agregar Skill</button>
									</div>
									<table class="table table-responsive table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Habilidad</th>
												<th>Porcentaje</th>
												<th></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<tr v-for="skills in datos.skills">
												<td> @{{ skills.id }} </td>
												<td> @{{ skills.habilidad }} </td>
												<td> @{{ skills.porcentaje }} </td>
												<td>
													<button class="btn btn" type="button" v-on:click.prevent="edit_general(skills,'modal-edit-skill')">
														Detalles
													</button>
												</td>
												<td>
													<button class="btn" type="button" v-on:click.prevent="delete_skills(skills)">
														Quitar
													</button>
												</td>
											</tr>
										</tbody>
									</table>

								</div>
								<!-- <form>
									<div class="extra-field-box">
										<h2 class="detail-title">Habilidades</h2>
										<div class="multi-box">	
											<div class="dublicat-box">
											
												<div class="col-md-12 col-sm-12">
													<input type="text" class="form-control" placeholder="Skills, e.g. Css, Html...">
												</div>
												
												<div class="col-md-12 col-sm-12">
													<div class="input-group">
													<span class="input-group-addon">%</span>
														<input type="text" class="form-control" placeholder="85%">
													</div>
												</div>
													
												<button type="button" class="btn remove-field">Quitar</button>
											</div>
										</div>									
										<button type="button" class="add-field">Agregar</button>
									</div>
								</form> -->
							
							</div>
						</div>	
							<!-- <div class="row bottom-mrg extra-mrg">
								<form>
									<div class="col-md-12">
										<button class="btn btn-success btn-primary small-btn">Guardar</button>
									</div>
								</form>
							</div>	 -->				
						</div>
					</section>
					<!-- full detail SetionStart-->	
<input type="hidden" name="" v-model="datos.id_cv">

<!-- SE CREA LA PARTE DE LOS MODALES -->

  <!-- Sign Up Window Code -->
    <div class="modal fade" id="modal-educacion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Educación</h4>
			    </div>

                <div class="modal-body ">

                   	<form class="form-horizontal" >
						  <div class="form-group">
						    <label class="control-label col-sm-2" for="email">Escuela</label>
						    <div class="col-sm-10">
						      <input type="text" id="escuela" class="form-control" placeholder="Nombre de la escuela" v-model="datos.escuela">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="pwd">Nivel Academico</label>
						    <div class="col-sm-10">
						      <select class="form-control" v-model="datos.id_nivel">
						      	 <option v-for="nivel in datos.niveles" :value="nivel.id">@{{nivel.nombre}}</option>
						      </select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2" >Fecha Inicio</label>
						    <div class="col-sm-4">
						      <input type="text" id="fecha_inicio" class="form-control" placeholder="" v-model="datos.fecha_inicio">
						    </div>
						    <label class="control-label col-sm-2" >Fecha Final</label>
						    <div class="col-sm-4">
						      <input type="text" id="fecha_final" class="form-control" placeholder="" v-model="datos.fecha_final">
						    </div>
						  </div>

					</form> 


                </div>

                <div class="modal-footer">
			        <button type="button" class="btn btn" v-on:click.prevent="insert_study()" >Agregar</button>
			        <button type="button" class="btn btn" data-dismiss="modal">Cancelar</button>
			    </div>

            </div>
        </div>
    
    </div>   
    <!-- End Sign Up Window -->
    
    <!-- Sign Up Window Code -->
    <div class="modal fade" id="modal-experiencia" tabindex="-1" role="dialog" aria-hidden="true">
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
						      <input type="text" name="jobs_empresa" class="form-control" placeholder="Nombre de la Empresa" v-model="datos.jobs_empresa">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" >Puesto</label>
						    <div class="col-sm-10">
						      <input type="text" name="jobs_puesto" class="form-control" placeholder="Puesto Desempeñado" v-model="datos.jobs_puesto">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" >Fecha Inicio</label>
						    <div class="col-sm-4">
						      <input type="text" name="jobs_fecha_inicio" class="form-control" placeholder="" v-model="datos.jobs_fecha_inicio">
						    </div>
						    <label class="control-label col-sm-2" >Fecha Final</label>
						    <div class="col-sm-4">
						      <input type="text" name="jobs_fecha_inicio" class="form-control" placeholder="" v-model="datos.jobs_fecha_final">
						    </div>
						  </div>

						   <div class="form-group">
						    <label class="control-label col-sm-2" for="pwd">Notas</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" name="jobs_descripcion" placeholder="Notas" v-model="datos.jobs_descripcion"></textarea>
						    </div>
						  </div>
						  
					</form> 

                </div>

                <div class="modal-footer">
			        <button type="button" class="btn btn" v-on:click.prevent="insert_jobs()">Agregar</button>
			        <button type="button" class="btn btn" data-dismiss="modal">Cancelar</button>
			    </div>

            </div>
        </div>
    
    </div>   
    <!-- End Sign Up Window -->
    
    <!-- Sign Up Window Code -->
    <div class="modal fade" id="modal-skill" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Habilidades</h4>
			    </div>

                <div class="modal-body ">
                   	
                   	<form class="form-horizontal" >
						  <div class="form-group">
						    <label class="control-label col-sm-2" for="email">Habilidad</label>
						    <div class="col-sm-10">
						      <input type="text" name="habilidad" class="form-control" placeholder="Habilidad" v-model="datos.habilidad">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="control-label col-sm-2" for="pwd">Porcentaje</label>
						    <div class="col-sm-10">
						      <input type="text" name="porcentaje" class="form-control" placeholder="Porcenteje" v-model="datos.porcentaje">
						    </div>
						  </div>						  
					</form> 

                </div>

                <div class="modal-footer">
			        <button type="button" class="btn btn" v-on:click.prevent="insert_skills()">Agregar</button>
			        <button type="button" class="btn btn" data-dismiss="modal">Cancelar</button>
			    </div>

            </div>
        </div>
    
    </div>   
    <!-- End Sign Up Window -->

@include('candidato.edicionCurriculum')

</div>






<!-- END VUE-CURRICULUM -->




@stop
@push('scripts')
<!-- <script type="text/javascript" src="{{ asset('plugins/date-dropper/datedropper.js') }}"></script> -->
<script type="text/javascript">

/*	var formato = {
		format: 'y-m-d', // Formato de la fecha 2016-16-01
        lang: 'es',
        placeholder: 'Haz click aquí',
        minYear: '2016',
        animation: 'bounce' // La opciones son: fadeIn, dropdown y bounce
	}*/

	/*$('#dob').dateDropper();
	$('#exp-start').dateDropper();
	$('#exp-end').dateDropper();
	$('#edu-start').dateDropper();
	$('#edu-end').dateDropper();*/
</script>

<script type="text/javascript" src="{{asset('js/curriculum/curriculum.js')}}" ></script>


@endpush