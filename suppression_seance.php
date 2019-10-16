<html>
	<head>
		<meta charset=UTF-8 >
	</head>

	<body>
		<?php
		date_default_timezone_set('Europe/Paris');
		$date=date("Y-m-d");
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC';
		$dbname = 'nf92p002';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

		echo "<br>Choisissez une séance à supprimer.<br><br>";
		$result = mysqli_query($connect,"SELECT s.idseance, s.DateSeance, t.nom FROM seances s, themes t where DateSeance>'$date' and s.idtheme = t.idtheme");
		echo "<FORM METHOD='POST' ACTION='supprimer_seance.php' >";

		echo "<select name='idseance' size='4' REQUIRED>";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
		echo "<OPTION value='$row[0]'>";
		echo "$row[0] ";
		echo "$row[1] ";
		echo "$row[2]";
		echo "</OPTION>";
		echo "<br><br>";
		}
		echo "</select><br><br>";

		echo "<INPUT type='submit' value='Valider'>";
		echo "</FORM>";
		mysqli_close($connect);
		?>
	</body>
</html>
