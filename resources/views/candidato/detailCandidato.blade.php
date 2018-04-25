@extends('layouts.app')

@section('content')
			<div class="clearfix"></div>
			
			<!-- Title Header Start -->
			<section class="inner-header-title" style="background-image:url(http://via.placeholder.com/1920x850);">
				<div class="container">
					<h1>Detalles del Candidato</h1>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Title Header End -->
		
		<!-- Candidate Profile Start -->
        <section class="detail-desc advance-detail-pr gray-bg">
            <div class="container white-shadow">
                <div class="row">
                    <div class="detail-pic"><img src="{{ $photo_profile }}" class="img" alt="" /><a href="#" class="detail-edit" title="edit"><i class="fa fa-pencil"></i></a></div>
                    <div class="detail-status"><span>{{ $activo }}</span></div>
                </div>
				
                <div class="row bottom-mrg">
                    <div class="col-md-12 col-sm-12">
                        <div class="advance-detail detail-desc-caption">
                            <h4>{{ $nombre_completo }}</h4>
                            <span class="designation"></span>
                            <ul>
                                <!-- <li><strong class="j-applied">570</strong>Job Like</li> -->
                                <li><strong class="j-view">{{ $postulaciones }}</strong>Postulaciones</li>
                                <!-- <li><strong class="j-shared">210</strong>Job Shared</li> -->
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
                           <div class="detail-pannel-footer-btn pull-right"><!--<a href="javascript:void(0)" data-toggle="modal" data-target="#apply-job" class="footer-btn grn-btn" title="">Edit Now</a>-->
                           		<a href="{{ route('upload_cv') }}" id="upload_cv" class="footer-btn blu-btn" title="" style="display: none">Crear Curriculum</a>
                           </div>
                        </div>
                    </div>
                </div>
				
            </div>
        </section>
        <section class="full-detail-description full-detail gray-bg">
            <div class="container">
                <div class="col-md-12 col-sm-12">
                    <div class="full-card">
                      <div class="deatil-tab-employ tool-tab">
							<ul class="nav simple nav-tabs" id="simple-design-tab">
								<li class=""><a href="#about">Acerca de </a></li>
								<li><a href="#address">Detalles</a></li>
								<li><a href="#post-job">Postulaciones</a></li>
								<!-- <li><a href="#friends">Friends</a></li>
								<li><a href="#messages">Messages <span class="info-bar">6</span></a></li> -->
								<li class="active"><a href="#settings">Configuracion</a></li>
							</ul>
							<!-- Start All Sec -->

							<div class="tab-content" id="vue-details">
								<!-- Start About Sec -->
								<div id="about" class="tab-pane fade">
									<h3>Acerca de {{ $nombre_completo }}</h3>
									<p>@{{datos.descripcion}}</p>
								</div>
								<!-- End About Sec -->
								
								<!-- Start Address Sec -->
								<div id="address" class="tab-pane fade">
									<h3>Detalles </h3>
									<ul class="job-detail-des">
										<li><span>Nombre:</span>@{{ datos.name  }}</li>
										<li><span>Primer Apellido:</span>@{{ datos.first_surname  }}</li>
										<li><span>CURP:</span>@{{ datos.curp  }}</li>
										<!-- <li><span>NSS:</span>@{{ datos.nss  }}</li> -->
										<li><span>Cargo:</span>@{{ datos.cargo  }}</li>
										<li><span>C.P:</span>@{{ datos.codigo }}</li>
										<li><span>Telefono:</span>@{{ datos.telefono }}</li>
										<li><span>Email:</span>@{{ datos.email}}</li>
									</ul>
								</div>
								<!-- End Address Sec -->
								
								<!-- Start Job List -->
								<div id="post-job" class="tab-pane fade">
									<h3>Estas Postulado en {{$postulaciones}} Empleos</h3>
									<div class="row" v-for="(postulacion, key ) in datos.postulaciones">
										<article v-on:click.prevent="details_vacantes( postulacion )" style="cursor: pointer;">
											<div class="mng-company">
												<div class="col-md-2 col-sm-2">
													<div class="mng-company-pic"><img src="" class="img-responsive" alt=""></div>
												</div>
												
												<div class="col-md-5 col-sm-5">
													<div class="mng-company-name">
														<h4>@{{postulacion.title}} -<span class="cmp-tagline"> @{{postulacion.name}}</span></h4><span class="cmp-time">10 Hour Ago</span></div>
												</div>
												
												<div class="col-md-4 col-sm-4">
													<div class="mng-company-location">
														<p><i class="fa fa-map-marker"></i> </p>
													</div>
												</div>
												
												<div class="col-md-1 col-sm-1">
													<div class="mng-company-action"><a href="#"><i class="fa fa-edit"></i></a><a href="#"><i class="fa fa-trash-o"></i></a></div>
												</div>
												
											</div>
											<span class="tg-themetag tg-featuretag">Premium</span>
										</article>
									</div>
									<div class="row">
										<ul class="pagination">
											<li v-if="pagination.current_page > 1 ">
												<a v-on:click.prevent="changePage( pagination.current_page - 1 )" style="cursor: pointer;" >
													«
												</a>
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
										</ul>
									</div>

								</div>
								<!-- End Job List -->
								
								<!-- Start Friend List -->
								<!-- <div id="friends" class="tab-pane fade">
									<div class="row">
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status pending">Pending</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-1.png" class="img-responsive" alt=""></div>
													<h4>Charles Hopman</h4><span>Web designer</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status available">Available</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-2.png" class="img-responsive" alt=""></div>
													<h4>Ethan Marion</h4><span>IOS designer</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status pending">Pending</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-3.png" class="img-responsive" alt=""></div>
													<h4>Zara Clow</h4><span>UI/UX designer</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status pending">Pending</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-4.png" class="img-responsive" alt=""></div>
													<h4>Henry Crooks</h4><span>PHP Developer</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status available">Available</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-2.png" class="img-responsive" alt=""></div>
													<h4>Joseph Macfarlan</h4><span>App Developer</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status pending">Pending</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-1.png" class="img-responsive" alt=""></div>
													<h4>Zane Joyner</h4><span>Html Expert</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status pending">Pending</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-3.png" class="img-responsive" alt=""></div>
													<h4>Anna Hoysted</h4><span>UI/UX Designer</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status available">Available</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-4.png" class="img-responsive" alt=""></div>
													<h4>Spencer Birdseye</h4><span>SEO Expert</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="col-md-4 col-sm-4">
											<div class="manage-cndt">
												<div class="cndt-status pending">Pending</div>
												<div class="cndt-caption">
													<div class="cndt-pic"><img src="assets/img/can-1.png" class="img-responsive" alt=""></div>
													<h4>Eden Macaulay</h4><span>Web designer</span>
													<p>Our analysis team at Megriosft use end to end innovation proces</p>
												</div><a href="#" title="" class="cndt-profile-btn">View Profile</a>
											</div>
										</div>
										
										<div class="row">
											<ul class="pagination">
												<li><a href="#">«</a></li>
												<li class="active"><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
												<li><a href="#">4</a></li>
												<li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li>
												<li><a href="#">»</a></li>
											</ul>
										</div>
									</div>
								</div> -->
								<!-- End Friend List -->
								
								<!-- Start Message -->
								<!-- <div id="messages" class="tab-pane fade">
									<div class="inbox-body inbox-widget">
										<div class="mail-card">
											<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#full-message" aria-expanded="false">
												<div class="card-title flexbox">
												  <img class="img-responsive img-circle avatar" src="assets/img/can-1.png" alt="...">
												  <div>
													<h6>Daniel Duke</h6>
													<small>Today at 07:34 AM</small>
													<small><a class="text-info collapsed" href="#detail-view" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

													<div class="no-collapsing cursor-text collapse" id="detail-view" aria-expanded="false" style="height: 0px;">
													  <small class="d-inline-block">From:</small>
													  <small>theadmin@thetheme.io</small>
													  <br>
													  <small class="d-inline-block">To:</small>
													  <small>subscriber@yahoo.com</small>
													</div>
												  </div>
												</div>
											</header>
											<div class="collapse" id="full-message" aria-expanded="false" style="height: 0px;">
												<div class="card-body">
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
												</div>
											</div>
										</div>
										
										<div class="mail-card unread">
											<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-2" aria-expanded="false">
												<div class="card-title flexbox">
												  <img class="img-responsive img-circle avatar" src="assets/img/can-2.png" alt="...">
												  <div>
													<h6>Daniel Duke</h6>
													<small>Today at 07:34 AM</small>
													<small><a class="text-info collapsed" href="#detail-view1" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

													<div class="no-collapsing cursor-text collapse" id="detail-view1" aria-expanded="false" style="height: 0px;">
													  <small class="d-inline-block">From:</small>
													  <small>theadmin@thetheme.io</small>
													  <br>
													  <small class="d-inline-block">To:</small>
													  <small>subscriber@yahoo.com</small>
													</div>
												  </div>
												</div>
											</header>
											<div class="collapse" id="meaages-2" aria-expanded="false" style="height: 0px;">
												<div class="card-body">
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
												</div>
											</div>
										</div>
										
										<div class="mail-card">
											<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-3" aria-expanded="false">
												<div class="card-title flexbox">
												  <img class="img-responsive img-circle avatar" src="assets/img/can-1.png" alt="...">
												  <div>
													<h6>Daniel Duke</h6>
													<small>Today at 07:34 AM</small>
													<small><a class="text-info collapsed" href="#detail-view2" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

													<div class="no-collapsing cursor-text collapse" id="detail-view2" aria-expanded="false" style="height: 0px;">
													  <small class="d-inline-block">From:</small>
													  <small>theadmin@thetheme.io</small>
													  <br>
													  <small class="d-inline-block">To:</small>
													  <small>subscriber@yahoo.com</small>
													</div>
												  </div>
												</div>
											</header>
											<div class="collapse" id="meaages-3" aria-expanded="false" style="height: 0px;">
												<div class="card-body">
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
												</div>
											</div>
										</div>
										
										<div class="mail-card">
											<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="#meaages-4" aria-expanded="false">
												<div class="card-title flexbox">
												  <img class="img-responsive img-circle avatar" src="assets/img/can-3.png" alt="...">
												  <div>
													<h6>Daniel Duke</h6>
													<small>Today at 07:34 AM</small>
													<small><a class="text-info collapsed" href="#detail-view3" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

													<div class="no-collapsing cursor-text collapse" id="detail-view3" aria-expanded="false" style="height: 0px;">
													  <small class="d-inline-block">From:</small>
													  <small>theadmin@thetheme.io</small>
													  <br>
													  <small class="d-inline-block">To:</small>
													  <small>subscriber@yahoo.com</small>
													</div>
												  </div>
												</div>
											</header>
											<div class="collapse" id="meaages-4" aria-expanded="false" style="height: 0px;">
												<div class="card-body">
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
												</div>
											</div>
										</div>
										
										<div class="mail-card unread">
											<header class="card-header cursor-pointer collapsed" data-toggle="collapse" data-target="meaages-5" aria-expanded="false">
												<div class="card-title flexbox">
												  <img class="img-responsive img-circle avatar" src="assets/img/can-4.png" alt="...">
												  <div>
													<h6>Daniel Duke</h6>
													<small>Today at 07:34 AM</small>
													<small><a class="text-info collapsed" href="#detail-view4" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

													<div class="no-collapsing cursor-text collapse" id="detail-view4" aria-expanded="false" style="height: 0px;">
													  <small class="d-inline-block">From:</small>
													  <small>theadmin@thetheme.io</small>
													  <br>
													  <small class="d-inline-block">To:</small>
													  <small>subscriber@yahoo.com</small>
													</div>
												  </div>
												</div>
											</header>
											<div class="collapse" id="meaages-5" aria-expanded="false" style="height: 0px;">
												<div class="card-body">
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
												</div>
											</div>
										</div>
										
										<div class="mail-card">
											<header class="card-header cursor-pointer">
												<div class="card-title flexbox">
												  <img class="img-responsive img-circle avatar" src="assets/img/can-4.png" alt="...">
												  <div>
													<h6>Daniel Duke</h6>
													<small>Today at 07:34 AM</small>
													<small><a class="text-info collapsed" href="#detail-view-6" data-toggle="collapse" aria-expanded="false">View Detail</a></small>

													<div class="no-collapsing cursor-text collapse" id="detail-view-6" aria-expanded="false" style="height: 0px;">
													  <small class="d-inline-block">From:</small>
													  <small>theadmin@thetheme.io</small>
													  <br>
													  <small class="d-inline-block">To:</small>
													  <small>subscriber@yahoo.com</small>
													</div>
												  </div>
												</div>
											</header>
											<div class="" id="meaages-6">
												<div class="card-body">
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia.</p>
												  <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
												  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>
												  <hr>
												  <h5 class="text-lighter">
													<i class="fa fa-paperclip"></i>
													<small>Attchments (3)</small>
												  </h5>
													<div class="attachment-block">
														<div class="thumb">
															<img src="assets/img/gallery1.jpg" alt="img" class="img-responsive">
														</div>
														<div class="attachment-info">
															<h6>Profile Pic  <span>( 1.69 mb )</span></h6>
															<ul>
																<li><a href="javascript:void(0)">Download</a></li>
																<li><a href="javascript:void(0)">View</a></li>
															</ul>
														</div>
													</div>
													<div class="attachment-block">
														<div class="thumb">
															<img src="assets/img/gallery2.jpg" alt="img" class="img-responsive">
														</div>
														<div class="attachment-info">
															<h6>Profile Pic  <span>( 1.69 mb )</span></h6>
															<ul>
																<li><a href="javascript:void(0)">Download</a></li>
																<li><a href="javascript:void(0)">View</a></li>
															</ul>
														</div>
													</div>
													<div class="attachment-block">
														<div class="thumb">
															<img src="assets/img/gallery3.jpg" alt="img" class="img-responsive">
														</div>
														<div class="attachment-info">
															<h6>Profile Pic  <span>( 1.69 mb )</span></h6>
															<ul>
																<li><a href="javascript:void(0)">Download</a></li>
																<li><a href="javascript:void(0)">View</a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div> -->
								<!-- End Message -->
								
								<!-- Start Settings -->
								<div id="settings" class="tab-pane fade in active">
									<div class="row no-mrg">
										<div class="col-sm-12">
											<h3>Editar Perfil</h3>
										</div>
										<!-- <div class="col-sm-6"></div> -->
										
										<div class="edit-pro">
											<div class="col-md-4 col-sm-6">
												<label>Nombre</label>
												<input type="text" class="form-control" v-model="datos.name" >
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Primer Apellido</label>
												<input type="text" class="form-control" v-model="datos.first_surname" >
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Segundo Apellido</label>
												<input type="text" class="form-control" v-model="datos.second_surname" >
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Email</label>
												<input type="email" class="form-control" v-model="datos.email" disabled="">
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Telefono</label>
												<input type="text" id="telefono" class="form-control" v-model="datos.telefono">
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Codigo Postal</label>
												<input type="text" id="codigo" class="form-control" maxlength="5" v-model="datos.codigo">
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Direccion</label>
												<input type="text" id="direccion" class="form-control" v-model="datos.direccion">
											</div>
											<div class="col-md-4 col-sm-6">
												<label>Curp*</label>
												<input type="text" id="curp" class="form-control" v-model="datos.curp">
											</div>
											
											<div class="col-md-4 col-sm-6">
												<label>Cargo</label>
												<input type="text" id="cargo" class="form-control" v-model="datos.cargo">
											</div>
											<!-- <div class="col-md-4 col-sm-6">
												<label>Ciudad</label>
												<input type="text" class="form-control" v-model="datos.ciudad">
											</div>-->
											<div class="col-md-4 col-sm-6">
												<label>Estado</label>
												<select class="form-control" v-model="datos.id_state">
													<option v-for="estado in datos.estados" :value="estado.id">@{{estado.nombre}}</option>
												</select>
											</div> 
										
											<div class="col-md-4 col-sm-6">
												<label>Nuevo Password</label>
												<input type="password" class="form-control" v-model="datos.password">
											</div>
									
											<div class="col-md-4 col-sm-6" style="overflow-y:scroll; height:130px;" v-show="datos.confirmed_nss">
												<table class="table table-responsive" id="table-nss">
													<thead>
														<tr>
															<th>#</th>
															<th>NSS</th>
															<th>
																<button type="button" class="btn btn" data-toggle="modal" data-target="#modal-nss" data-toggle="tooltip" title="Agregar NSS">
																	<i class="fa fa-plus-circle"></i>
																</button>
															</th>
														</tr>
													</thead>
													<tbody>
														<tr v-for="(nss, key ) in datos.nss">
															<td>@{{key + 1 }}</td>
															<td>@{{nss.nss}}</td>
															<td></td>
														</tr>
													</tbody>
												</table>

											</div>

											<div class="col-md-4 col-sm-6">
												<label>Acerca de </label>
												<textarea class="form-control" id="descripcion" v-model="datos.descripcion"></textarea>
											</div>
											<!-- <div class="col-md-4 col-sm-6">
												<label>Subir Foto de Perfil</label>
												<form action="/upload-target" class="dropzone dz-clickable profile-pic">
													<div class="dz-default dz-message">
														<i class="fa fa-cloud-upload"></i>
														<span>Arrastra el archivo y/o de click</span>
													</div>
												</form>
											</div> -->
											
											<!-- <div class="col-md-4 col-sm-6">
												<label>Upload Profile Cover</label>
												<form action="/upload-target" class="dropzone dz-clickable profile-cover">
													<div class="dz-default dz-message">
														<i class="fa fa-cloud-upload"></i>
														<span>Drop files here to upload</span>
													</div>
												</form>
											</div> -->
											<div class="col-sm-12">
												<button type="button" class="update-btn" v-on:click.prevent="insert()">Actualizar
												</button>
											</div>
										</div>
									</div>
								</div>
								<!-- End Settings -->
								<!-- Modal -->
									<div class="modal fade" id="modal-nss" data-backdrop="static" data-keyboard="false">
									  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <h5 class="modal-title" id="exampleModalLabel">Registro de NSS</h5>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>
									      <div class="modal-body">
									        	
									        	<form class="form-horizontal">
									        		<div class="form-group">
										                <label for="" class="col-md-4 control-label">NSS</label>

										                <div class="col-md-8">
									        				<input type="text" id="nss" class="form-control" v-model="newKeep.nss">
										                </div>
										            </div>

									        	</form>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn" data-dismiss="modal">Cancelar</button>
									        <button type="button" class="btn btn" v-on:click.prevent="insert_nss()">Guardar</button>
									      </div>
									    </div>
									  </div>
									</div>

							</div>
							<!-- Start All Sec -->
						</div>  
                    </div>
                </div>
            </div>
        </section>

		<div class="clearfix"></div>





@stop

@push('scripts')
<script type="text/javascript" src="{{asset('js/candidatos/details_candidate.js')}}" ></script>
@endpush