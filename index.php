<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MarketSur</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/7ff0a0897d.js"></script>

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
				  <a href="#" v-for="x in categorias" class="list-group-item list-group-item-action">
				    {{ x.nombreCategoria }} - {{ x.idCategoria }}
				  </a>
				  
				</div>
			</div>
			<div class="col-md-9">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="card">
							  <img src="http://lorempixel.com/400/350" class="card-img-top" alt="...">
							  <div class="card-body">
							    <h4 class="card-title">Título producto</h4>
							    <h5><i class="fas fa-hand-holding-usd"></i> 10.000.-</h5>
							    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  </div>
							</div>
						</div>
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