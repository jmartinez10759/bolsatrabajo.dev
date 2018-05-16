@extends('layouts.admin.app')
@section('content')
@push('styles')
@endpush
			
<div id="page-wrapper" >
 <div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">Active Jobs</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Dashboard</a></li>
			<li class="active">Active Jobs</li>
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
					<!-- <div class="job-box-filter">
						<div class="row">
							<div class="col-md-6 col-sm-6">
							<label>Show 
							<select name="datatable_length" class="form-control input-sm">
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
							</select>
							entries</label>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="filter-search-box text-right">
									<label>Search:<input type="search" class="form-control input-sm" placeholder=""></label>
								</div>
							</div>
						</div>
					</div> -->
					<article>
						<div class="brows-job-list">
							<div class="col-md-1 col-sm-2 small-padding">
								<div class="brows-job-company-img">
									<img src="assets/img/com-1.jpg" class="img-responsive" alt="" />
								</div>
							</div>
							<div class="col-md-6 col-sm-5">
								<div class="brows-job-position">
									<h3>Portal Candidatos</h3>
									<p><span>Autodesk</span><span class="brows-job-status"><strong>Status:</strong> Active</span></p>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="brows-job-location">
									<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="job-action">
									<a class="edit" href="#" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="delete" href="#" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</article>

					<article>
						<div class="brows-job-list">
							<div class="col-md-1 col-sm-2 small-padding">
								<div class="brows-job-company-img">
									<img src="assets/img/com-2.jpg" class="img-responsive" alt="" />
								</div>
							</div>
							<div class="col-md-6 col-sm-5">
								<div class="brows-job-position">
									<h3>Administrador</h3>
									<p><span>Autodesk</span><span class="brows-job-status"><strong>Status:</strong> Active</span></p>
								</div>
							</div>
							<div class="col-md-3 col-sm-3">
								<div class="brows-job-location">
									<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
								</div>
							</div>
							<div class="col-md-2 col-sm-2">
								<div class="job-action">
									<a class="edit" href="#" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="delete" href="#" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</article>
					<!--row Pagination-->
					<!-- <div class="row">
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li> 
							<li><a href="#">4</a></li> 
							<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
							<li><a href="#">&raquo;</a></li> 
						</ul>
					</div> -->
					<!--./row Pagination-->
				</div>
			</div>
		</div>
	</div>       
	 <!-- /. ROW  -->           

</div>
 <!-- /. PAGE INNER  -->
@stop
@push('scripts')
@endpush