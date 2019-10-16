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
		echo "<FORM METHOD='POST' ACTION='desinscrire_seance.php' >";
		echo "<INPUT NAME='idseance' value='a' type='hidden'>";

		echo "<br>Choisissez un élève à désinscrire une séance.<br>";
		echo "<br>";

		echo "<select name='ideleve' size='10' >";
		$result = mysqli_query($connect,"SELECT ideleve, nom, prenom FROM eleves ");
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
		echo "<OPTION value='$row[0]'>";
		echo "$row[0]"." ";
		echo "$row[1]"." ";
		echo "$row[2]";
		echo "</OPTION>";
		echo "<br>";
		}
		echo "</select>";
		echo "<br><br>";
		echo "<INPUT type='hidden' value='-1' NAME='idseance'>";

		echo "<INPUT type='submit' value='Valider'>";
		echo "</FORM>";
		?>

	</body>
</html>
