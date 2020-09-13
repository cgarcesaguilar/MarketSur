var urlControlador = 'backend/controlador.php'

var accionesUsuario = new Vue({

	el: '#avisosUsuario',
	data: {
		avisosUsuario: [],
		categorias: [],
		tituloAviso: '',
		precioAviso: '',
		categoriaAviso: '',
		descripcionAviso: '',
		imagenAviso: '',
		tituloAvisoNuevo: 'Ingrese nuevo aviso'

	},
	created: function() {
		this.listarAvisosUsuario();
		this.listarCategorias()
	},
	methods: {
		listarAvisosUsuario: function () {
			axios.post(urlControlador, {opcion:'listarAvisosUsuario'} ).then(response => {
				this.avisosUsuario = response.data
				console.log(response.data)
			})
		},
		listarCategorias: function () {
			axios.post(urlControlador, {opcion:'listarCategoria'} ).then(response => {
				this.categorias = response.data
			})
		},
		publicarAviso: function () {
				axios.post(urlControlador, {
					opcion:'publicarAviso',
					tituloAviso: this.tituloAviso,
					precioAviso: this.precioAviso,
					categoriaAviso: this.categoriaAviso,
					descripcionAviso: this.descripcionAviso,
					imagenAviso: this.imagenAviso

				} ).then(response => {
					if (response.data == 'exito') {
						this.tituloAvisoNuevo = 'Aviso publicado con exito'
						this.tituloAviso = ''
						this.precioAviso = ''
						this.categoriaAviso = ''
						this.descripcionAviso = ''
						this.imagenAviso = ''

						setTimeout(function() {
							$('#publicarAviso').modal('hide')
						}, 3000)
					} else {
						this.tituloRegistrarme = response.data
					}
					this.listarAvisosUsuario()

					console.log(response.data)
				
			})
		},
		editarAviso: function(idAviso) {
			axios.post(urlControlador, {opcion:'editarAviso', id: idAviso} ).then(response => {
				this.avisosUsuario = response.data
				console.log(response.data)
			})
		}, 
		eliminarAviso: function(idAviso) {
			var opcion = confirm("¿Desea eliminar este aviso?");
			 if (opcion == true) {
				axios.post(urlControlador, {opcion:'eliminarAviso', id: idAviso} ).then(response => {
					alert(response.data)
					console.log(response.data)
					this.listarAvisosUsuario()
				}) 	

			 }
			
		}

	}

})