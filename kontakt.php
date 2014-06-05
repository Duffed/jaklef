<!DOCTYPE html>
<html>
	<head>		
		<title>Jaklef - Kontakt</title>
		
		<?php include('include/head.html') ?>
		<script type='text/javascript' src="js/js_kontakt.js"></script>
	</head>
<body>
<?php include('include/header.html') ?>
	<section id="wrapper">
<?php include('include/navigation.html') ?>
<!---->
<div class="bg_transparent content_general">
	<h2 class="headline">Kontakt</h2>
	<?php
		if (!isset($_POST["send_mail"]))    /* display the contact form */
			{
			?>
				<form  id="kontaktformular" action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="action" value="submit">
					
					<label for="feld_name">Name</label>
					<input class="shadow" name="feld_name" id="feld_name" type="text" value="" />
					<label for="feld_email">E-Mail</label>
					<input class="shadow" name="feld_email" id="feld_email" type="text"  value=""/>				
					<label >Nachricht</label>
					<input class="shadow" name="feld_betreff" id="feld_betreff" type="text" placeholder="Betreff" value=""/>
					<textarea class="shadow" name="feld_nachricht" id="feld_nachricht" rows="7"></textarea>
					<label>3 + 9 =</label>
					<input type="text" name="feld_uberpruefung">
					<input class="shadow" type="submit" id="feld_button" name="send_mail" value="SENDEN"/>
				</form>
			<?php
			} 
		else /* send the submitted data */
			{
			$name=$_REQUEST['feld_name'];
			$email=$_REQUEST['feld_email'];
			$message=$_REQUEST['feld_nachricht'];
			$betreff=$_REQUEST['feld_betreff'];
			$uberpruefung=$_REQUEST['feld_uberpruefung'];
			if (($name=="")||($email=="")||($message==""))
				{
					echo "<center><br><br>Alle Felder werden ben&ouml;tigt. <a href=\"\">Bitte erneut ausf&uuml;llen.</a><br><br><br></center>";
				}
			else{
				if ($uberpruefung != 12 ) {
					echo "<center><br><br>Nein, 3 + 9 sind nicht ".$uberpruefung.". <a href=\"\">Am besten nochmal neu versuchen.</a><br><br><br></center>";
				} else {
					if ($betreff==""){$betreff="Kein Betreff";}
					$from="Von: $name<$email>\r\nReturn-path: $email";
					$subject='Jaklef.de Nachricht: "'.$betreff.'" (Von '.$name.' - '.$email.')';
					mail("jaklef@live.de", $subject, $message, $from);
					echo "<center><br><br>E-Mail wurde versendet.<br><br><br></center>";
					}
				}
			}  
	?>
</div>

<!---->		
<?php include('include/impressum.html') ?>
	</section>
</body>
</html>
