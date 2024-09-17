#!/usr/bin/perl
use strict;
use warnings;
use CGI;
use Fcntl qw(:flock);

# zentrale Definition der .htaccess Datei
my $htaccess_file = "/var/www/html/unterordner/.htaccess";

my $cgi = CGI->new;

my $param_IP  = $cgi->param('IP'); # Hole den Parameter IP (=Inhalt der Textarea)
my $client_ip = $ENV{'REMOTE_ADDR'};    # ermittle IP des Clients, sollte bei CGI gesetzt sein


my %known_ip;
my %new_ip;

# Aktionen nur ausführen, wenn $param_IP gesetzt ist
if ( defined($param_IP) and length($param_IP) ) {

        # ermittle neue IPs; ausgehend davon, dass Parameter IP potentiell nur
        # IP-Adressen enthalten sollte, splitten wir vereinfacht am \s+
        for my $ip ( split /\s+/, $param_IP ) {
                # nur benutzen, was wie eine IP aussieht
                if ( $ip =~ m|^(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})$| ) {
                        # Client darf nur seine eigene IP eintragen, alles andere wird ignoriert
                        if ( $client_ip && $ip eq $client_ip ) {
                                $new_ip{$1}++;
                        }
                }
        }

        # ermittle die bereits gesetzten IPs
        open(my $fh, "<", $htaccess_file) or die "Cant open $htaccess_file: $!"; # Datei zum Lesen öffnen
        while (my $line = <$fh>) { # IP zeilenweise einlesen
                if ( $line =~ m|allow\s+from\s+(\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3})\s*$|i ) {; # ist keine numerische IP, dann weiter bei while
                        $known_ip{$1}++;  # numerische IP merken
                }
        }
        close($fh) or die "Cant close $htaccess_file:: $!";

        # Neue IPs anfügen
        open($fh, ">>", $htaccess_file) or die "Cant open $htaccess_file: $!";
        flock ($fh, LOCK_EX) or die "Cant lock $htaccess_file: $!";  # Datei sperren gegen mehrfache Schreibzugriffe

        for my $new_ip ( sort keys %new_ip ) {
                # bekannte IPs ueberspringen
                next    if exists $known_ip{$new_ip};

                # neue IPs anfuegen
                print $fh "allow from ",$new_ip,"\n" or die "Can't print to $htaccess_file: $!";
        }

        close($fh) or die "Cant close $htaccess_file: $!";
}

print $cgi->header(
  -status => '204 No Content',);  # only HTTP header is in response

__END__;

