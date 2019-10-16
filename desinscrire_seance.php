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
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$ideleve = $_POST['ideleve'];
		$idseance = $_POST['idseance'];

		if($idseance=='-1')
		{
		echo "<FORM METHOD='POST' ACTION='' >";
		echo "Choisissez une séance à désinscrire<br>";
		echo "<INPUT TYPE='hidden' value='$ideleve' NAME='ideleve'>";
		echo "<br>";
		echo "<select name='idseance' size'4' REQUIRED>";
		$result = mysqli_query($connect,"SELECT s.idseance, s.DateSeance, t.nom FROM seances s, themes t, inscription i where DateSeance>'$date' and i.ideleve = '$ideleve' and i.idseances=s.idseance and t.idtheme=s.idtheme");
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
		echo "<OPTION value='$row[0]'>";
		echo "($row[0]) ";
		echo "$row[1] ";
		echo "$row[2]";
		echo "</OPTION>";
		echo "<br>";
		}
		echo "</select>";
		echo "<br><br>";

		echo "<INPUT type='submit' value='Valider'>";
		echo "</FORM>";
		}
		else

		{
		$query = "DELETE FROM inscription WHERE idseances='$idseance' and ideleve='$ideleve'";
		$result = mysqli_query($connect, $query);
		
		echo "<br><h3>La suppression d'inscription que vous avez choisi est bien réussi.</h3><br>";
		}
		?>

	</body>
</html>
