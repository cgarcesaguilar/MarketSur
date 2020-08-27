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


var gestionarUsuario = new Vue({

	el: '#modalesUsuario',
	data: {
		tituloInicioSesion: 'Inicie Sesión Usuario',
		user: '',
		password: '',
		nombreUsuario: '',
		apellidoUsuario: '',
		fotoUsuario: '',
		telefonoUsuario: '',
		correoUsuario: '',
		passwordUsuario: ''
	},
	methods: {
		iniciarSesion: function () {
			axios.post(urlControlador, {
					opcion:'iniciarSesion',
					correoUsuario: this.user,
					passwordUsuario: this.password

				} ).then(response => {
				if (response.data == 'iniciar') {
					window.location.reload()
				} else {
					this.tituloInicioSesion = response.data
				}

				//this.datosUsuario = response.data
				
			})
		},
		registrarUsuario: function () {
				axios.post(urlControlador, {
					opcion:'registrarUsuario',
					nombreUsuario: this.nombreUsuario,
					apellidoUsuario: this.apellidoUsuario,
					fotoUsuario: this.fotoUsuario,
					telefonoUsuario: this.telefonoUsuario,
					correoUsuario: this.correoUsuario,
					passwordUsuario: this.passwordUsuario

				} ).then(response => {
					if (response.data == 'exito') {
						$('#modalRegistrarse').modal('hide')
						$('#mensajeRegistro').modal('show')
						setTimeout(function() {
							$('#mensajeRegistro').modal('hide')
							$('#modalInicioSesion').modal('show')
						}, 3000)
					}
				console.log(response.data)

				//this.datosUsuario = response.data
				
			})
		}
	}


})
