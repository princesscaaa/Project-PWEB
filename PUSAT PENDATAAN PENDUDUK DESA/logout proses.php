<?php
session_start();
if (empty($_SESSION['id'])):
    header('Location: login.php');
endif;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div style="width:150px; margin:auto; height:500px; margin-top: 300px">

	<?php
		include('db connection.php');
		session_destroy();

		echo '<meta http-equiv="refresh" content="2; url=index.html">';
		echo '<progress max=100><strong>Progress: 60% done.</strong></progress><br>';
		echo '<span class="itext">Logging out, please wait!..</span>';
	?>
	
	</div>
</body>
</html>
