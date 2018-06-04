@extends('layouts.admin.app')
@section('content')
@push('styles')
@endpush

<div id="page-wrapper" class="vue_dashboard">
	<!-- page content -->
	<!-- <a href="https://api.whatsapp.com/send?phone=5215531385015">Envíanos un mensaje de WhatsApp</a> -->
	<!-- <a href="https://m.me/100001595960798">Envíanos un mensaje de Facebook</a> -->
	<!-- <a href="https://m.me/100000317226106">Envíanos un mensaje de Facebook</a> -->
	<div class="col-sm-12" role="main">
		<div class="">
			<div class="clearfix"></div>
			<div class="row">

				<div class="col-md-6 col-sm-6 col-xs-12 table-responsive" id="vue_section_jobs">
					<div class="x_panel">
						<div class="x_title">
							<h2>Trabajos Registrados <small></small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<!-- <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Settings 1</a>
										</li>
										<li><a href="#">Settings 2</a>
										</li>
									</ul>
								</li> -->
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<table class="table table-striped table-hover dashboard table-responsive">
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre Vacante</th>
										<th>Detalles</th>

									</tr>
								</thead>
								<tbody>
									<tr v-for="(jobs, key) in datos.trabajos">
										<th scope="row">@{{key + 1 }}</th>
										<td>@{{ jobs.name }}</td>
										<td>@{{ jobs.title }}</td>
									</tr>
								</tbody>
							</table>

							<div class="row">

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
							</div>

						</div>
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-xs-12 table-responsive" id="vue_section_detalle">
					<div class="x_panel">
						<div class="x_title">
							<h2>Candidatos Registrados <small></small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<table class="table table-striped table-hover dashboard">
								<thead>
									<tr>
										<th>#</th>
										<th>Nombre Candidato</th>
										<th>Correo</th>
										<th>Confirmado</th>
										<th>Puesto Desempeñado</th>
										<th></th>
									</tr>
								</thead>
								<tbody>

									<tr v-for="(details, key ) in datos.detalles" >
										<th scope="row">@{{ key + 1 }}</th>
										<td>@{{ details.name }} @{{ details.first_surname }} @{{ details.second_surname }}</td>
										<td>@{{details.email}}</td>
										<td v-if="details.confirmed == 1">Correo Confirmado</td>
										<td v-else>Correo no confimado</td>
										<td></td>
										<td></td>
									</tr>

								</tbody>
						</table>
					<!-- pagination_detalles -->
						<div class="row">
							<ul class="pagination">
								<li v-if="pagination_detalles.current_page > 1 ">
									<a v-on:click.prevent="changePageDetalle( pagination_detalles.current_page - 1 )" style="cursor: pointer;" >
										«
									</a>
								</li>
								<li v-else class="disabled" >
									<a> « </a>
								</li>
								<li v-for="page in pagesNumberDetalle" v-bind:class="[ page == isActiveded ? 'active' : '']" >
									<a style="cursor: pointer;" v-on:click.prevent="changePageDetalle(page)">@{{page}}
									</a>
								</li>
								<li v-if="pagination_detalles.current_page < pagination_detalles.last_page">
									<a style="cursor: pointer;" v-on:click.prevent="changePageDetalle(pagination_detalles.current_page + 1)">
										»
									</a>
								</li>
								<li v-else class="disabled" >
									<a > » </a>
								</li>
							</ul>
						</div>

		<!-- pagination_detalles -->









						</div>
					</div>
				</div>

				<div class="clearfix"></div>

			</div>
		</div>
	</div>
	<!-- /page content -->
</div>
 <!-- /. PAGE WRAPPER  -->

@stop
@push('scripts')
	<script type="text/javascript" src="{{asset('js/candidatos/admin_dashboard.js')}}" ></script>
@endpush
