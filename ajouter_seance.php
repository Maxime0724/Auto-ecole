<html>
	<head>
		<meta charset=UTF-8 >
	</head>
	<body>
		<?php

		date_default_timezone_set('Europe/Paris');
		$date=date("Y-m-d");

		$idtheme = $_POST['menuChoixTheme'];

		$effmax = $_POST['effmax'];

		$datedeseance = $_POST['datedeseance'];
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC';
		$dbname = 'nf92p002';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$is_date=strtotime($datedeseance)?strtotime($datedeseance):false;
		
		if (empty($effmax)||empty($datedeseance))
		{
			echo "<br><h2>Complétez les informations de la séance, svp !</h2><br>";
			echo "<a href ='ajout_seance.php' >Cliquer et retourner.</a><br>";
		}
		else
		{	
			if ($is_date===false)
			{echo "<br><h2>Veuillez remplir une date correcte !</h2>";
			echo "<a href='ajout_seance.php'>Cliquer et retourner.</a>";}
			else			
			{
			if (strtotime($datedeseance) <= strtotime($date))
			{echo "<br><h2>Veuillez remplir une date au futur !</h2>";
			echo "<a href='ajout_seance.php'>Cliquer et retourner.</a>";}
			else
			{
			$nb = mysqli_query($connect, "SELECT * FROM seances where Dateseance= '$datedeseance' and idtheme= '$idtheme'"  );
			$n = mysqli_num_rows($nb);
			if ($n <> 0)
			{
			echo "<br><h2>Vous ne pouvez pas faire 2 séances sur un même thème dans une journée !</h2><br> ";
			echo "<a href='ajout_seance.php'>Cliquer et retourner.</a>";
			}
			else
			{
			$nb = mysqli_query($connect, "SELECT * FROM seances where DateSeance= '$datedeseance' and idtheme= '$idtheme'"  );
			$n = mysqli_num_rows($nb);

			$query  = "insert into seances values (null, '$datedeseance', '$effmax', '$idtheme')";

			echo "<br><h3>Votre séance a été ajoutée.</h3>";			
			echo "<TABLE BORDER='1'>";
			echo "<TR>";
			echo "<TD>idtheme</TD><TD>Effectif maximum</TD><TD>Date de la seance</TD>";
			echo "</TR>";
			echo "<TR>";
			echo "<TD>$idtheme</TD><TD>$effmax</TD><TD>$datedeseance</TD>";
			echo "</TR>";
			echo "</TABLE>";
		
			echo "<br><br>";
	
			echo "<a href='ajout_seance.php'>Ajouter une autre séance</a>";
			$result = mysqli_query($connect, $query);

			mysqli_close($connect);
			}
			}
			}
		}
		?>
	</body>
</html>


