<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MarketSur</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/7ff0a0897d.js"></script>
	<link rel="stylesheet" href="css/estilos.css">

</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand">MarketSur</a>
	  <form class="form-inline">
	    <input class="form-control mr-sm-2" type="search" placeholder="Escribe un producto" aria-label="Search">
	    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
	  </form>
	  <div>
	  	<button class="btn btn-warning btn-sm" type="button">Ingresar</button>
	  	<button class="btn btn-info btn-sm" type="button">Registrarme</button>	
	  </div>
	</nav>

	<div class="container mt-4" id="principal">
		<div class="row">
			<div class="col-md-3">
				<p><b><i class="fas fa-box-open"></i> Categorías</b></p>
				<div class="list-group">
				  <a href="#" v-for="categoria in categorias" class="list-group-item list-group-item-action" v-on:click="listarAvisosPorCategoria(categoria.idCategoria, categoria.nombreCategoria)">
				    {{ categoria.nombreCategoria }} 
				  </a>
				  <a href="#" class="list-group-item list-group-item-action" v-on:click="listarAvisos()"> Todas </a>
				  
				</div>
			</div>
			<div class="col-md-9">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h5>Mostrando {{ cantidadAvisos }} avisos de la categoría: {{ categoriaSeleccionada }}</h5>
						</div>
						<div class="col-md-6 mb-3" v-for="aviso in avisos">
							<div class="card">
							  <img v-bind:src="aviso.imagenAviso" class="card-img-top" alt="...">
							  <div class="card-body">
							    <h4 class="card-title">{{ aviso.tituloAviso}}</h4>
							    <h5><i class="fas fa-hand-holding-usd"></i> {{ Intl.NumberFormat('es-CL').format(aviso.precioAviso)  }}</h5>
							    <p class="card-text">{{ aviso.descripcionAviso }}</p>
							    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modalDatosUsuario" v-on:click="mostrarDatosUsuario(aviso.idUsuario)">Contactar</button>
							  </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="modalDatosUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Publicado por {{ datosUsuario.nombreUsuario + " " + datosUsuario.apellidoUsuario }}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <img v-bind:src="datosUsuario.fotoPerfilUsuario" class="rounded mx-auto d-block" alt="...">
		        <div class="text-center mt-4">
		        	<a v-bind:href="whatsapp + datosUsuario.fonoUsuario" target="_blank" class="btn btn-outline-success"> 
		        		<i class="fab fa-whatsapp"></i> {{ datosUsuario.fonoUsuario }} 
		        	</a>
		        	
		        	<h5> <i class="far fa-paper-plane"></i> {{ datosUsuario.correoUsuario }} </h5>
		        	
		        </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		      </div>
		    </div>
		  </div>
		</div>



	</div>



	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>

</body>
</html>