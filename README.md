# wp-grunt-theme

**---WIP---**

## 1. Installation
1. in ```/wp-content/themes/themename-src/``` kopieren
2. mit ```make install``` alle NPM und Bower-Abhängigkeiten installieren
3. in ```Gruntfile.js``` sass-Banner anpassen
4. in ```package.json``` prod / dev Ordner + gewünschte Attribute (z.B. Name, Autor etc.) anpassen
5. in ```bower.json``` gewünschte Attribute (z.B. Name, Autor etc.) anpassen
5. in ```library/app``` / ```library/Theme/*``` "Theme" in Namespace, Klasse, Ordner und Datei in jeweiligen Themenamen ändern
6. in ```library/WPFW/Plugins.php``` Plugin-Abhängikeiten anpassen


## 2. Funktionsweise
Erstellt aus ```themename-src``` ein aufbereitetes Template mit dem Namen ```themename``` (produktiv) oder ```themename-dev``` (development).

## 3. Abhängigkeiten

### 3.1. Gems
* **bundler** - installiert Gem's basierend auf dem ```Gemfile```
* **compass** - CSS Authoring Framework
* **oily_png** - schnellere Komprimierung für ChunkyPNG dank nativer C-Library (genutzt für Sprites)

### 3.1. NPM
Werden zur vereinfachten Entwicklungs-Workflow verwendet.

* **grunt** - automatisierter Build-Vorgang
  * **grunt-yui-compressor** - replacement für UglifyJS, da dieses einige fehlende Features hat, auch für CSS verwendet
  * **grunt-contrib-clean** - automatischer Clean-Vorgang für das Projekt
  * **grunt-contrib-copy** - kopiert Abhängigkeiten in den Build-Ordner
  * **grunt-contrib-coffee** - komprimiert CoffeeScript in JavaScript
  * **grunt-contrib-sass** - SASS/SCSS Vorkompillierer
  * **grunt-contrib-concat** - fügt mehrere Dateien zusammen
  * **grunt-contrib-watcher** - Watcher-Funktionalitäten
* **bower** - Package-Manager für JavaScript, für Vendor-Daten verwendet (z.B. jQuery)

### 3.2. Bower
Sind Komponente der Webseite selber.

* **Zurb Foundation** - mobile-first Framework (SCSS Standalone Version)
* **jQuery** - umfangreiche JavaScript Library (Verison 1.10.* genutzt, da jQuery 2 nicht mit IE6-8 kompitabel ist)
* **modernizr** - zur Erkennung von Browser-Funkionalitäten und aktivieren von HTML5 Elementen in älteren Browsern
* **TGM Plugin Activation** - PHP Library zum Voraussetzen von Plugins für WordPress


## 4. Entwicklungsumgebung
Bei jeder Änderung an Files muss ``grunt`` ausgeführt werden.

### 4.1 grunt-Builds
``grunt`` kann wie folgt parametrisiert werden:

```
grunt        # komplettes Build erstellen
grunt js     # nur JavaScript / CoffeeScript verarbeiten
grunt assets # nur Assets (Templates, Library, ...) verarbeiten
grunt sass   # nur SCSS verarbeiten
grunt watch  # Watcher aktivieren
```

Hinter jedem Command kann ```--env=dev``` (Standardwert) oder ```--env=prod``` hinzugefügt werden, um den Befehl jeweils auf das Produktiv oder Development-Template anzuwenden.

### 4.2. Live Editing
Während ```grunt watch``` ist Live Editing enabled. Dazu wird dieses Plugin verwendet: <http://goo.gl/CK03sy>

## 5. Ordnerstruktur

```
/images             # Bilder
/javascripts        # JavaScript Dateien
/javascripts/coffee # CoffeeScript Dateien
/library            # WordPress Modifikationen (Backend etc.)
/scss               # SCSS
/templates          # normale WordPress Theme-Files
```

## 6. Danke
* [bones starter theme](https://github.com/eddiemachado/bones) für viele Ideen und SCSS Vorlagen!
