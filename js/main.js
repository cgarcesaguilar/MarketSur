var urlControlador = 'backend/controlador.php'
var principal = new Vue({

	el: '#principal',
	data: {
		//categorias: ['Vestuario', 'Música', 'Vehículos', 'Pasatiempos']
		categorias: []

	},
	created: function() {
		this.listarCategorias()
	},
	methods: { 
		listarCategorias: function () {
			axios.post(urlControlador, {opcion:'listarCategoria'} ).then(response => {
				this.categorias = response.data
			})
		}
	}


})