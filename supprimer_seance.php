<html>
	<head>
		<meta charset=UTF-8>
	</head>

	<body>
		<?php
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC';
		$dbname = 'nf92p002';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

		$idseance=$_POST['idseance'];

		$query=" DELETE FROM seances WHERE idseance='$idseance'";
		$result = mysqli_query($connect, $query);

		echo "<br>La suppression de la séance est bien finie.<br><br>";
		
		$q=" DELETE FROM inscription WHERE idseances='$idseance' ";
		$r = mysqli_query($connect, $q);
		
		echo "La suppression d'inscription est bien finie.<br>";
	
		mysqli_close($connect);
		?>
	</body>
</html>
