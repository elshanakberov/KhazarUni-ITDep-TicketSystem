<?php include ("functions/init.php");


session_destroy();
	if(isset($_COOKIE['_tram'])){
		unset($_COOKIE['_tram']);
		setcookie('_tram','',time() - 7884000 );
	}

 ?>
