<?php

// Erzwingen das Session-Cookies benutzt werden und die SID nicht per URL transportiert wird
ini_set( 'session.use_only_cookies', '1' );
ini_set( 'session.use_trans_sid', '0' );

// Session starten
session_start();

// Funktionen einbinden
include( 'funktionen.inc.php' );

// Datenbankverbindung öffnen
$conid = db_connect();

// Benutzer prüfen
if (!checkUser( $conid ))
{
	resetUser();
}

// Benutzer abmelden
if (isset($_GET['benutzer'])) {
	if ($_GET['benutzer'] == 'abmelden')
	{
		resetUser();
	}
}

//Änderung
if (isset($_POST["b_submit"])) {

	// print_r($_POST);
	$link = $_POST["link"];
	$text = $_POST["text"];
	$id = $_POST["id"];
	$neu = $_POST["neu"];
	for ($i=1;$i<count($id)+1;$i++){

		mysql_query("UPDATE `soundcloud` SET 
		`link` = '$link[$i]',
		`text` = '$text[$i]',
		`neu` = '$neu[$i]'
		WHERE ID = $id[$i]");
	}
	
	$youtube = $_POST["youtube"];
		mysql_query("UPDATE `youtube` SET 
		`link` = '$youtube'");

	
	echo "<center>Aenderungen wurden durchgefuehrt.</center>";
	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="stylesheet.css">
<title>Adminbereich</title>
</head>

<body>
<div id="wrapper" style="width:500px;">
	<div class="bg_transparent shadow" id="content_general">
		<div class="headline"><a href="geheim_profi.php">Administrationsbereich</a></div>

			<!-- Kram auflisten -->
			<form action='geheim_profi.php' method='post'>
				<table>
					<tr><td></td><td><h1>Youtube</h1></td></tr>
					<tr>
					<td>ID:</td>
						<?php
							$ausgabe = mysql_query("select link from youtube");
							while($row = mysql_fetch_object($ausgabe))
							{
								echo "<td><input size='11' type='text' name='youtube' value='$row->link'><em> /watch?v=<em class='rot'>Td7Y27T4aik</em>&list=FLtisBRnyx6OGbRdEfsVL8bA </em></td>";
							}
						?>
					</tr>

					<?php
						$ausgabe = mysql_query("select * from soundcloud");
						while($row = mysql_fetch_object($ausgabe))
						{
							echo "<tr><td></td><td><h1>Soundcloud $row->ID</h1></td></tr>";
							echo "<tr class='hide'><td>ID:</td><td><input size='50' type='text' name='id[$row->ID]' value='$row->ID'></td></tr>";
							echo "<tr><td>Text:</td><td><input size='50' type='text' name='text[$row->ID]' value='$row->text'></td></tr>";
							echo "<tr><td>Link:</td><td><input size='50' type='text' name='link[$row->ID]' value='$row->link'></td></tr>";
							echo "<tr><td>Neu?</td><td><input size='1' type='text' name='neu[$row->ID]' value='$row->neu'><em class='rot'>1 = Ja, 0 = Nein</em></td></tr>";
						}
					?>
					<tr><td></td><td><h1>Editieren</h1></td></tr>
					<tr>
						<td></td>
						<td><input class="button" size='50' type="submit" name="b_submit" value="Ausf&uuml;hren!"></td>
					</tr>
				</table>
				
				
			</form>
		
	</div>
	
	<div class="bg_transparent shadow" id="content_general">
		<p class="left"><a href="<?php echo $_SERVER['PHP_SELF']. "?benutzer=abmelden"; ?>">Logout</a></p>
		<p class="right"><a href="../">Zur Website</a></p>
	</div>
</div>

</body>
</html>