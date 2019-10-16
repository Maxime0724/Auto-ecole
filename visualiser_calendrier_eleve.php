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
	$ideleve=$_POST['ideleve'];
	$result = mysqli_query($connect,"SELECT * FROM eleves where ideleve='$ideleve'");
	$r = mysqli_query($connect,"SELECT seances.idseance, seances.DateSeance, themes.nom FROM seances, themes, inscription where 		inscription.ideleve='$ideleve' and inscription.idseances = seances.idseance and seances.idtheme = themes.idtheme and 		seances.DateSeance>='$date' ");
	echo "<TABLE BORDER='1'>";
	echo "<TR>";
	echo "<TD>idélève</TD><TD>nom</TD><TD>prenom</TD>";
	echo "</TR>";
	while ($row = mysqli_fetch_array($result, MYSQL_NUM))
	{
	echo "<TR>";
	echo "<TD>$row[0]</TD><TD>$row[1]</TD><TD>$row[2]</TD>";
	echo "</TR>";
	}
	echo "</TABLE><br><br>";

	echo "<TABLE BORDER='1'>";
	echo "<TR>";
	echo "<TD>Idséance</TD><TD>Date de la séance</TD><TD>Nom du thème</TD>";
	echo "</TR>";
	while ($row = mysqli_fetch_array($r, MYSQL_NUM))
	{
	echo "<TR>";
	echo "<TD>$row[0]</TD><TD>$row[1]</TD><TD>$row[2]</TD>";
	echo "</TR>";
	}
	echo "</TABLE>";

	mysqli_close($connect);
	?>
	</body>
</html>
