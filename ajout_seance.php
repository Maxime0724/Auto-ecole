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
		$query = "SELECT * FROM themes where supprime=0 ";		
		$result = mysqli_query($connect, $query);
		echo "<FORM METHOD='POST' ACTION='ajouter_seance.php'>";
		echo "<br>";
		echo "<h3>Ajouter une séance.</h3>";
		echo "Choisissez le thème auquel la séance appartient.<br><br>";
		echo "<select name='menuChoixTheme' size='4' required>";
		while ($row = mysqli_fetch_array($result, MYSQL_NUM)) 
		{
		echo "<OPTION VALUE='$row[0]'>$row[0].$row[1]</OPTION>";
		}
		echo "</select>";
		echo "<br><br>";
		echo "Effective maximum  <Input type='number' name='effmax' min='1'><br><br>";		
		echo "La date de séance (YYYY-mm-jj)  <Input type='date' name='datedeseance'>";		
		echo "<br><br>";
		echo "<INPUT type='submit' value='Enregistrer séance'>";
		echo "</FORM>";
		mysqli_close($connect);
		?>
	</body>
</html>


