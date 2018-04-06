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
									<input type="text" class="form-control" placeholder="Your Name">
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="input-group">
									<input type="email" class="form-control" placeholder="Your Email">
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Professional Title">
								</div>
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="input-group">
									<select class="form-control input-lg">
										<option>All Categories</option>
										<option>Software</option>
										<option>Hardware</option>
										<option>Machanical</option>
										<option>HR/Manager</option>
									</select>
								</div>
							</div>
							
							<div class="col-md-12 col-sm-12">
								<textarea class="form-control" placeholder="About Notes"></textarea>
							</div>
							
						</form>
					</div>
					
					<div class="row no-padd">
						<div class="detail pannel-footer">
							<div class="col-md-12 col-sm-12">
								<div class="detail-pannel-footer-btn pull-right">
									<a href="#" class="footer-btn choose-cover">Choose Cover Image</a>
								</div>
							</div>
						</div>
					</div>
					
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
									<input type="text" class="form-control" placeholder="Email Address">
								</div>	
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-phone"></i></span>
									<input type="text" class="form-control" placeholder="Phone Number">
								</div>	
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-globe"></i></span>
									<input type="text" class="form-control" placeholder="Website Address">
								</div>	
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
									<input type="text" class="form-control" placeholder="Location: London UK, Newyork..">
								</div>	
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
									<input type="text" id="dob" data-lang="en" data-large-mode="true" data-min-year="2017" data-max-year="2020" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" class="form-control" readonly="">
								</div>	
							</div>
							
							<div class="col-md-6 col-sm-6">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-flag"></i></span>
									<select class="form-control input-lg">
										<option>Select Region</option>
										<option>United Kingdom</option>
										<option>United State</option>
										<option>India</option>
										<option>More Other</option>
									</select>
								</div>	
							</div>
							
						</form>
					</div>
					
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
					</div>
					
					<div class="row bottom-mrg extra-mrg">
						<form>
							<h2 class="detail-title">Curriculum</h2>
							<div class="col-md-12 col-sm-12">
								<textarea class="form-control" placeholder="Curriculum" rows="8"></textarea>
							</div>	
							
						</form>
					</div>
					<div class="row bottom-mrg extra-mrg">
						<form>
							<h2 class="detail-title">Educacion</h2>
							<div class="extra-field-box">
								<div class="multi-box">	
									<div class="dublicat-box">
										<div class="col-md-12 col-sm-12">
											<input type="text" class="form-control" placeholder="School Name, e.g. Master Of Technology">
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
										
										<!-- <div class="col-md-12 col-sm-12">
											<textarea class="form-control textarea" placeholder="Notes"></textarea>
										</div> -->
										
										<button type="button" class="btn remove-field">Quitar</button>
									</div>
								</div>									
								<button type="button" class="add-field">Agregar</button>
							</div>
						</form>
					</div>
					
					<div class="row bottom-mrg extra-mrg">
						<form>
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
						</form>
					</div>
					
					<div class="row bottom-mrg extra-mrg">
						<form>
							<h2 class="detail-title">Habilidades</h2>
							<div class="extra-field-box">
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
						</form>
					</div>
					<div class="row bottom-mrg extra-mrg">
						<form>
							<div class="col-md-12">
								<button class="btn btn-success btn-primary small-btn">Guardar</button>
							</div>
						</form>
					</div>					
				</div>
			</section>
			<!-- full detail SetionStart-->	

@stop
@push('scripts')
<script type="text/javascript" src="{{ asset('plugins/date-dropper/datedropper.js') }}"></script>
<script type="text/javascript">
	$('#dob').dateDropper();
	$('#exp-start').dateDropper();
	$('#exp-end').dateDropper();
	$('#edu-start').dateDropper();
	$('#edu-end').dateDropper();
</script>
@endpush