<html>
	<head>
		<title>Noter élève</title>
		<meta charset=UTF-8 >
	</head>
	<body>
		<?php
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC';
		$dbname = 'nf92p002';
		$ideleve = $_POST['ideleve'];
		$idseance = $_POST['idseance'];
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$note = $_POST['note'];
		$vraisnote = 40-$note;
		$r = mysqli_query($connect, "SELECT nom, prenom FROM eleves WHERE ideleve = '$ideleve'");

		while ($row = mysqli_fetch_array($r, MYSQL_NUM))
		{
			echo "<br><h2>Vous avec noté avec succès.</h2><br>";
			echo "<TABLE BORDER='1'>";
			echo "<TR>";
			echo "<TD>ideleve</TD><TD>nom</TD><TD>prénom</TD><TD>idseance</TD><TD>note</TD>";
			echo "</TR>";
			echo "<TR>";
			echo "<TD>$ideleve</TD><TD>$row[0]</TD><TD>$row[1]</TD><TD>$idseance</TD><TD>$vraisnote</TD>";
			echo "</TR>";
			echo "</TABLE>";
		}
		$result=mysqli_query($connect,"UPDATE inscription
		SET note='$vraisnote'
		WHERE ideleve='$ideleve' and idseances = '$idseance';");
		mysqli_close($connect);

		?>
	</body>
</html>

