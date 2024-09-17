# antispam_contact_formular_htaccess
Mittles einer .htaccess wird der Unterordner des Webservers IP-basiert vor Zugriff geschützt in dem z.B. ein Kontaktformular oder ein Forum liegt.
Ein Besucher der Webseite muss seine IPv4 auf einer PHP-Seite eintragen, ein Perlscript prüft, ob es sich um die eigene, valide IPv4 des Besuchers handelt und schreibt die IP in eine .htaccess eines Unterordners, damit dieser Zugriff erhält.

Die Datei 403.php kommt, wie die freischaltungen.txt in /var/www/html

Die .htaccess kommt in den zu schützenden Unterordner /var/www/html/unterordner

Die ip_htaccess.pl kommt nach /usr/lib/cgi-bin/
