			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					<!-- Company Searrch Filter Start -->
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
							<form>
								<div class="col-md-4 col-sm-4">
									<input type="text" class="form-control" placeholder="Palabras clave">
								</div>
								<div class="col-md-3 col-sm-3">
									<input type="text" class="form-control" placeholder="Ubicación">
								</div>
								<div class="col-md-3 col-sm-3">
									<select class="form-control">
									  <option>Seleccione una opción</option>
									  <option>Tecnología de la Información</option>
									  <option>Mecatronica</option>
									  <option>Hardware</option>
									</select>

								</div>
								<div class="col-md-2 col-sm-2">
									<button type="submit" class="btn btn-primary">Filtrar</button>
								</div>
							</form>
						</div>
					</div>
					<!-- Company Searrch Filter End -->
					@foreach ($name as $product)  
					<a href="job-detail.html" class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" />
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<h3>{{ $product->name }}</h3>
										<p><span>{{ $product->email}}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$510 - 700</span></p>
									</div>
								</div>
								<div class="col-md-3 col-sm-3">
									<div class="brows-job-location">
										<p><i class="fa fa-map-marker"></i>QBL Park, C40</p>
									</div>
								</div>
								<div class="col-md-2 col-sm-2">
									<div class="brows-job-type">
										<span class="full-time">Full Time</span>
									</div>
								</div>
							</div>
						</article>
					</a>
					@endforeach
		
					
					<!--/.row-->
					<div class="row">
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">&raquo;</a></li> 
						</ul>
					</div>
					
				</div>
			</section>
			<!-- ========== Begin: Brows job Category End ===============  -->
