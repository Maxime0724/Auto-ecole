<html>
	<head>
		<title>Valider</title>
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
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$datedenaissance = $_POST["datedenaissance"];
		$query = "insert   into   eleves   values   (NULL, '$nom', '$prenom', '$datedenaissance','$date')";


		if ( (empty($nom))  || (empty($prenom)) || (empty($datedenaissance)) )
			echo "<br><h2>Complétez tous les champs, s'il vous plaît!</h2>";		

		else
		{
			if ($date-$datedenaissance< '0018-00-00')
				{echo "<br><h2>Désolé, vous avez moins de 18 ans et nous ne pouvons pas vous inscrire.</h2>";}			
			else
			{
			$nb = mysqli_query($connect, "SELECT * FROM eleves where nom= '$nom' and prenom= '$prenom'");
			$n = mysqli_num_rows($nb);
			if ($n == 0)
			{
			echo "<br>Vous vous êtes inscrit avec succès !<br>";
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
			{echo "<br>pas bon".mysqli_error($connect);}
			mysqli_close($connect);
			}

			else
			{
			echo "<br>";
			echo "<h2>ATTENTION !</h2><br>";
			echo "Il y a des éleves ayant même nom et prenom dans BDD. Est-ce que vous confirmez votre saisie ?";
			echo "<FORM  METHOD='POST' ACTION='ajouter_eleve.php'>";
			echo "<INPUT TYPE='hidden' value='$nom' NAME='nom'>";
			echo "<INPUT TYPE='hidden' value='$prenom' NAME='prenom'>";
			echo "<INPUT TYPE='hidden' value='$datedenaissance' NAME='datedenaissance'>";
			echo "<br><Input type='submit' name='oui' value='Oui'> ";
			echo "<br><a href='ajout_eleve.html'>Annuler et retourner</a><br>";
			echo "</FORM>";
			}
			}
		}
		
		?>

</body>
</html>
