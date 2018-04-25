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
		fillKeep: {'id_cuenta': '', 'id_vacante': ''},
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
			
			var url = domain("details/vacante");
			//se mete en localstorage el id de vacante para poder hacer la consulta.
			$myLocalStorage.set('id_vacante', keep.id );
			redirect( url );

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