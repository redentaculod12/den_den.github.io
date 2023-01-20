<html>
	<head>
		<script  type='text/javascript'>
			function preventBack(){window.history.forward();};
			setTimeout('preventBack()',0);
			window.onunload = function(){null;};
		</script>
<?php
	include 'connection_database.php';
	if(true){
		header("location: ../Login.php"); 
		session_destroy();
		exit();
	}
	
?>
	</head>
</html>