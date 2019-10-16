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
		$query = "SELECT * FROM eleves";
		$result = mysqli_query($connect,$query);

		echo "Choisissez un élève à visualiser son calendrier.<br>";
		echo "<br>";
		echo "<FORM METHOD='POST' ACTION='visualiser_calendrier_eleve.php'>";

		echo "<select name='ideleve' size='8' REQUIRED>";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{

		echo "<OPTION VALUE='$row[0]'>$row[0].$row[1] $row[2]</OPTION>";
		}
		echo "</select>";
		echo "<br><br>";
		echo "<INPUT type='submit' value='Valider'>";
		echo "</FORM>";
		mysqli_close($connect);
		?>
	</body>
</html>
