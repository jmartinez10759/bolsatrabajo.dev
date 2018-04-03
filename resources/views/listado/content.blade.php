			<!-- Main Banner Section Start -->
			<div class="banner" style="background-image:url(http://solicituddeempleo.com.mx/site_new/assets/img/acceso_reclutador.png);">  
				<div class="container">
					<div class="banner-caption">
						<div class="col-md-12 col-sm-12 banner-text">
							<h1> Más de 5 mil empresas registradas</h1>
							<form class="form-horizontal" method="POST" action="{{ route('login') }}">
								{{ csrf_field() }}
								<div class="col-md-4 no-padd">
									 <div class="input-group">
										 <input type="text" name="vacantes" class="form-control right-bor" placeholder="Habilidades, Vacantes, Compañias">
									 </div>
								</div>
								<div class="col-md-3 no-padd">
									 <div class="input-group">
										 <input type="text" name="localidad" class="form-control right-bor" placeholder="Búsqueda por localidad">
									 </div>
								</div>
								
								<div class="col-md-3 no-padd">
									 <div class="input-group">
										<select class="form-control" name="edo">
											    <option>Seleccione su ciudad</option>
												<option>Aguascalientes</option>
												<option>Baja California</option>

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
								</div>
								
								<div class="col-md-2 no-padd">
									<div class="input-group">
										<button type="submit" class="btn btn-primary">Búsqueda</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<div class="company-brand">
					<div class="container">
						<div id="company-brands" class="owl-carousel">
							<div class="brand-img">
								<img src="{{ asset('images/img/microsoft-home.png') }}" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="{{ asset('images/img/img-home.png') }}" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="{{ asset('images/img/mothercare-home.png') }}" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="{{ asset('images/img/paypal-home.png') }}" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="{{ asset('images/img/serv-home.png') }}" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="{{ asset('images/img/xerox-home.png') }}" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="{{ asset('images/img/yahoo-home.png') }}" class="img-responsive" alt="" />
							</div>
							<div class="brand-img">
								<img src="{{ asset('images/img/mothercare-home.png') }}" class="img-responsive" alt="" />
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<div class="clearfix"></div>
			<!-- Main Banner Section End -->