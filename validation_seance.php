<html>
	<head>
		<meta charset=UTF-8>		
	</head>
	<body>
		<?php
			$dbhost = 'tuxa.sme.utc';
			$dbuser = 'nf92p002';
			$dbpass = 'ItAxp0oC';
			$dbname = 'nf92p002';
			$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');
			date_default_timezone_set('Europe/Paris');
			$date=date("Y-m-d");
			$result = mysqli_query($connect,"SELECT s.idseance, s.DateSeance, t.nom FROM seances s, themes t, inscription i 		where DateSeance<='$date' and s.idtheme = t.idtheme and s.idseance in (select idseances from inscription where note='-1' ) 			group by s.idseance");
			
			echo "<FORM METHOD='POST' ACTION='valider_seance.php' >";
			echo "<br><br>Sélectionnez un séance pour évaluer";
			echo "<br><br>";
			echo "<select name='idseance' size='4' >";
			while ($row = mysqli_fetch_array($result, MYSQL_NUM))
			{
			echo "<OPTION value='$row[0]'>";
			echo "$row[0] ";
			echo "$row[1] ";
			echo "$row[2]";
			echo "</OPTION>";
			echo "<br>";
			}
			echo "</select><br><br>";

			echo "<INPUT type='submit' value='Valider'>";
			echo "</FORM>";
			mysqli_close($connect);
		?>
	</body>
</html>

