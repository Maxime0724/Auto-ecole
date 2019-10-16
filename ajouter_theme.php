<html>
	<head>
		<meta charset=utf-8>
	</head>
	<body>
		<?php
		date_default_timezone_set('Europe/Paris');
		$date = date("Y­-m-­d");
		$dbhost = 'tuxa.sme.utc';
		$dbuser = 'nf92p002';
		$dbpass = 'ItAxp0oC'; 
		$dbname = 'nf92p002';
		$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
		$theme = $_POST['theme'];
		$description=$_POST['description'];
		echo "<br>";
		$query = "insert into themes values (NULL, '$theme', '0','$description')";
		
		
		
		$ne = mysqli_query($connect, "SELECT * FROM themes where nom= '$theme' and supprime='0'"  );
		$np = mysqli_query($connect, "SELECT * FROM themes where nom= '$theme' and supprime='1'"  );
		$a = mysqli_num_rows($ne);
		$b = mysqli_num_rows($np);
		
		if (empty($theme))
		{
		echo "<h2>Remplissez le nom du thème, svp !</h2>";
		echo "<a href='ajout_theme.html'>Cliquer et retouner.</a>";
		}	
		else
		{	
			if ($a == 0)	
			{
				if ($b <>0)
				{echo "Vous avez entré un thème supprimé.<br>";}
				echo "Le thème a été ajouté.<br>";		
				echo "<TABLE BORDER='1'>";
				echo "<TR>";
				echo "<TD>thème</TD><TD>description</TD>";
				echo "</TR>";
				echo "<TR>";
				echo "<TD>$theme</TD><TD>$description</TD>";
				echo "</TR>";
				echo "</TABLE>";		
				echo "<br><br>";
				echo "<a href='ajout_theme.html'>Ajouter un autre thème</a>";
				
				$result = mysqli_query($connect, $query);
				if (!$result) { echo "<br>pas bon".mysqli_error($connect);}
			}
			else {echo "Votre thème existe, veuillez changer le thème, svp.<br><br>";
			      echo "<a href='ajout_theme.html'>Cliquer et retourner.</a>";}
		}
		mysqli_close($connect);
		?>

	
	</body>
</html>
