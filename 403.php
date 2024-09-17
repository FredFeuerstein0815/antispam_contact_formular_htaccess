<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="https://axel.spdns.de/menu_style.css" type="text/css" />
<title>403</title>
</head>
<body bgcolor="#000000" text="#FFFFFF" link="#0000FF" vlink="#0000FF" alink="#0000FF">
</body>
<center>
<br>
<h1>Hallo Besucher.</h1>
<h2>Wegen der vielen Spam-Bots musst du eine Anti-Spam-Aufgabe lösen um Zugang zu bekommen :</h2>
</center>
<a color=white <h2>1.) Kopiere dazu die <a color=red>IP</a><a color=white <h2> , welche du unten siehst, füge sie in das Feld darunter ein.</h2></a>
<br>
<a color=white <h2>2.) Akzeptiere die Bedingung, indem du das Häkchen setzt.</h2>
<br>
<a color=white <h2>3.) Anschliessend drücke auf den Knopf</a><a color=red> Senden</a></h2>
<br>
<center>
<?php echo "Also, das hier kopieren: ";?>
<br><br>
<a color=red>
<?php echo $_SERVER['REMOTE_ADDR'];?>
</a>
<form action="/cgi-bin/ip_htaccess.pl" method="post" enctype="multipart/form-data" >
<br>
<table align="center">
in dieses Feld einfügen:
<br><br>
<input type="text" name="IP" style="height:50px; width:120px">
<td colspan=2 align=center>
<br>
<input type="checkbox" required="required" name="checkbox" id="checkbox" />
<label for="checkbox">Ich akzeptiere, dass meine IP gespeichert wird, bis ich auf "Ausloggen" drücke.</label>
<br><br>
Hier klicken:
<p>&#8681;</p>
⇨
<input color=red type=submit value="Senden" style="height:50px; width:120px">
⇦
<p>&#8679;</p>
</td>
</table>
</form>
