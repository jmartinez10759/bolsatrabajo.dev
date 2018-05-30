@extends('layouts.app')
@section('content')
@push('styles')

@endpush
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url({{ asset('images/img/chess-3325010_1280.jpg') }});">
	<div class="container">
		<h1>Detalles de la Vacante </h1>
	</div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->
<!-- Job Detail Start -->
<div id="vue-datails-offers">

<section class="detail-desc">
	<div class="container white-shadow">

		<div class="row">

			<div class="detail-pic">
				<img :src="datos.logo" class="img-responsive " alt="" />
				<a href="#" class="detail-edit" title="edit" ><i class="fa fa-pencil"></i></a>
			</div>

			<div class="detail-status">
				<span>{{date('Y-m-d')}}</span>
			</div>

		</div>

		<div class="row bottom-mrg">
			<div class="col-md-8 col-sm-8">
				<div class="detail-desc-caption">
					<h4>@{{datos.name}}</h4>
					<span class="designation">@{{datos.account_name}}</span>
					<p>@{{datos.description_short}}</p>
					<ul>
						<li><i class="fa fa-briefcase"></i><span>@{{datos.contract_type}}</span></li>
						<li><i class="fa fa-flask"></i><span>@{{datos.workingtimetype}}</span></li>
					</ul>
				</div>
			</div>

			<div class="col-md-4 col-sm-4">
				<div class="get-touch">
					<h4>Contactanos</h4>
					<ul>
						<li><i class="fa fa-map-marker"></i><span> @{{datos.estado}} </span></li>
						<li><i class="fa fa-envelope"></i><span>@{{datos.email}}</span></li>
						<li><i class="fa fa-globe"></i><span>@{{datos.account_address}}</span></li>
						<li><i class="fa fa-phone"></i><span></span></li>
						<li><i class="fa fa-money"></i><span>@{{ datos.salario }}</span></li>
					</ul>
				</div>
			</div>

		</div>

		<div class="row no-padd">
			<div class="detail pannel-footer">
				<div class="col-md-5 col-sm-5">
					<ul class="detail-footer-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>

				<div class="col-md-7 col-sm-7">
					<div class="detail-pannel-footer-btn pull-right">
						<a data-toggle="modal" data-target="#terminos" style="cursor: pointer;" class="footer-btn grn-btn" title="" v-show="datos.is_postulate">Postularse</a>
						<a v-on:click.prevent="busqueda_vacantes()" style="cursor: pointer;" class="footer-btn blu-btn" title="">Listado de Vacantes</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Job Detail End -->

<!-- Job full detail Start -->
<section class="full-detail-description full-detail">
	<div class="container">
		<div class="row row-bottom">
			<h2 class="detail-title">Responsabilidades laborales</h2>
			<p align="justify">@{{datos.other_details}}</p>

		</div>

		<!-- <div class="row row-bottom">
			<h2 class="detail-title">Requisito de habilidad</h2>
			<p></p>
			<ul class="detail-list">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div> -->

		<!-- <div class="row row-bottom">
			<h2 class="detail-title">Calificación</h2>
			<p></p>
			<ul class="detail-list">
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div> -->

	</div>
</section>
<!-- Job full detail End -->
<!-- Modal -->
  <div class="modal fade" id="terminos" role="dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h2 class="modal-title">Términos y Condiciones</h2></center>
        </div>
        <div class="modal-body" style="overflow-y:scroll; height:500px;">
          	<div class="col-sm-12">
          		<center>
          			@include('termino.termino')
          		</center>
          	</div>
        </div>
        <div class="modal-footer">
        	<div class="pull-left">
						 <input type="checkbox" id="terminos_condiciones" v-model="newKeep.terminos_condiciones">
	           <label>He leído y acepto el Aviso de Privacidad y los Términos y Condiciones de Uso.</label>
	           <!-- <input type="hidden" id="confirmed_nss" v-model="newKeep.confirmed_nss">
	           <input type="hidden" id="curp" v-model="newKeep.curp">
	           <input type="hidden" id="nss" v-model="newKeep.nss"> -->
        	</div>
					<button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar </button>
        	<button type="button" class="btn btn-success" v-on:click.prevent="postulacion()" id="btn_condiciones">Aceptar Terminos</button>
        </div>
      </div>

    </div>
  </div>

</div>
@stop

@push('scripts')
<script type="text/javascript" src="{{asset('js/vacantes/details_vacantes.js')}}" ></script>
@endpush
