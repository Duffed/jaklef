<?php

// Fehlermeldungen unterdrücken
error_reporting( 0 );

// Erzwingen das Session-Cookies benutzt werden und die SID nicht per URL transportiert wird
ini_set( 'session.use_only_cookies', '1' );
ini_set( 'session.use_trans_sid', '0' );

// Session starten
session_start();

// Sicherstellen das die SID durch den Server vergeben wurde
// um einen möglichen Session Fixation Angriff unwirksam zu machen
if (!isset( $_SESSION['server_SID'] ))
{
	// Möglichen Session Inhalt löschen
	session_unset();
	// Ganz sicher gehen das alle Inhalte der Session gelöscht sind
	$_SESSION = array();
	// Session zerstören
	session_destroy();
	// Session neu starten
	session_start();
	// Neue Server-generierte Session ID vergeben
	session_regenerate_id();
	// Status festhalten
	$_SESSION['server_SID'] = true;
}

// Funktionen einbinden
include( 'funktionen.inc.php' );

// Variablen deklarieren
$_SESSION['angemeldet'] = false;
$conid                  = '';
$eingabe                = array();
$anmeldung              = false;
$update                 = false;
$fehlermeldung          = '';

// Datenbankverbindung öffnen
$conid = db_connect();

// Wenn das Formular abgeschickt wurde
if (isset( $_POST['login'] ))
{
	// Benutzereingabe bereinigen
	$eingabe = cleanInput();
	// Benutzer anmelden
	$anmeldung = loginUser( $eingabe['benutzername'], $eingabe['passwort'], $conid );
	// Anmeldung war korrekt
	if ($anmeldung)
	{
		// Benutzer Identifikationsmerkmale in DB speichern
		$update = updateUser( $eingabe['benutzername'], $conid );
		// Bei erfolgreicher Speicherung
		if ($update)
		{
			// Auf geheime Seite weiterleiten
			header( 'location: geheim_profi.php' );
			exit;
		}
		else
		{
			$fehlermeldung = '<h3>Bei der Anmeldung ist ein Problem aufgetreten!</h3>';
		}
	}
	else
	{
		$fehlermeldung = '<h3>Die Anmeldung war fehlerhaft!</h3>';
	}
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<title>Login</title>
</head>

<body>

<?php
// Falls die Fehlermeldung gesetzt ist
if ($fehlermeldung) echo $fehlermeldung;
?>
<div id="wrapper" style="width:300px;">
	<div class="bg_transparent shadow" id="content_general">
		<div class="headline">Login</div>
		<form id="loginform" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<table>
				<tr>
					<td><label for="benutzer">Benutzer: </label></td><td><input type="text" name="benutzer" id="benutzer" value="" /></td>
				</tr>
				<tr>
					<td><label for="passwort">Passwort: </label></td><td><input type="password" name="passwort" id="passwort" value="" /></td>
				</tr>
				<tr>
					<td></td><td><input class="button" type="submit" name="login" id="login" value="Anmelden" /></td>
				</tr>
			</table>
		</form>
	</div>
</div>

</body>
</html>