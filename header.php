
<?php /*
 * die header.php wird auf jeder Seiten eingebunden (über die Funktion "get_header()" in den einzelnen Templates).
 * Somit hier sollte das Markup, dass auf jeder Seite im Header-Bereich angezeigt wird, zu finden sein.
 * Beginnend mit dem <!DOCTYPE html>; <html> <head> und öffnenden <body> Tag - gschlossen wird der </body> und </html> Tag in der footer.php
*/ ?>
<!DOCTYPE html>
<?php /* die WordPress Funktion "language_attributes()" gibt das Attribut "lang" mit der in WordPress eingestellten Sprache zurück (ZB: lang="de_DE" ) */ ?>
<html lang="<?php language_attributes(); ?>" class="no-js">

<!-- Head
============================================ -->
<head>

<?php /* die WordPress Funktion "bloginfo()" gibt nütliche Informationen zur Website zurück. Über den Parameter 'show' können einzelne Werte ausgegeben werden.
        * bloginfo('charset') gibt den Zeichensatz der eingestellten Sprache zurück (ZB: UTF-8 )
        * https://developer.wordpress.org/reference/functions/bloginfo/
        * Hinweis: wird dieses Theme nur für Sprachen in UTF-8 entwickelt, könnte dieser Hardcoded eingefügt werden (also ohne Funktionsaufruf)
        */
    ?>

<meta charset="<?php bloginfo('charset'); ?>>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); //erlaubt WordPress und den installierten Plugins hier Code (Scripten, links, meta, title, etc.) auszugeben ?>

</head>
<!-- End Head
============================================ -->

<?php /* body_class() liefert viele nützliche Klassen-Namen aus WordPress. ZB: logged-in, admin-bar, template, post-id, etc.
     * https://developer.wordpress.org/reference/functions/body_class/
     */ ?>


<body <?php body_class(); ?>>
<a href="#content" class="screen-reader-text"><?php _e('Skip to Content', 'ize'); ?></a>


  <!-- Header
  ============================================ -->
  <nav id="header">
    <div class="header container">
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1><span>D</span>avid <span>N</span>atter</h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
                <?php /*
                        * Ausgabe des Menüs, dass im WordPress als "Haupt Navigation" festgelegt wurde (Design -> Menüs oder Cusotmizer -> Menüs / Position im Theme: Checkbox "Haupt Navigation")
                        * https://developer.wordpress.org/reference/functions/wp_nav_menu/
                        */
                wp_nav_menu(array(
                    'theme_location' => 'primary',  // wurde in der functions.php festgelegt "register_nav_menus()"
                    'container' => false,           // true würde eine <div> um die <ul> des wp_nav_menu() erzeugen
                    'menu_class' => 'nav-menu',     // Klassenname der ul: <ul class="nav-menu">
                    'menu_id' => 'nav-main',        // IDname der ul: <ul id="nav-main">
                    'depth' => 1,                   // Anzahl der Menüebenen die ausgegeben werden
                    'fallback_cb' => false          // wenn im WordPress kein Menü als "Footer Navigation" zugewiesen wurde (Checkbox), wird keine Navigation ausgegeben. Default wäre die Ausgebe der WordPress Funktion "wp_page_menu()" (https://developer.wordpress.org/reference/functions/wp_page_menu/)
                )); ?>
        </div>
      </div>
    </div>
  </nav>
  <!-- End Header
  ============================================ -->