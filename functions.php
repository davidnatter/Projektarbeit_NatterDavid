<?php
/*
 * In der functions.php werden über Actions, Filter & Hooks sämtliche WordPress Funktionen de-/aktiviert bzw. angepasst
 * https://developer.wordpress.org/themes/basics/theme-functions/
 * https://kinsta.com/de/blog/wordpress-hooks/
 *
 * Offizielle Doku zu WordPress Themes: https://developer.wordpress.org/themes/
 * Offizielle Doku zum Gutenberg Editor: https://developer.wordpress.org/block-editor/
 *
 * Auch eigene PHP-Funktionen, die man in den Teplates verwenden möchte, können in die functions.php geschrieben werden
 */

/* ---- Theme Setups ----
* Dieser Hook wird bei jedem Laden der Seite aufgerufen, nachdem das Theme initialisiert wurde. Es wird im Allgemeinen verwendet, um grundlegende Setup-, Registrierungs- und Initiierungsaktionen für ein Theme auszuführen.
* https://developer.wordpress.org/reference/hooks/after_setup_theme/
*/
add_action('after_setup_theme', function () {

    // Title Tag in <head> : <title>...</title>
    add_theme_support('title-tag');

    /* Pfad zur Sprachdatei
    * load_textdomain() gibt den Namen der Übersetzungsdatei (beliebiger Name) und den Pfad an, wo diese zu finden ist.
    * https://developer.wordpress.org/reference/functions/load_textdomain/
    * get_template_directory() liefert den absoluten Server-Pfad zum Theme-Verzeichnis (ZB: "/var/www/html/wp-content/themes/webdev-theme") https://developer.wordpress.org/reference/functions/get_template_directory/
    *
    * Sämtliche Texte die wir in unserer functions.php oder in Templates schreiben und im Frontend oder Backend angezeigt werden, sollten über die Textdomain übersetzbar sein!
    * die Ausgabe im PHP wird in der Funktion als echo "_e('Zu übersetzender Text','TEXTDOMAIN')" oder return "__('Zu übersetzender Text','TEXTDOMAIN')" eingebunden
    * https://developer.wordpress.org/reference/functions/_e/
    */
    load_textdomain('wifi', get_template_directory() . '/assets/languages');

        // Aktivierung von Beitragsbildern
    //add_theme_support('post-thumbnails');

   // Eigene Bildgrößen im Theme definieren bzw. registrieren (https://developer.wordpress.org/reference/functions/add_image_size/)
    add_image_size('project', 730, 487, array('center', 'center'));  // 730x487 = 3:2


    // WordPress HTML5-Markup
    add_theme_support('html5', array(
        'search-form',
        'gallery',
        'caption',
        'style',
        'script',
        'comment-list',
        'comment-form'
    ));


        /*
    * register_nav_menus() registriert Navigations Menüs (ohne diese Funktion gibt es im Admin-Menü: "Design > Menüs" nicht zur Aswahl
    * im array werden die "Positionen im Theme" definiert
    * https://developer.wordpress.org/reference/functions/register_nav_menus/
    */
    register_nav_menus(array(
        'primary' => __('Haupt Navigation', 'wifi'),
        'footer' => __('Footer Navigation', 'wifi'),
    ));


    /* -- Customizer --
     * Custom Logo über Customizer zu ändern
     * https://developer.wordpress.org/themes/functionality/custom-logo/
     */
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 100,

        /* Bei SVG (können nicht beschnitten werden) MUSS beides true sein */
        'flex-height' => true,
        'flex-width' => true
    ));
