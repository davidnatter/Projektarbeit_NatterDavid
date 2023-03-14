<?php /*
 * die footer.php wird auf jeder Seiten eingebunden (über die Funktion "get_footer()" in den einzelnen Templates).
 * Somit hier sollte das Markup, dass auf jeder Seite im Footer angezeigt wird, zu finden sein.
 * Am Ende sollte immer der schließende </body> und </html> Tag stehen - geöffnet werden die Tags in der Datei "header.php"
*/ ?>
    <footer id="footer" class="container columns">
        <div class="social-links column">
            <?php /*
                    * Ausgabe der Social Links aus der "ACF Option Page"
                    * https://www.advancedcustomfields.com/resources/get-values-from-an-options-page/
                    * https://www.advancedcustomfields.com/resources/group/
                    * Bedingungen: nur Icons anzeigen, wo es auch einen Link-Eintrag gibt
                    *
                    * Sämtliche Texte die wir in unserer functions.php oder in Templates schreiben und im Frontend oder Backend angezeigt werden, sollten über die Textdomain übersetzbar sein!
                    * https://developer.wordpress.org/reference/functions/_e/
                    */

            $links = get_field('social', 'option');
            ?>
            <?php if ($links['linkedin']) : ?>
                <a href="<?php echo $links['linkedin']; ?>" target="_blank">
                    <span class="icon-linkedin" aria-hidden="true"></span>
                    <span class="screen-reader-text"><?php _e('Follow on LinkedIn', 'wifi') ?></span>
                </a>
            <?php endif; ?>
            <?php if ($links['instagram']) : ?>
                <a href="<?php echo $links['instagram']; ?>" target="_blank">
                    <span class="icon-instagram" aria-hidden="true"></span>
                    <span class="screen-reader-text"><?php _e('Follow on Instagram', 'wifi') ?></span>
                </a>
            <?php endif; ?>
            <?php if ($links['facebook']) : ?>
                <a href="<?php echo $links['facebook']; ?>" target="_blank">
                    <span class="icon-facebook" aria-hidden="true"></span>
                    <span class="screen-reader-text"><?php _e('Follow on Facebook', 'wifi') ?></span>
                </a>
            <?php endif; ?>
            <?php if ($links['github']) : ?>
                <a href="<?php echo $links['github']; ?>" target="_blank">
                    <span class="icon-github" aria-hidden="true"></span>
                    <span class="screen-reader-text"><?php _e('Follow on gitHub', 'wifi') ?></span>
                </a>
            <?php endif; ?>
        </div>



    <nav id="nav-footer" class="column">
        <?php /*
                * Ausgabe des Menüs, dass im WordPress als "Footer Navigation" festgelegt wurde (Design -> Menüs oder Cusotmizer -> Menüs / Position im Theme: Checkbox "Footer Navigation")
                * https://developer.wordpress.org/reference/functions/wp_nav_menu/
                */
        wp_nav_menu(array(
            'theme_location' => 'footer',   // wurde in der functions.php festgelegt "register_nav_menus()"
            'container' => false,      // true würde eine <div> um die <ul> des wp_nav_menu() erzeugen
            'menu_class' => 'nav-menu', // Klassenname der ul: <ul class="nav-menu">
            'depth' => 1,          // Anzahl der Menüebenen die ausgegeben werden
            'fallback_cb' => false       // wenn im WordPress kein Menü als "Footer Navigation" zugewiesen wurde (Checkbox), wird keine Navigation ausgegeben. Default wäre die Ausgebe der WordPress Funktion "wp_page_menu()" (https://developer.wordpress.org/reference/functions/wp_page_menu/)
        )); ?>
    </nav>
    <div class="copyright column">
        <?php /* sprintf — gibt einen formatierten String zurück
                * https://www.php.net/manual/en/function.sprintf.php
                * translators: 1: Datum (nur Jahr), 2: Name der WordPress Seite
                */
        echo sprintf(__('&copy; %1$s, %2$s'), date('Y'), get_bloginfo('name')); ?>
    </div>

</footer>
<div id="to-top"><?php _e('Top', 'wifi'); ?></div>
<?php wp_footer(); ?>
</body>

</html>