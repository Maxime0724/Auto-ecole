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

		$idseance = $_POST['idseance'];

		$r = mysqli_query($connect,"SELECT eleves.ideleve, eleves.nom, eleves.prenom, inscription.note FROM inscription, eleves where eleves.ideleve = inscription.ideleve and inscription.idseances = '$idseance' and inscription.note<>'-1'");
		echo"<br>Voici les élèves qui sont notés:<br><br>";
		echo"<TABLE BORDER='1'>";
		echo "<TR>";
		echo "<TD>ideleve</TD><TD>nom</TD><TD>prenom</TD><TD>note</TD>";
		echo "</TR>";

		while ($row = mysqli_fetch_array($r, MYSQL_NUM))
		{
		echo "<TR>";
		echo "<TD>$row[0]</TD><TD>$row[1]</TD><TD>$row[2]</TD><TD>$row[3]</TD>";
		echo "</TR>";
		}
		echo "</TABLE><br><br><br><br>";








		echo "<FORM METHOD='POST' ACTION='noter_eleves.php' >";

		echo "Choisissez un autre élève pour évaluer<br><br>";


		echo "<select name='ideleve' size='4' >";
		$result = mysqli_query($connect,"SELECT eleves.ideleve, eleves.nom, eleves.prenom FROM inscription, eleves where eleves.ideleve = inscription.ideleve and inscription.idseances = '$idseance' and inscription.note='-1'");
		while ($row = mysqli_fetch_array($result, MYSQL_NUM))
		{
		echo "<OPTION value='$row[0]'>";
		echo "($row[0]) ";
		echo "$row[1] ";
		echo "$row[2]";
		echo "</OPTION>";
		echo "<br>";
		}
		echo "</select><br>";

		echo "<INPUT TYPE='hidden' value='$idseance' NAME='idseance'>";
		echo "<br>";
		echo "Le nombre de fautes: <INPUT NAME='note' type='number' min='0' max='40' ><br>";
		echo "(Le nombre de fautes est entre 0-40)<br>";
		echo "S'il y a aucun élève à choisir, tous les élèves sont bien notés.<br><br>";
		echo "<input type='submit' name='envoyer' value='Valider'> ";

		echo "</FORM>";
		?>
</body>
</html>
