<html>
	<head>
		<meta charset=UTF-8 >
	</head>

	<body>
		<?php
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC';
		$dbname = 'nf92p002';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$ideleve = $_POST['ideleve'];
		$result = mysqli_query($connect,"SELECT * FROM eleves where ideleve='$ideleve'");

		echo "<br><TABLE BORDER='1'>";
		echo "<TR>";
		echo "<TD>ideleve</TD><TD>NOM</TD><TD>Prénom</TD><TD>Date de naissance</TD><TD>Date d'inscription</TD>";
		echo "</TR>";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
		echo "<TR>";
		echo "<TD>$row[0]</TD><TD>$row[1]</TD><TD>$row[2]</TD><TD>$row[3]</TD><TD>$row[4]</TD>";
		echo "</TR>";
		}
		echo "</TABLE>";

		mysqli_close($connect);
		?>
	</body>
</html>
