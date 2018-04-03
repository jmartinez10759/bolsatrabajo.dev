			<!-- Top Features Section Start-->
			<section class="first-feature" >
				<div class="container">
					<div class="all-features">
					
						<div class="col-md-3 col-sm-6 small-padding">
							<div class="job-feature">
								<div class="feature-icon">
									<i class="fa fa-desktop"></i>
								</div>
								<div class="feature-caption">
									<h5>Web Developer</h5>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 small-padding">
							<div class="job-feature">
								<div class="feature-icon">
									<i class="fa fa-mobile"></i>
								</div>
								<div class="feature-caption">
									<h5>Mobile Developer</h5>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 small-padding">
							<div class="job-feature">
								<div class="feature-icon">
									<i class="fa fa-lightbulb-o"></i>
								</div>
								<div class="feature-caption">
									<h5>Creative Designer</h5>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 small-padding">
							<div class="job-feature">
								<div class="feature-icon">
									<i class="fa fa-file-text"></i>
								</div>
								<div class="feature-caption">
									<h5>Content Writer</h5>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 small-padding">
							<div class="job-feature">
								<div class="feature-icon">
									<i class="fa fa-hdd-o"></i>
								</div>
								<div class="feature-caption">
									<h5>Manager</h5>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3 col-sm-6 small-padding">
							<div class="job-feature">
								<div class="feature-icon">
									<i class="fa fa-bullhorn"></i>
								</div>
								<div class="feature-caption">
									<h5>Sales & Marketing</h5>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 small-padding">
							<div class="job-feature">
								<div class="feature-icon">
									<i class="fa fa-credit-card"></i>
								</div>
								<div class="feature-caption">
									<h5>Accountant</h5>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
								</div>
							</div>
						</div>
						
						<div class="col-md-3 col-sm-6 small-padding">
							<div class="job-feature">
								<div class="feature-icon">
									<i class="fa fa-user"></i>
								</div>
								<div class="feature-caption">
									<h5>Management / HR</h5>
									<p>At vero eos et accusamus et iusto odio dignissimos ducimus.</p>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!-- Top Features Section End-->
			
			<!-- ========== Begin: Brows job Category ===============  -->
			<section class="brows-job-category" id="vue-listado">
				<div class="container">
					<div class="row">
						<h2>Hemos encontrado 477 resultados de vacantes, estás viendo 7 a 27</h2>
					</div>
					<!--/.row-->
					<div class="row">
					

						<div class="item-click" v-for="data in keeps" style="cursor: pointer;" >
							<article  @click="get('detalle', data)">
								<div class="brows-job-list">
									<div class="col-md-1 col-sm-2 small-padding">
										<div class="brows-job-company-img">
											<img src="http://via.placeholder.com/150x150" class="img-responsive" alt="" />
										</div>
									</div>
									
									<div class="col-md-6 col-sm-5">
										<div class="brows-job-position">
											<h3>@{{ data.name }}</h3>
											<p><span>@{{ data.email }}</span><span class="brows-job-sallery"><i class="fa fa-money"></i>@{{ data.password }}</span></p>
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
						</div>
						
					</div>
					
					<div class="row">
						<ul class="pagination">
							<li v-if="pagination.current_page > 1">
								<a href="#" @click.prevent="changePage(pagination.current_page - 1)">&laquo;</a></li>
							<li class="active" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
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
			<!-- ========== Begin: Brows job Category End ===============  -->
			
			<!-- testimonial section Start -->
			<section class="testimonial" id="testimonial">
				<div class="container">
					<div class="row">
						<div class="main-heading">
							<p>HISTORIAS DE EXITO</p>
							<h2>Tú puedes ser <span>una HISTORIA más de EXITO	...</span></h2>
						</div>
					</div>
					<!--/row-->
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
			</section>
			<!-- testimonial section End -->
@push('scripts')

<script type="text/javascript">

new Vue({
	el: '#vue-listado',
	created: function() {
		this.getKeeps();
	},
	data: {
		keeps: [],
		pagination: {
			'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
		},
		newKeep: '',
		fillKeep: {'id_cuenta': '', 'id_vacante': '', 'idp': ''},
		errors: '',
		offset: 3,
	},
	computed: {
		isActived: function() {
			return this.pagination.current_page;
		},
		withoutErrors: function() {
			this.errors = '';
		},
		pagesNumber: function() {
			if(!this.pagination.to){
				return [];
			}

			var from = this.pagination.current_page - this.offset; 
			if(from < 1){
				from = 1;
			}

			var to = from + (this.offset * 2); 
			if(to >= this.pagination.last_page){
				to = this.pagination.last_page;
			}

			var pagesArray = [];
			while(from <= to){
				pagesArray.push(from);
				from++;
			}
			return pagesArray;
		}
	},
	methods: {
		get: function(uri,keep){
			this.fillKeep.id_cuenta = keep.email;
			this.fillKeep.id_vacante = keep.id;
			this.fillKeep.idp = keep.password;
			console.log(this.fillKeep);
			//alert(JSON.stringify(this.fillKeep));
			//window.location.href = uri+ '/' + this.fillKeep;
			//this.get_general(uri,this.fillKeep);
		},
		getKeeps: function(page) {
			var urlKeeps = 'listado?page='+page;
			axios.get(urlKeeps).then(response => {
				this.keeps = response.data.tasks.data,
				this.pagination = response.data.pagination
			});
		},
		editKeep: function(keep) {
			this.fillKeep.id   = keep.id;
			this.fillKeep.keep = keep.keep;
			$('#edit').modal('show');
		},
		updateKeep: function(id) {
			var url = 'listado/' + id;
			axios.put(url, this.fillKeep).then(response => {
				this.getKeeps();
				this.fillKeep = {'id': '', 'name': '', 'password': ''};
				this.errors	  = [];
				$('#edit').modal('hide');
				toastr.success('Tarea actualizada con Ã©xito');
			}).catch(error => {
				this.errors = 'Corrija para poder editar con Ã©xito'
			});
		},
		deleteKeep: function(keep) {
			var url = 'listado/' + keep.id;
			axios.delete(url).then(response => { //eliminamos
				this.getKeeps(); //listamos
				toastr.success('Eliminado correctamente'); //mensaje
			});
		},
		createKeep: function() {
			var url = 'listado';
			axios.post(url, {
				keep: this.newKeep
			}).then(response => {
				this.getKeeps();
				this.newKeep = '';
				this.errors = [];
				$('#create').modal('hide');
				toastr.success('Nueva tarea creada con Ã©xito');
			}).catch(error => {
				this.errors = 'Corrija para poder crear con Ã©xito'
			});
		},
		changePage: function(page) {
			this.pagination.current_page = page;
			this.getKeeps(page);
		}
	}
});


</script>
        
@endpush
