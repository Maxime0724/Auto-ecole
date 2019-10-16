<html>
	<head>
		<meta charset=utf-8>
	</head>	
	<body>
	<?php	
		echo "</br>";
		$nom = $_POST['nom'];		
		$prenom = $_POST['prenom'];
		$datedenaissance = $_POST['datedenaissance'];
		echo "<br> Le nom saisi est:".' '.$nom."<br>";
		echo "<br> Le prénom saisi est:".' '.$prenom."<br>";
		echo "<br> La date de naissance saisie est:".' '.$datedenaissance."<br>";
		date_default_timezone_set('Europe/Paris');
		$date = date("Y-m-d");
		echo "<br> La date est : "."'$date'"." <br>";	
		
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC';
		$dbname = 'nf92p002'; 
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to
		mysql');

		$query = "insert into eleves values (NULL,'$nom','$prenom','$datedenaissance',"."'$date'".")";
		echo "<br>Vous vous êtes inscrit avec succès !<br>";
		echo "<br>";
		echo "<TABLE BORDER='1'>";
		echo "<TR>";
		echo "<TD>nom</TD><TD>prenom</TD><TD>Date de naissance</TD><TD>Date d'inscription</TD>";
		echo "</TR>";
		echo "<TR>";
		echo "<TD>$nom</TD><TD>$prenom</TD><TD>$datedenaissance</TD><TD>$date</TD>";
		echo "</TR>";
		echo "</TABLE>";
	
		$result = mysqli_query($connect, $query);
		if (!$result) 
		{ 
		echo "<br>pas bon".mysqli_error($connect);
		}
		mysqli_close($connect);


	?>
	 	
	</body>
</html>
