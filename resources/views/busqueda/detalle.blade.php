@extends('layouts.app')
@section('content')
@push('styles')

@endpush
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
	<div class="container">
		<h1>Detalles de la Vacante </h1>
	</div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->
<!-- Job Detail Start -->
<section class="detail-desc" id="vue-datails-offers">
	<input type="text" v-model="datos.id">
	<div class="container white-shadow">
	
		<div class="row">
		
			<div class="detail-pic">
				<img src="http://via.placeholder.com/150x150" class="img" alt="" />
				<a href="#" class="detail-edit" title="edit" ><i class="fa fa-pencil"></i></a>
			</div>
			
			<div class="detail-status">
				<span></span>
			</div>
			
		</div>
		
		<div class="row bottom-mrg">
			<div class="col-md-8 col-sm-8">
				<div class="detail-desc-caption">
					<h4>@{{datos.title}}</h4>
					<span class="designation">@{{datos.name}}</span>
					<p>@{{datos.description_short}}</p>
					<ul>
						<li><i class="fa fa-briefcase"></i><span>Full time</span></li>
						<li><i class="fa fa-flask"></i><span>3 Year Experience</span></li>
					</ul>
				</div>
			</div>
			
			<div class="col-md-4 col-sm-4">
				<div class="get-touch">
					<h4>Contactanos</h4>
					<ul>
						<li><i class="fa fa-map-marker"></i><span>Menlo Park, CA</span></li>
						<li><i class="fa fa-envelope"></i><span>@{{datos.email}}</span></li>
						<li><i class="fa fa-globe"></i><span>microft.com</span></li>
						<li><i class="fa fa-phone"></i><span>0 123 456 7859</span></li>
						<li><i class="fa fa-money"></i><span>@{{datos.salary_min}} @{{datos.salary_max}}</span></li>
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
						<a href="#" class="footer-btn grn-btn" title="">Quick Apply</a>
						<a href="#" class="footer-btn blu-btn" title="">Save Draft</a>
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
			<h2 class="detail-title">Job Responsibilities</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
		
		<div class="row row-bottom">
			<h2 class="detail-title">Skill Requirement</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<ul class="detail-list">
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</li>
			</ul>
		</div>
		
		<div class="row row-bottom">
			<h2 class="detail-title">Qualification</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<ul class="detail-list">
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
			</ul>
		</div>
		
	</div>
</section>
<!-- Job full detail End -->
@stop

@push('scripts')
<script type="text/javascript" src="{{asset('js/vacantes/details_vacantes.js')}}" ></script>
@endpush

