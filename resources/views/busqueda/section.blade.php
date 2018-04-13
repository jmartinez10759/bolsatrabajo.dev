			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					<!-- Company Searrch Filter Start -->
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
							<form method="POST" action="{{URL::to('vacantes')}}">
								{{ csrf_field() }}
								<div class="col-md-4 col-sm-4">
									<input type="text" name="vacantes" class="typeahead form-control" placeholder="Palabras clave" autocomplete="off">
								</div>
								<div class="col-md-3 col-sm-3">
									<input type="text" ame="localidad" class="form-control" placeholder="Ubicación">
								</div>
								<div class="col-md-3 col-sm-3">
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
								<div class="col-md-2 col-sm-2">
									<button type="submit" class="btn btn-primary">Buscar</button>
								</div>
							</form>
						</div>
					</div>
					<!-- Company Searrch Filter End -->
					<h2>Hemos encontrado {{ count($name) }} resultados de vacantes</h2>
					@if(count($name))
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
										<p><span>{{ $data->title}}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>${{ $data->salary_min }} - {{ $data->salary_max }}</span></p>
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
					@else
							<div class="alert alert-dismissable alert-warning">
							  <button type="button" class="close" data-dismiss="alert">×</button>
							  <h4>Alerta!</h4>
							  <p>No se encuentran registros para este periodo.</p>
							</div>
					@endif
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  

<script type="text/javascript">
    var path = "autocomplete";
    $('input.typeahead').typeahead({
        source:  function (query, process) {

            var data = [
            {'name': 'desarrollador'},
            {'name': 'ventas'},
            {'name': 'administracion'}];

            $myLocalStorage.set('name',data);
            localStorage.setItem("titulo", "Curso de Angular avanzado - Víctor Robles");
              return process(data);

        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>