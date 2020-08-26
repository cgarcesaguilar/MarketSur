var urlControlador = 'backend/controlador.php'
var principal = new Vue({

	el: '#principal',
	data: {
		//categorias: ['Vestuario', 'Música', 'Vehículos', 'Pasatiempos']
		categorias: [],
		avisos: [],
		cantidadAvisos: '',
		categoriaSeleccionada: 'Todas',
		datosUsuario: [],
		whatsapp: 'https://api.whatsapp.com/send?phone='

	},
	created: function() {
		this.listarCategorias()
		this.listarAvisos()
	},
	methods: { 
		listarCategorias: function () {
			axios.post(urlControlador, {opcion:'listarCategoria'} ).then(response => {
				this.categorias = response.data
			})
		},
		listarAvisos: function () {
			axios.post(urlControlador, {opcion:'listarAvisos'} ).then(response => {
				this.avisos = response.data
				this.cantidadAvisos = response.data.length
				this.categoriaSeleccionada = 'Todas'
			})
		},
		listarAvisosPorCategoria: function (idCategoria, nombreCategoria) {
			axios.post(urlControlador, {
					opcion:'listarAvisosPorCategoria',
					idCategoria: idCategoria
				} ).then(response => {
				this.avisos = response.data
				this.cantidadAvisos = response.data.length
				this.categoriaSeleccionada = nombreCategoria
			})
		},
		mostrarDatosUsuario: function (idUsuario) {
			axios.post(urlControlador, {
					opcion:'mostrarDatosUsuario',
					idUsuario: idUsuario
				} ).then(response => {
				this.datosUsuario = response.data
				
			})
		}
	}


})

