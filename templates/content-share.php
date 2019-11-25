<div class="share-post">
 
    <h4><?php _e('Compartir', 'theme_name');?></h4>
 
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="facebook" target="_blank">
        Facebook
    </a>
 
    <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title_attribute(); ?>%20por%20@ayudawp" class="twitter" target="_blank">
        Twitter
    </a>
 
    <a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="googleplus" target="_blank">
        Google+
    </a>
 
   <?php //Obtenemos la URL de la imagen destacada
    $pin_imagen = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
 
    <a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $pin_imagen[0]; ?>" class="pinterest" target="_blank">
        Pinterest
    </a>
 
</div> <!-- /. share-post -->
<!-- Agregar ente codigo en single.php -->
<?php get_template_part('content', 'share');?>