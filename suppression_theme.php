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
		$query = "SELECT * FROM themes where supprime = 0";
		$result = mysqli_query($connect,$query);

		echo "<br>Choisissez un thème à supprimer.<br>";
		echo "<br>";
		echo "<FORM METHOD='POST' ACTION='supprimer_theme.php'>";

		echo "<select name='idtheme' size='10' >";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{

		echo "<OPTION VALUE='$row[0]'>$row[0].$row[1]</OPTION>";
		}
		echo "</select>";
		echo "<br><br>";
		echo "<INPUT type='submit' value='Valider'>";
		echo "</FORM>";
		mysqli_close($connect);
		?>
	</body>
</html>
