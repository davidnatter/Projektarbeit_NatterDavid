<?php get_header( ); ?>
<main id="main-content" class="main-container">
    <h1><?php _e('Seite nicht gefunden', 'wifi');  ?></h1>
    <h2><?php _e('Fehler 404', 'wifi'); ?></h2>
    <a href="<?php echo home_url( ); ?>" class="cta"><?php _e('Zur Startseite', 'wifi'); ?></a>
</main>
<?php get_footer( ) ; ?>