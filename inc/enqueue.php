<?php
/*
    ====================================
        FRONT-END ENQUEUE FUNCTIONS
    ====================================
*/
function ema_load_scripts(){
    
    wp_enqueue_style( 'normalizer', get_template_directory_uri() . './css/main.css', false, '1.0');
    
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'ema_load_scripts' );