<?php require_once('backend/seguridad.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mis Publicaciones</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/7ff0a0897d.js"></script>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
	  <a class="navbar-brand" href="index.php">MarketSur</a>
	  

	  	<div class="dropdown">
		  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <?php echo $_SESSION["nombreCompletoUsuario"];  ?>
		  </button>
		  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		    <a class="dropdown-item" href="mispublicaciones.php">Mis Publicaciones</a>
		    <a class="dropdown-item" href="#">Mi cuenta</a>
		    <a class="dropdown-item" href="backend/cerrarSesion.php">Cerrar Sesión</a>
		  </div>
		</div>
		

	  
	</nav>

	<div class="container" id="avisosUsuario">
		<div class="row">
			<div class="col-md-12 mt-4">
				<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#publicarAviso">Publicar</button>
			</div>
			<div class="col-md-12 mt-4">
				<h1 v-if="avisosUsuario.length == 0">Aún no tiene publicaciones</h1>
				<table class="table" v-else>
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titulo</th>
      <th scope="col">Precio</th>
      <th scope="col">Categoria</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="aviso in avisosUsuario">
      <th scope="row">{{ aviso.idAviso }}</th>
      <td>{{ aviso.tituloAviso }}</td>
      <td>{{ aviso.precioAviso }}</td>
      <td>{{ aviso.nombreCategoria }}</td>
      <td>
      	<button class="btn btn-info btn-sm" v-on:click="editarAviso(aviso.idAviso)">
      		<i class="far fa-edit"></i>
      	</button>
      	<button class="btn btn-danger btn-sm" v-on:click="eliminarAviso(aviso.idAviso)">
      		<i class="far fa-trash-alt"></i>
      	</button>
      </td>
    </tr>
    
  </tbody>
</table>


			</div>

		</div>	

		<div class="modal fade" id="publicarAviso" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"> {{ tituloAvisoNuevo }}</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form>
		    
				  <div class="form-group">
				    <label for="inputAddress">Título</label>
				    <input type="text" class="form-control" v-model="tituloAviso">
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="inputCity">Precio</label>
				      <input type="text" class="form-control" id="inputCity" v-model="precioAviso">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="inputState">Categoria</label>
				      <select id="inputState" class="form-control" v-model="categoriaAviso">
				        <option selected>Seleccione...</option>
				        <option v-for="cate in categorias" v-bind:value="cate.idCategoria">{{ cate.nombreCategoria}}</option>
				      </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputAddress">Imagen</label>
				    <input type="text" class="form-control" id="inputAddress" v-model="imagenAviso">
				  </div>
				  <div class="form-group">
				    <label for="inputAddress2">Descripción</label>
				    <textarea class="form-control" rows="3" v-model="descripcionAviso"></textarea>
				  </div>
				  
				  <button type="submit" class="btn btn-primary" v-on:click.prevent="publicarAviso">Publicar</button>
				</form>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>





	</div>
	
	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.20.0/axios.min.js" integrity="sha512-quHCp3WbBNkwLfYUMd+KwBAgpVukJu5MncuQaWXgCrfgcxCJAq/fo+oqrRKOj+UKEmyMCG3tb8RB63W+EmrOBg==" crossorigin="anonymous"></script>
	<script src="js/accionesUsuario.js"></script>
</body>
</html>