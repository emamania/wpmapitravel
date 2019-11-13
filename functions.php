<?php
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/enqueue.php';

/* Add custom Widget */
function website_widgets(){
    register_sidebar(array(
        'name' => 'Agrege texto de Bienvenida',
        'id' => 'welcome',
        'before_widget' => '<div class="welcome">',
        'after_widget' => '</div>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ));
    register_sidebar(array(
        'name' => 'Agrege Codigo de Mapa',
        'id' => 'map',
        'before_widget' => '<div class="map even mt_15">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="block__title block-title">',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar_home',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="block-title">',
        'after_title' => '</h4>'
    ));

    register_sidebar(array(
        'name' => 'Descripción de WebSite',
        'id' => 'destour',
        'before_widget' => '<div class="howsite">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
    /* 
    register_sidebar(array(
        'name' => 'Seccion Noticias',
        'id' => 'news',
        'before_widget' => '<div class="news even mt_15">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="block__title block-title">',
        'after_title' => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Seccion Tripadvisor',
        'id' => 'trip',
        'before_widget' => '<div class="tripad">',
        'after_widget' => '</div>',
        'before_title' => '<p class="block__title block-title">',
        'after_title' => '</p>'
    ));
    register_sidebar(array(
        'name' => 'Seccion Certificados',
        'id' => 'certi',
        'before_widget' => '<div class="certi even mt_15">',
        'after_widget' => '</div>',
        'before_title' => '<p class="block__title block-title">',
        'after_title' => '</p>'
    )); */
    register_sidebar(array(
        'name' => 'Home Right',
        'id' => 'homeright',
        'before_widget' => '<div class="homeright">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Home Left',
        'id' => 'homeleft',
        'before_widget' => '<div class="homeleft">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="block-title">',
        'after_title' => '</h2>'
    ));	

    register_sidebar(array(
        'name' => 'Footer',
        'id' => 'footer',
        'before_widget' => '<div class="footer widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    register_sidebar(array(
        'name' => 'Olark Code',
        'id' => 'olark',
        'before_widget' => '<div class="olark widget">',
        'after_widget' => '</div>'
    ));   
    
}
add_action('widgets_init','website_widgets');

/* Function Text cut */
function recortarTexto($texto, $limite=100){
    $texto = trim($texto);
    $texto = strip_tags($texto);
    $tamano = strlen($texto);
    $resultado = '';
    if($tamano <= $limite){
        return $texto;
    }else{
        $texto = substr($texto, 0, $limite);
        $palabras = explode(' ', $texto);
        $resultado = implode(' ', $palabras);
        $resultado .= '...';
    }
    return $resultado;
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
   
/**
* Filter function used to remove the tinymce emoji plugin.
* 
* @param array $plugins 
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}
   
/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
        /** This filter is documented in wp-includes/formatting.php */
        $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );   
        $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }   
   return $urls;
}
remove_action('wp_head', 'wp_resource_hints', 2); //https://maswordpress.info/questions/7235/eliminar-rel-dns-prefetch-href-mapsgooglecom-de-wp-head

/* Defer Parsing of JavaScript => https://www.collectiveray.com/defer-parsing-of-javascript-wordpress-async */
/* function defer_parsing_of_js ( $url ) {
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'jquery.js' ) ) return $url;
      return "$url' defer ";
  }
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 ); */

	
function ema_add_lazy_loading($content) {
    $content = str_replace('<img','<img loading="lazy"', $content);
    return $content;
}
add_filter('the_content', 'ema_add_lazy_loading');