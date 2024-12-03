# RaceDaysWeb

# RaceDays Website

Dieses Projekt implementiert eine Website für **RaceDays - CVJM Steinheim**. Die Website bietet alle relevanten Informationen, Statistiken und interaktive Features auf einer einzigen Seite.

## Projektstruktur

Das Projekt besteht aus den folgenden Dateien:

- **index.php**: Hauptseite, die alle Inhalte dynamisch lädt.
- **login.php**: Login-Seite für den geschützten Bereich (Statistiken).
- **statistik.php**: Geschützte Statistikseite, die dynamische Inhalte basierend auf Benutzerinformationen anzeigt.
- **styles.css**: Stylesheet für das Design der gesamten Website.

## Features

- **Navigation:** Alle Inhalte (z. B. Regeln, Preise, Öffnungszeiten) sind auf der gleichen Seite verfügbar.
- **Dynamischer Inhalt:** Abschnitte wie Statistik generieren Inhalte automatisch.
- **Benutzerfreundlichkeit:** Einfaches Layout mit einer zentralisierten Navigation.
- **Login-Bereich:** Statistiken sind geschützt und nur nach Login sichtbar.

## Installation

1. **Voraussetzungen:**

   - Ein Webserver
   - PHP ist auf dem Server installiert.
2. **Setup:**

   - Kopiere alle Dateien in das Verzeichnis des Webservers (z. B. `htdocs` bei XAMPP).
   - Stelle sicher, dass der Webserver läuft.
3. **Aufruf:**

   - Öffne deinen Browser und navigiere zu: `http://localhost/index.php`.

## Verwendete Technologien

- **PHP:** Für die dynamische Anzeige von Inhalten und den Login-Bereich.
- **HTML & CSS:** Für das Grundgerüst und das Styling der Website.

## Navigation

Die Navigation erfolgt über die Menüpunkte, die die verschiedenen Abschnitte der Seite anzeigen. Jeder Abschnitt wird durch die URL-Parameter (`?section=<abschnitt>`) gesteuert.

### Verfügbare Abschnitte:

- Home
- Regeln
- Preise
- Öffnungszeiten
- Mitarbeiter werden
- Feedback
- Statistik (geschützt)
- Über uns
- Essen
- Sponsoren
- Newsletter

## Login-Bereich

- Die Login-Seite (`login.php`) ermöglicht den Zugriff auf den geschützten Bereich der Website.
- Standard-Benutzername und Passwort können in der PHP-Datei angepasst werden.
