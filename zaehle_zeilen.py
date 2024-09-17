#!/usr/bin/env python3

from time import sleep
from pathlib import Path

SKRIPTPFAD = Path("/var/www/html/unterordner")

FILE = SKRIPTPFAD / ".htaccess"

def analysiere_inhalt(inhalt):
    pos_raute = None
    nr = None
    for nr, zeile in enumerate(inhalt):
        if "#" in zeile:
            pos_raute = nr
    else:
        if pos_raute is not None and nr is not None:
            diff = nr - pos_raute
            text = f"{diff} Freischaltungen"
            with open("/var/www/html/freischaltungen.txt", "w") as frei:
                frei.write(str(diff))
        else:
            text = "keine Zeile vorhanden"
        return text

def datei_lesen():
    inhalt = FILE.read_text().splitlines()
    return inhalt

def main():
    inhalt = datei_lesen()
    print(analysiere_inhalt(inhalt))

if __name__ == "__main__":
    main()
