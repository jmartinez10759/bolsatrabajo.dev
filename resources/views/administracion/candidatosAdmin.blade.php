@extends('layouts.admin.app')
@section('content')
@push('styles')
@endpush
		  
<div id="wrapper" class="vue_candidate_admin">
	
	<div id="page-wrapper" >
		 <div class="row bg-title">
			<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
				<h4 class="page-title">Candidatos</h4>
			</div>
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
				<ol class="breadcrumb">
					<li><a href="{{route('dashboard')}}">Dashboard</a></li>
					<li class="active">Candidatos</li>
				</ol>
			</div>
			<!-- /.col-lg-12 -->
	</div>              
		 <!-- /. ROW  -->
		<div id="page-inner">
		   <div class="row">
				<div class="col-md-12">
					<div class="chat_container">
						<div class="job-box">
							<div class="job-box-filter">
								<div class="row">
									<div class="col-md-6 col-sm-6">
										<a href="#" title="Todos Candidatos" class="filtsec active" >Todos {{ $total }}</a>
										<!-- <a href="#" title="All Candidate" class="filtsec">Recommended (7)</a>
										<a href="#" title="All Candidate" class="filtsec"><i class="fa fa-star" aria-hidden="true"></i>Shortlisted (5)</a> -->
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="filter-search-box text-right">
											<label>Buscar:<input type="search" class="form-control input-sm" placeholder=""></label>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row no-ext-mrg">
								
								<div class="col-sm-offset-9">
									<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_insert"> Agregar Candidato </button>
								</div>
								<br>
								<div class="col-md-4 col-sm-6" v-for="detalle in datos">
									<div class="candidate-box">
										<div class="top-box">
											<i class="fa fa-star" aria-hidden="true"></i>
											<div class="candidate-action">
												<a href="#" class="edit-can" v-on:click.prevent="edit_general(detalle,'modal_update')"><i class="fa fa-pencil" aria-hidden="true"></i></a>
												<a href="#" class="delete-can" v-on:click.prevent="destroy_candidate( detalle )"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											</div>
										</div>
										<div class="candidate-img"  >
											<img src="" class="img-circle img-responsive" alt="">
										</div>
										<div class="candidate-caption">
											<h4>@{{ detalle.name }} @{{ detalle.first_surname }} @{{ detalle.second_surname }} </h4>
											<span>@{{ detalle.cargo }}</span>

										</div>
										<div class="candidate-footer">
											<span class="can-status" v-if="detalle.status == 1"> 
											Activo</span>
											<span class="can-status" v-else> 
											Desactivado</span>
											<!-- <span class="can-type"><b>92%</b> Match</span> -->
										</div>
									</div>
								</div>



							</div>
						</div>
					</div>
				</div>
			</div>       
			 <!-- /. ROW  -->           
		</div>
		 <!-- /. PAGE INNER  -->
	</div>
	 <!-- /. PAGE WRAPPER  -->


<!-- Modal -->
<div class="modal fade" id="modal_insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Reistro de Candidatos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
       

      	<form>
		  
		  <div class="form-group col-sm-6">
		    <label for="">Nombre</label>
		    <input type="text" class="form-control" id="name" v-model="newKeep.name" style="text-transform: uppercase;">
		  </div>

		  <div class="form-group col-sm-6">
		    <label for="">Primer Apellido</label>
		    <input type="text" class="form-control" id="apellidop" v-model="newKeep.first_surname" style="text-transform: uppercase;">
		  </div>

		  <div class="form-group col-sm-6">
		    <label for="">Segundo Apellido</label>
		    <input type="text" class="form-control" id="apellidom" v-model="newKeep.second_surname" style="text-transform: uppercase;">
		  </div>

		  <div class="form-group col-sm-6">
		    <label for="">Correo</label>
		    <input type="text" class="form-control" id="correo" v-model="newKeep.email">
		  </div>

		  <div class="form-group col-sm-6">
		    <label for="">Password</label>
		    <input type="password" class="form-control" id="password" v-model="newKeep.password"  style="text-transform: uppercase;">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Telefono</label>
		    <input type="text" class="form-control" id="phone" v-model="newKeep.telefono" style="text-transform: uppercase;">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Codigo Postal</label>
		    <input type="text" class="form-control" id="codigo" v-model="newKeep.codigo" maxlength="5">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Direccion</label>
		    <input type="text" class="form-control" id="address" v-model="newKeep.direccion" style="text-transform: uppercase;">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Curp * </label>
		    <input type="text" class="form-control" id="curp" v-model="newKeep.curp" style="text-transform: uppercase;">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="">Cargo</label>
		    <input type="text" class="form-control" id="cargo" v-model="newKeep.cargo" style="text-transform: uppercase;">
		  </div>
		   <div class="form-group">
		    <label for="">Estado</label>
		    	<select class="form-control" v-model="newKeep.id_state" >
		    		@foreach( $estados as $contry )
		    			<option value="{{ $contry->id}}">{{ $contry->nombre }}</option>
		    		@endforeach
		    	</select>
		  </div>
		  <!-- <div class="form-group">
		  	<label >Numero de Seguro Social</label>
            <input id="confirmed_nss" type="checkbox" v-model="newKeep.confirmed_nss">
		  </div> -->
		  <div class="form-group ">
			  	<label for="">Acerca de </label>
			  	<textarea class="form-control" id="description" v-model="newKeep.descripcion" ></textarea>
                
          </div>
		
		</form>

      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" v-on:click.prevent="insert_candidate()">Guardar</button>
      </div>
    </div>
  </div>

</div>

@include('administracion.edicionCandidate');

</div>
<!-- /. WRAPPER  -->





@stop
@push('scripts')
	<script type="text/javascript" src="{{asset('js/candidatos/admin_candidate.js')}}" ></script>
@endpush