<html>
	<head>
		<meta charset=utf-8>
	</head>

	<body>
		<?php
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC';
		$dbname = 'nf92p002';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$result = mysqli_query($connect,"SELECT * FROM seances where seances.DateSeance<'2018-06-11'");
		echo "<Form method='POST' action='statistique2_eleve.php'>";
		echo "<h3>Choisissez une séance faites pour voir sa statistique.</h3><br>";		
		echo "<select name = 'idseance' size='4'>";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
			{
			echo "<option value = '$row[0]'>idseance:$row[0] $row[1] idthème:$row[3]</option>";	
			}
		echo "<select><br><br>";
		echo "<Input type='submit' value='Valider'>";
		echo "</form>";
		mysqli_close($connect);
		?>
	</body>
</html>
