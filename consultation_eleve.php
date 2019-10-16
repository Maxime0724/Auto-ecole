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
		$connect   =   mysqli_connect($dbhost, $dbuser, $dbpass, $dbname) or die ('Error connecting to mysql');

		$result = mysqli_query($connect,"SELECT * FROM eleves");
		echo "<FORM METHOD='POST' ACTION='consulter_eleve.php' >";

		echo "<br>Sélectionnez un élève à consulter.<br>";

		echo "<br>";
		echo "<select name='ideleve' size='10' >";
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
