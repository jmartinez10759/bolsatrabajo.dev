@extends('layouts.admin.app')
@section('content')
@push('styles')
@endpush

<div id="wrapper" class="vue_candidate_admin">
	 <!--<div class="row">
			 <ul class="pagination">
				 <li v-if="pagination.current_page > 1 ">
					 <a v-on:click.prevent="changePage( pagination.current_page - 1 )" style="cursor: pointer;" >
						 «
					 </a>
				 </li>
				 <li v-else class="disabled" >
					 <a> « </a>
				 </li>
				 <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']" >
					 <a style="cursor: pointer;" v-on:click.prevent="changePage(page)">@{{page}}
					 </a>
				 </li>
				 <li v-if="pagination.current_page < pagination.last_page">
					 <a style="cursor: pointer;" v-on:click.prevent="changePage(pagination.current_page + 1)">
						 »
					 </a>
				 </li>
				 <li v-else class="disabled" >
					 <a > » </a>
				 </li>
			 </ul>
		 </div>-->



<!-- page content -->
<!-- <div class="right_col" role="main"> -->
<div class="col-sm-12" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Listado de Candidatos</h3>
			</div>

			<div class="title_right">
				<div class="col-sm-offset-7">
					<button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal_insert" title="Agregar Candidato">
						<i class="fa fa-edit"> Agregar</i>
					</button>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="row">

							<div class="col-md-12 col-sm-12 col-xs-12 text-center">
								<ul class="pagination pagination-split">
									<li><a href="#">A</a></li>
									<li><a href="#">B</a></li>
									<li><a href="#">C</a></li>
									<li><a href="#">D</a></li>
									<li><a href="#">E</a></li>
									<li>...</li>
									<li><a href="#">W</a></li>
									<li><a href="#">X</a></li>
									<li><a href="#">Y</a></li>
									<li><a href="#">Z</a></li>
								</ul>
							</div>

							<div class="clearfix"></div>

							<div class="col-md-4 col-sm-4 col-xs-12 profile_details" v-for="detalle in datos.candidate">
								<div class="well profile_view">
									<div class="col-sm-12">
										<h4 class="brief"><i>Candidato</i></h4>
										<div class="left col-xs-7">
											<h2>@{{ detalle.name }} @{{ detalle.first_surname }} @{{ detalle.second_surname }}</h2>
											<p><strong>Detalles: </strong> @{{ detalle.cargo }} </p>
											<ul class="list-unstyled">
												<li><i class="fa fa-building"></i> Direccion: @{{ detalle.direccion }}</li>
												<li><i class="fa fa-phone"></i> Telefono #: @{{ detalle.telefono }}</li>
											</ul>
										</div>
										<div class="right col-xs-5 text-center">
											<img :src="detalle.photo" class="img-circle img-responsive" alt="">
										</div>
									</div>
									<div class="col-xs-12 bottom text-center">
										<!-- <div class="col-xs-12 col-sm-6 emphasis">
											<p class="ratings">
												<a>4.0</a>
												<a href="#"><span class="fa fa-star"></span></a>
												<a href="#"><span class="fa fa-star"></span></a>
												<a href="#"><span class="fa fa-star"></span></a>
												<a href="#"><span class="fa fa-star"></span></a>
												<a href="#"><span class="fa fa-star-o"></span></a>
											</p>
										</div> -->
										<div class="col-xs-12 col-sm-6 emphasis">
											<button type="button" class="btn btn-danger btn-xs" title="Borrar" v-on:click.prevent="destroy_candidate( detalle )">
												<i class="fa fa-trash-o" aria-hidden="true"></i>
											</button>
												<!-- <i class="fa fa-user"> -->
											<button type="button" class="btn btn-primary btn-xs" title="Editar" v-on:click.prevent="edit_general(detalle,'modal_update')">
												<i class="fa fa-user"> </i> Editar
											</button>
										</div>
									</div>
								</div>
							</div>



						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->

@include('administracion.edicionCandidate');

</div>
<!-- /. WRAPPER  -->


@stop
@push('scripts')
	<script type="text/javascript" src="{{asset('js/candidatos/admin_candidate.js')}}" ></script>
@endpush
