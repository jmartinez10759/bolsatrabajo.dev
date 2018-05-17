@extends('layouts.admin.app')
@section('content')
@push('styles')
@endpush
			
<div id="page-wrapper" >

	<div class="row bg-title">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Dashboard</h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<ol class="breadcrumb">
				<li class="active"><a href="">Dashboard</a></li>
			</ol>
		</div>
		<!-- /.col-lg-12 -->
	</div>              
	 <!-- /. ROW  -->
	<div id="page-inner">
	    <div class="row bott-wid">
			
			<div class="col-md-3 col-sm-6">
				<div class="widget unique-widget">
					<div class="row">
						<div class="widget-caption info">
							<div class="col-xs-4 no-pad">
								<i class="icon icon-profile-male"></i>
							</div>
							<div class="col-xs-8 no-pad">
								<div class="widget-detail">
									<h3>{{ $candidatos }}</h3>
									<span>Candidatos Activos</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="col-md-3 col-sm-6">
				<div class="widget unique-widget">
					<div class="row">
						<div class="widget-caption danger">
							<div class="col-xs-4 no-pad">
								<i class="icon icon-happy"></i>
							</div>
							<div class="col-xs-8 no-pad">
								<div class="widget-detail">
									<h3>412</h3>
									<span>Happy Customer</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="widget unique-widget">
					<div class="row">
						<div class="widget-caption sucess">
							<div class="col-xs-4 no-pad">
								<i class="icon icon-basket"></i>
							</div>
							<div class="col-xs-8 no-pad">
								<div class="widget-detail">
									<h3>4770</h3>
									<span>Total Earnings</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="widget unique-widget">
					<div class="row">
						<div class="widget-caption warning">
							<div class="col-xs-4 no-pad">
								<i class="icon icon-trophy"></i>
							</div>
							<div class="col-xs-8 no-pad">
								<div class="widget-detail">
									<h3>870</h3>
									<span>Total Jobs</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->

		</div>
		<div class="row bott-wid">
			<div class="col-md-8 col-sm-8">
				<div class="recent-jobs-pannel">
					<div class="pannel-header">
						<h4>Trabajos Recientes</h4>
					</div>
					<!-- Job Lists-->
					<div class="job-lists">
						<div class="row">
							<div class="col-md-10 col-sm-9">
								<div class="recent-job-box">
									<div class="recent-job-img">
										<img src="assets/img/com-1.jpg" class="img-responsive" alt="">
									</div>
									<div class="recent-job-caption">
										<h4>Senior Web Design</h4>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed....</p>
										<span class="recent-job-status">2 Min ago</span>
									</div>
								</div>
							</div>
							<div class="col-md-2 col-sm-3">
								<div class="recent-job-action">
									<a class="edit" href="#" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="delete" href="#" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
					<!-- ./Job Lists-->
				</div>
			</div>
			<div class="col-md-4 col-sm-4">
				<div class="recent-jobs-pannel">
					<div class="pannel-header">
						<h4>Candidatos</h4>
					</div>
					<div class="full-followers">
					  @foreach( $detalles as $detalle)
						<a href="">
							<div class="user-img">
								<img src="assets/img/img-1.jpg" alt="user" class="img-circle">
								<span class="profile-status online pull-right"></span>
								<i class="fa fa-circle active" aria-hidden="true"></i>
							</div>
							<div class="message-content">
							<h5>{{ $detalle->name }} {{ $detalle->first_surname }} {{ $detalle->second_surname }} </h5>
							@foreach( $detalle->description as $description)
							<span class="mail-desc">{{ $description->cargo }}</span>
							@endforeach
							<span class="time">{{$detalle->status}}</span>
							</div>
						</a>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <!-- /. PAGE WRAPPER  -->
			
@stop
@push('scripts')
@endpush