			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					<!-- Company Searrch Filter Start -->
					<div class="row extra-mrg">
						<div class="wrap-search-filter">
							<form method="POST" action="{{URL::to('vacantes')}}">
								{{ csrf_field() }}
								<div class="col-md-4 col-sm-4">
									<input type="text" name="vacantes" class="typeahead form-control" placeholder="Palabras clave" autocomplete="off" required>
								</div>
								<div class="col-md-3 col-sm-3">
									<input type="text" ame="localidad" class="form-control" placeholder="Ubicación">
								</div>
								<div class="col-md-3 col-sm-3">
									  <select class="form-control" name="edo" required>
											    <option selected disabled>Seleccione su ciudad</option>
											    @forelse(App\Model\BlmEstadosModel::all() as $edo)
						                        <option value="{!! $edo->id !!}">{!! $edo->nombre !!}</option>
						                        @empty
						                        <option value="" selected disabled>No hay registros</option>
						                        @endforelse
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

            /*var data = [
            {'name': 'desarrollador'},
            {'name': 'ventas'},
            {'name': 'administracion'}];

            $myLocalStorage.set('name',data);
            localStorage.setItem("titulo", "Curso de Angular avanzado - Víctor Robles");
              return process(data);*/

        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>