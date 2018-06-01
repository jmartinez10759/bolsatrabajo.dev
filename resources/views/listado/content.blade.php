			<!-- Main Banner Section Start -->
			<div class="banner" style="background-image:url(http://solicituddeempleo.com.mx/site_new/assets/img/acceso_reclutador.png);">
				<div class="container">
					<div class="banner-caption">
						<div class="col-md-12 col-sm-12 banner-text">
							<h1> Más de 5 mil empresas registradas</h1>
							<form class="form-horizontal" method="POST" action="{{URL::to('vacantes')}}">
								{{ csrf_field() }}
								<div class="col-md-5 no-padd">
									 <div class="input-group">
										 <input type="text" name="vacantes" class="typeahead form-control right-bor" placeholder="Habilidades, Vacantes, Compañias" autocomplete="off" required title="dede">
									 </div>
								</div>
								<!-- <div class="col-md-3 no-padd">
									 <div class="input-group">
										 <input type="text" id="autocomplete" name="localidad" class="form-control right-bor" placeholder="Búsqueda por localidad" disabled>
									 </div>
								</div> -->

								<div class="col-md-5 no-padd">
									 <div class="input-group">
										<select class="form-control" name="edo" >
											    <option value="" selected disabled>Seleccione su ciudad</option>
											    @forelse(App\Model\BlmEstadosModel::all() as $edo)
						                        <option value="{!! $edo->id !!}">{!! $edo->nombre !!}</option>
						                        @empty
						                        <option value="" selected disabled>No hay registros</option>
						                        @endforelse
						                    </select>
									 </div>
								</div>
								<input type="hidden" name="utilisateur" value="{{ Session::get('id') }}">
								<div class="col-md-2 no-padd">
									<div class="input-group">
										<button type="submit" class="btn btn-primary">Búsqueda</button>
									</div>
								</div>
							</form>
						</div>
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


			<div class="clearfix"></div>
			<!-- Main Banner Section End -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script type="text/javascript">
    var path = "autocomplete";
    jQuery('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>
