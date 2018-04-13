			<!-- Main Banner Section Start -->
			<div class="banner" style="background-image:url(http://solicituddeempleo.com.mx/site_new/assets/img/acceso_reclutador.png);">  
				<div class="container">
					<div class="banner-caption">
						<div class="col-md-12 col-sm-12 banner-text">
							<h1> Más de 5 mil empresas registradas</h1>
							<form class="form-horizontal" method="POST" action="{{URL::to('vacantes')}}">
								{{ csrf_field() }}
								<div class="col-md-4 no-padd">
									 <div class="input-group">
										 <input type="text" name="vacantes" class="typeahead form-control right-bor" placeholder="Habilidades, Vacantes, Compañias" autocomplete="off">
									 </div>
								</div>
								<div class="col-md-3 no-padd">
									 <div class="input-group">
										 <input type="text" id="autocomplete" name="localidad" class="form-control right-bor" placeholder="Búsqueda por localidad">
									 </div>
								</div>
								
								<div class="col-md-3 no-padd">
									 <div class="input-group">
										<select class="form-control" name="edo">
											    <option>Seleccione su ciudad</option>
												<option value="1">Aguascalientes</option>

												<option value="2">Baja California</option>

												<option value="3">Baja California Sur</option>

												<option value="4">Campeche</option>

												<option value="5">Coahuila de Zaragoza</option>

												<option value="6">Colima</option>

												<option value="7">Chiapas</option>

												<option value="8">Chihuahua</option>

												<option value="9">Ciudad de México</option>

												<option value="10">Durango</option>

												<option value="11">Guanajuato</option>

												<option value="12">Guerrero</option>

												<option value="13">Hidalgo</option>

												<option value="14">Jalisco</option>

												<option value="15">México</option>

												<option value="16">Michoacán de Ocampo</option>

												<option value="17">Morelos</option>

												<option value="18">Nayarit</option>

												<option value="19">Nuevo León</option>

												<option value="20">Oaxaca</option>

												<option value="21">Puebla</option>

												<option value="22">Querétaro</option>

												<option value="23">Quintana Roo</option>

												<option value="24">San Luis Potosí</option>

												<option value="25">Sinaloa</option>

												<option value="26">Sonora</option>

												<option value="27">Tabasco</option>

												<option value="28">Tamaulipas</option>

												<option value="29">Tlaxcala</option>

												<option value="30">Veracruz de Ignacio de la Llave</option>

												<option value="31">Yucatán</option>

												<option value="32">Zacatecas</option>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  

<script type="text/javascript">
    var path = "autocomplete";
    $('input.typeahead').typeahead({
        source:  function (query, process) {      
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>