			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					<!-- Company Searrch Filter Start -->
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
							<form method="POST" action="{{URL::to('vacantes')}}">
								{{ csrf_field() }}
								<div class="col-md-4 col-sm-4">
									<input type="text" name="vacantes" class="form-control" placeholder="Palabras clave">
								</div>
								<div class="col-md-3 col-sm-3">
									<input type="text" ame="localidad" class="form-control" placeholder="Ubicación">
								</div>
								<div class="col-md-3 col-sm-3">
									  <select class="form-control" name="edo">
											    <option>Seleccione su ciudad</option>
												<option value='9'>Aguascalientes</option>
												<option value="2">Baja California</option>

												<option>Baja California Sur</option>

												<option>Campeche</option>

												<option>Coahuila </option>

												<option>Colima</option>

												<option>Chiapas</option>

												<option>Chihuahua</option>

												<option>Ciudad de México</option>

												<option>Durango</option>

												<option>Guanajuato</option>

												<option>Guerrero</option>

												<option>Hidalgo</option>

												<option>Jalisco</option>

												<option>Estado de México</option>

												<option>Michoacán de Ocampo</option>

												<option>Morelos</option>

												<option>Nayarit</option>

												<option>Nuevo León</option>

												<option>Oaxaca</option>

												<option>Puebla</option>

												<option>Querétaro</option>

												<option>Quintana Roo</option>

												<option>San Luis Potosí</option>

												<option>Sinaloa</option>

												<option>Sonora</option>

												<option>Tabasco</option>

												<option>Tamaulipas</option>

												<option>Tlaxcala</option>

												<option>Veracruz</option>

												<option>Yucatán</option>

												<option>Zacatecas</option>
										</select>
								</div>
								<div class="col-md-2 col-sm-2">
									<button type="submit" class="btn btn-primary">Buscar</button>
								</div>
							</form>
						</div>
					</div>
					<!-- Company Searrch Filter End -->
					@foreach ($name as $data)  
					<a href="{{ url('detalle/'.$data->id) }}" class="item-click">
						<article>
							<div class="brows-job-list">
								<div class="col-md-1 col-sm-2 small-padding">
									<div class="brows-job-company-img">
										<img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" />
									</div>
								</div>
								<div class="col-md-6 col-sm-5">
									<div class="brows-job-position">
										<h3>{{ $data->name }}</h3>
										<p><span>{{ $data->email}}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>$510 - 700</span></p>
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

					{{ $name->links() }}
		
					
					<!--
					<div class="row">
						<ul class="pagination">
							<li><a href="#">&laquo;</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">&raquo;</a></li> 
						</ul>
					</div>
					-->
					
				</div>
			</section>
			<!-- ========== Begin: Brows job Category End ===============  -->
