<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de" lang="de">
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="menu_style.css" type="text/css" />
<title></title>
</head>
<body bgcolor="#000000" text="#FFFFFF" link="#0000FF" vlink="#0000FF" alink="#0000FF">
</body>
<center>
<br><br><br><br>
<h1>Lösche meine IP wieder.</h1>
<br>
<?php
$remoteip = $_SERVER['REMOTE_ADDR'];
$lesedatei = file("/var/www/html/unterordner/.htaccess");
//print_r($lesedatei);
$allow_from = ("allow from");
//echo $allow_from;
$ersetzedurch = ("");
echo $ersetzedurch;
$gesuchtezeile = ("$allow_from $remoteip");
//echo $gesuchtezeile;
foreach ($lesedatei as $zeile)
{
if (strpos($zeile,$gesuchtezeile) !== false )
    {
    echo "Deine IP wurde gefunden. ";
    echo "<br />";
    $loeschezeile = str_replace($gesuchtezeile, $ersetzedurch, $lesedatei);
//    print_r($loeschezeile);
    $schreibedatei = file_put_contents("/var/www/html/unterordner/.htaccess", $loeschezeile);
    echo '<h2>Die IP ';
echo $remoteip;
echo ' wurde gelöscht</h2>';
    echo "<br />";
    }
else
{
//echo "Nicht gefunden. ";
}

}
?>
<h2> Jetzt ist dir der Zugang zur Seite wieder verwehrt. </h2>
<?php
$frei = file_get_contents('/var/www/html/freischaltungen.txt');
if (intval($frei) == 0){
echo "Zur Zeit ist niemand freigeschaltet";
} else {
echo "Anzahl Freischaltungen: $frei"; }
?>
<br>
<?php
$filename = '/var/www/html/freischaltungen.txt';
if (file_exists($filename)) {
    echo "Zuletzt geprüft:<br />\n " . date ("d.m.Y H:i:s", filemtime($filename));
}
echo "<br />";
?>
<br><br><br><br>
</center>
</html>
