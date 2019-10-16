<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html ; charset=UTF-8" />
	</head>
	<body>
	<?php
		date_default_timezone_set('Europe/Paris');
		$date = date("Y­-m-­d");
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC'; 
		$dbname = 'nf92p002';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

		echo "<FORM METHOD='POST' ACTION='inscrire_eleve.php' >";
		echo "<br><br>Choisissez une séance.<br><br>";
		echo "<select name='idseance' size='4'>";
		$query = "SELECT themes.nom, seances.DateSeance, seances.idseance, seances.EffMax FROM seances, themes where  			  seances.idtheme = themes.idtheme and seances.DateSeance>'2018-06-11' and seances.EffMax > (SELECT count(*) from inscription where idseances = seances.idseance)";
		$result = mysqli_query($connect,$query);
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
		echo "<OPTION value='$row[2]'>";
		echo " Themes:$row[0]  $row[1] idseance:$row[2] effectif max:$row[3]";
		echo "</OPTION>";
		echo "<br>";
		}
		echo "</select>";
		echo "<br><br><br>";


		$result = mysqli_query($connect,"SELECT * FROM eleves");
		echo "Choisissez un ou une élève.<br><br>";
		echo "<select name='ideleve' size='10'>";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
		echo "<OPTION value='$row[0]'>";
		echo "$row[0] $row[1] $row[2]";
		echo "</OPTION>";
		echo "<br>";
		}
		echo "</select>";
		echo "<br><br>";
		echo "<INPUT type='submit' value='Enregistrer'>";
		echo "</FORM>";
		mysqli_close($connect);
	?>
</body>
</html>

