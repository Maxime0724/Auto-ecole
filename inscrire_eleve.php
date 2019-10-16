<html>
	<head>
		<meta charset=UTF-8>		
	<body>

	<?php
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC'; 
		$dbname = 'nf92p002';
		$idseance = $_POST["idseance"];
		$ideleve = $_POST["ideleve"];

		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

		echo "<br><br>";		
		echo "<TABLE BORDER='1'>";
		echo "<TR><TD>idseance</TD><TD>ideleve</TD></TR>";
		echo "<TR><TD>$idseance</TD><TD>$ideleve</TD></TR>";
		echo "</TABLE>";

		if( $result = mysqli_query($connect, "select * from inscription where idseances = $idseance and ideleve = $ideleve") )
		{
			$row_cnt = $result->num_rows;
			if( $row_cnt == 0 ) 
				{
				$query = "INSERT INTO inscription (idseances, ideleve, note) VALUES ( '$idseance', '$ideleve', '-1');";
				$result = mysqli_query($connect, $query);
				if (!$result) {echo "<br>pas bon".mysqli_error($connect) ;} 
				else {echo "<br>Inscription avec succès.<br><br><br>";
				      echo "<a href='inscription_eleve.php'>Inscrire un autre élève.</a>";			
					}
		
				} 
			else {
				echo "<br><br>Nous ne pouvons pas vous inscrire.<br>";
				echo "<br>Vous vous êtes déjà inscrit à cette seance.<br>";
                 		echo "<br><a href='inscription_eleve.php'>Retourner</a>";
				}
		}
		mysqli_close($connect);

	?>
</body>
</html>
