<?php

/*=============================================
=       SHORTCODE ==> [nombre_shortcode]      =
===============================================*/
function nombre_funcion() {
    return 'TEXTO o HTML';
}
add_shortcode( 'nombre_shortcode', 'nombre_funcion' );

/*=============================================
=            BREADCRUMBS			          =
=============================================*/
//  to include in functions.php
function the_breadcrumb() {
    $sep = ' > ';
    if (!is_front_page()) {
	
	// Start the breadcrumb with a link to your homepage
        echo '<div class="breadcrumbs">';
        echo '<a href="';
        echo get_option('home');
        echo '">';
        bloginfo('name');
        echo '</a>' . $sep;
	
	// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
        if (is_category() || is_single() ){
            the_category('title_li=');
        } elseif (is_archive() || is_single()){
            if ( is_day() ) {
                printf( __( '%s', 'text_domain' ), get_the_date() );
            } elseif ( is_month() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
            } elseif ( is_year() ) {
                printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
            } else {
                _e( 'Blog Archives', 'text_domain' );
            }
        }
	
	// If the current page is a single post, show its title with the separator
        if (is_single()) {
            echo $sep;
            the_title();
        }
	
	// If the current page is a static page, show its title.
        if (is_page()) {
            echo the_title();
        }
	
	// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
        if (is_home()){
            global $post;
            $page_for_posts_id = get_option('page_for_posts');
            if ( $page_for_posts_id ) { 
                $post = get_page($page_for_posts_id);
                setup_postdata($post);
                the_title();
                rewind_posts();
            }
        }
        echo '</div>';
    }
} // Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/

/*=============================================
=     Open Graph para Facebook y Twitter      =
=============================================*/
add_action('wp_head', 'opengraph_fb_tw', 5);
function opengraph_fb_tw() {
    global $post;
    if( is_single() || is_page() ) {
        $post_id = get_queried_object_id();
        $url = get_permalink($post_id);
        $title = get_the_title($post_id);
        $site_name = get_bloginfo('name');	
        $description = wp_trim_words( get_post_field('post_content', $post_id), 25, '...' );
        echo '<meta property="og:type" content="article" />';
        echo '<meta property="og:title" content="' . esc_attr($title) . '" />';
        echo '<meta property="og:description" content="' . esc_attr($description) . '" />';
        echo '<meta property="og:url" content="' . esc_url($url) . '" />';
        echo '<meta property="og:site_name" content="NorfiPC" />';
            if(!has_post_thumbnail( $post->ID )) { 
            $default_image="https://norfipc.com/blog/wp-content/uploads/2018/09/cropped-notas.jpg";
            echo '<meta property="og:image" content="' . $default_image . '"/>';
        }
        else {
            $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' );
            echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
        }
        echo '<meta property="fb:app_id" content="XXXXXXX" />';
        echo '<meta property="article:author" content="XXXXXXXXX" />';
        // Twitter Card
        echo '<meta name="twitter:card" content="summary_large_image" />';
        echo '<meta name="twitter:site" content="@NorfiPC" />';
        echo '<meta name="twitter:creator" content="@NorfiPC" />';
    }
}

/*=============================================
=           Generar el sitemap.xml            =
=============================================*/
add_action( 'publish_post', 'itsg_create_sitemap' );
add_action( 'publish_page', 'itsg_create_sitemap' );
function itsg_create_sitemap() {
    $postsForSitemap = get_posts(array(
        'numberposts' => -1,
        'orderby' => 'modified',
        'post_type'  => array( 'post', 'page' ),
        'order'    => 'DESC'
    ));
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
    $sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';
    foreach( $postsForSitemap as $post ) {
        setup_postdata( $post );
        $postdate = explode( " ", $post->post_modified );
        $sitemap .= '<url>'.
          '<loc>' . get_permalink( $post->ID ) . '</loc>' .
          '<lastmod>' . $postdate[0] . '</lastmod>' .          
         '</url>';
      }
    $sitemap .= '</urlset>';
    $fp = fopen( ABSPATH . 'sitemap.xml', 'w' );
    fwrite( $fp, $sitemap );
    fclose( $fp );
}
/* ======================================================
   ***Agregar el sitemap.xml al archivo Robots.txt     
     # Google AdSense                         
     User-agent: Mediapartners-Google         
     Disallow:                                
     # global                                 
     User-agent: *                            
     Sitemap: https://norfipc.com/sitemap.xml 
     __________________________________________________
     https://norfipc.com/wordpress/como-crear-un-sitemap-xml-para-wordpress-sin-plugins.php
==========================================================/*

/*=============================================
=           Agregar schema JSON-LD            =
=============================================*/
// https://norfipc.com/wordpress/agregar-datos-estructurados-json-wordpress.php
function de_json() {
    if ( is_single() ) { 
        if ( has_post_thumbnail() ) {	
            $thumb_id = get_post_thumbnail_id();
            $thumb_url = wp_get_attachment_image_src($thumb_id,'full', true);
            $thumb_url = $thumb_url[0];		
            } else {
            $thumb_url = "https://machupicchu.biz/blog/RUTA A IMAGEN PREDETERMINADA.jpg";
            }	
    ?>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "BlogPosting",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo get_permalink(); ?>"
 },
  "headline": "<?php the_title(); ?>",
  "image": {
    "@type": "ImageObject",
    "url": "<?php echo $thumb_url ; ?>",
    "height": 1200,
    "width": 2000
  },
  "datePublished": "<?php echo get_the_time( 'c' ); ?>",
  "dateModified": "<?php echo get_the_modified_date( 'c' ); ?>",
  "author": {
    "@type": "Person",
    "name": "<?php the_author(); ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "<?php bloginfo(); ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "https://norfipc.com/logo.jpg",
      "width": 420,
      "height": 60
    }
  }
}
</script> <?php 
	}
	}
add_action('wp_footer','de_json');

/*=============================================
=      Desactivar los pingbacks propios       =
=============================================*/
function wpsites_disable_self_pingbacks( &$links ) {
    foreach ( $links as $l => $link )
          if ( 0 === strpos( $link, get_option( 'home' ) ) )
              unset($links[$l]);
  }
  
  add_action( 'pre_ping', 'wpsites_disable_self_pingbacks' );

// ALTER TABLE wp_comments ENGINE=InnoDB; ==> cambiar motor de BD


function doctype_opengraph($output) {
    return $output . '
    xmlns:og="http://opengraphprotocol.org/schema/"
    xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'doctype_opengraph');

function opengraph_function() {
    global $post;

    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium'); // Get page or post featured image
        } else {
            $img_src = 'URL-OF-DEFAULT-IMAGE-GOES-HERE'; // Set Default image if featured image doesn't exist.
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt); // Get excerpt
            $excerpt = str_replace("", "'", $excerpt); // Format excerpt
        } else {
            $excerpt = get_bloginfo('description'); // Get site description if no excerpt exists
        }
        ?>   
        <meta property="og:title" content="<?php echo the_title(); ?>"/> // The title that will show up in social media
        <meta property="og:description" content="<?php echo $excerpt; ?>"/> // The excerpt that will show up in social media
        <meta property="og:type" content="article"/> // The content that will show up in social media
        <meta property="og:url" content="<?php echo the_permalink(); ?>"/> // The link that will show up in social media
        <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/> // The website title that will show up in social media
        <meta property="og:image" content="<?php echo $img_src; ?>"/> // The image that will show up in social media

      <?php
    } else {  
        return; //if it is not a page or a post don't print any data
    }  
}  
add_action('wp_head', 'opengraph_function', 5); // adds code to the head of every page and post