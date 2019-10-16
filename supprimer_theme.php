<html>
	<head>
		<meta charset=UTF-8>
	</head>
	<body>
		<?php
		date_default_timezone_set('Europe/Paris');
		$date=date("Y-m-d");
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC';
		$dbname = 'nf92p002';
		$connect   =   mysqli_connect($dbhost,   $dbuser,   $dbpass,   $dbname)   or   die   ('Error   connecting   to mysql');
		$idtheme=$_POST['idtheme'];

		$q = "UPDATE themes SET supprime = '1' WHERE idtheme = '$idtheme' ";
		$query=" DELETE FROM seances WHERE DateSeance>'$date' and idtheme='$idtheme'";
		$qu=" DELETE FROM inscription WHERE idseances not in (select idseance from seances)";

		$result = mysqli_query($connect, $query);
		$r = mysqli_query($connect, $q);
		$re = mysqli_query($connect, $qu);

		echo "<br><h2>Suppression avec succès.</h2>";
		
		mysqli_close($connect);
		?>
	</body>
</html>
