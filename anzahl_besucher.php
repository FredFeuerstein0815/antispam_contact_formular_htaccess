<?php
$frei = file_get_contents('/var/www/html/freischaltungen.txt');
if (intval($frei) == 0){
echo "Zur Zeit ist niemand freigeschaltet";
} else {
echo "Anzahl freigeschalteter Besucher: $frei"; }
?>
<br>
<?php
$filename = '/var/www/html/freischaltungen.txt';
if (file_exists($filename)) {
    echo "Zuletzt geprüft:<br />\n " . date ("d.m.Y H:i:s", filemtime($filename));
}
?>
