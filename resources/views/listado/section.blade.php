<!-- Top Features Section Start-->
<section class="testimonial" id="testimonial">
	<div class="container">

		<div class="row">
			<div class="main-heading">
				<p></p>
				<h2>Vacantes <span>Destacadas </span></h2>
			</div>
		</div>
		<!--/row-->
		<div class="row">
			<div id="client-testimonial-slider" class="owl-carousel">
				@foreach( $destacadas as $destacada)
					<div class="client-testimonial" style="cursor:pointer;" onclick="details_jobs( {{ $destacada->id }} )">
						<div class="brows-job-company-img">
							<img src="{{ $destacada->accounts[0]->logo }}" class="img-responsive" alt="" height="100%" width="100%">
						</div>
						<p class="client-description">
							{{$destacada->name}}
						</p>
						<h3 class="client-testimonial-title">{{ $destacada->accounts[0]->name }}</h3>
						@if( $destacada->salary_min && $destacada->salary_max )
							<p class="client-description">$ {{ $destacada->salary_min }} - $ {{ $destacada->salary_max }}</p>
						@else
							<p class="client-description">Salario No Mostrado</p>
						@endif
						<p class="client-description">{{ $destacada->estados[0]->nombre }}</p>
						<ul class="client-testimonial-rating">
							<li class="fa fa-star"></li>
							<li class="fa fa-star"></li>
							<li class="fa fa-star"></li>
							<li class="fa fa-star"></li>
							<li class="fa fa-star"></li>
							<li class="fa fa-star-o"></li>
						</ul>
				</div>
				@endforeach


			</div>
		</div>

	</div>
</section>

<div id="vue-listado">

			<div class="clearfix"></div>
			<!-- Top Features Section End-->
			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category">
				<div class="container">
					<div class="row">
						<h2>Hemos encontrado @{{ pagination.total }} resultados de vacantes</h2>
					</div>
					<!--/.row-->
					<div class="row">
						<div class="item-click" v-for="data in keeps.vacantes.data" style="cursor: pointer;" >
							<article  @click="get('detalle', data)">
								<div class="brows-job-list">
									<div class="col-md-1 col-sm-2 small-padding">
										<div class="brows-job-company-img">
											<img :src="data.accounts[0].logo" class="img-responsive" alt="" />
										</div>
									</div>

									<div class="col-md-6 col-sm-5">
										<div class="brows-job-position">
											<h3>@{{ data.name }}</h3>
											<p><span>@{{ data.accounts[0].name }}</span>
												<span class="brows-job-sallery" v-if="data.salary_min == ''"><i class="fa fa-money"></i>Salario No Mostrado</span>
												<span class="brows-job-sallery"v-else-if="data.salary_max == ''"><i class="fa fa-money"></i>Salario No Mostrado</span>
												<span class="brows-job-sallery"v-else><i class="fa fa-money"></i>$@{{ data.salary_min }} - $ @{{ data.salary_max }}</span>
											</p>
										</div>
									</div>

									<div class="col-md-3 col-sm-3">
										<div class="brows-job-location">
											<p><i class="fa fa-map-marker"></i>@{{data.estados[0].nombre}}</p>
										</div>
									</div>

									<div class="col-md-2 col-sm-2">
										<div class="brows-job-type">
											<span class="full-time">@{{data.contract_type[0].name}}</span>
										</div>
									</div>

								</div>
							</article>

						</div>

					</div>

					<div class="row">
						<ul class="pagination">
							<li v-if="pagination.current_page > 1">
								<a href="#" @click.prevent="changePage(pagination.current_page - 1)">&laquo;</a></li>
							<li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
								<a href="#" @click.prevent="changePage(page)">
									@{{ page }}
								</a></li>
							<li v-if="pagination.current_page < pagination.last_page">
								<a href="#" @click.prevent="changePage(pagination.current_page + 1)">
									&raquo;
								</a>
							</li>
						</ul>
					</div>


				</div>
			</section>

</div>
			<!-- ========== Begin: Brows job Category End ===============  -->

			<!-- testimonial section Start -->
			<!-- <section class="testimonial" id="testimonial">
				<div class="container">
					<div class="row">
						<div class="main-heading">
							<p>HISTORIAS DE EXITO</p>
							<h2>Tú puedes ser <span>una HISTORIA más de EXITO	...</span></h2>
						</div>
					</div>
					<div class="row">
						<div id="client-testimonial-slider" class="owl-carousel">
							<div class="client-testimonial">
								<div class="pic">
									<img src="http://via.placeholder.com/150x150" alt="">
								</div>
								<p class="client-description">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.
								</p>
								<h3 class="client-testimonial-title">Lacky Mole</h3>
								<ul class="client-testimonial-rating">
									<li class="fa fa-star-o"></li>
									<li class="fa fa-star-o"></li>
									<li class="fa fa-star"></li>
								</ul>
							</div>

							<div class="client-testimonial">
								<div class="pic">
									<img src="http://via.placeholder.com/150x150" alt="">
								</div>
								<p class="client-description">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.
								</p>
								<h3 class="client-testimonial-title">Karan Wessi</h3>
								<ul class="client-testimonial-rating">
									<li class="fa fa-star-o"></li>
									<li class="fa fa-star"></li>
									<li class="fa fa-star"></li>
								</ul>
							</div>

							<div class="client-testimonial">
								<div class="pic">
									<img src="http://via.placeholder.com/150x150" alt="">
								</div>
								<p class="client-description">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.
								</p>
								<h3 class="client-testimonial-title">Roul Pinchai</h3>
								<ul class="client-testimonial-rating">
									<li class="fa fa-star-o"></li>
									<li class="fa fa-star-o"></li>
									<li class="fa fa-star"></li>
								</ul>
							</div>

							<div class="client-testimonial">
								<div class="pic">
									<img src="http://via.placeholder.com/150x150" alt="">
								</div>
								<p class="client-description">
									Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor et dolore magna aliqua.
								</p>
								<h3 class="client-testimonial-title">Adam Jinna</h3>
								<ul class="client-testimonial-rating">
									<li class="fa fa-star-o"></li>
									<li class="fa fa-star-o"></li>
									<li class="fa fa-star"></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section> -->
			<!-- testimonial section End -->

@push('scripts')
<script type="text/javascript" src="{{asset('js/listado/listado_vacantes.js')}}" ></script>
<script>
      var autocomplete;

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjiPiq0g0VPiJ9fZUNsvvmI7JczVr_5Ks&libraries=places&callback=initAutocomplete"
        async defer></script>

@endpush
