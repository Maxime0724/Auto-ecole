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
		$idseance = $_POST['idseance'];		
		$result = mysqli_query($connect,"SELECT inscription.ideleve, eleves.nom, eleves.prenom, inscription.note FROM inscription, eleves where inscription.idseances = $idseance and eleves.ideleve = inscription.ideleve");
		echo "<table border='1'>";
		echo "<tr><td>ideleve</td><td>nom</td><td>prénom</td><td>note</td></tr>";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
			{
			if ($row[3]=='-1') 
			{
			echo "<tr>";
			echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>"."à évaluer"."</td>";
			echo "</tr>";
			}			
			else
			{
			echo "<tr>";
			echo "<td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td>";
			echo "</tr>";
			}
			}
		echo "</table><br>";

		mysqli_close($connect);
		?>
	</body>
</html>
