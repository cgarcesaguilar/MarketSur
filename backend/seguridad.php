<?php 
session_start();
if (!isset($_SESSION["nombreCompletoUsuario"])) {
echo '<script>
	
	window.location = "index.php"
</script>
';
}


