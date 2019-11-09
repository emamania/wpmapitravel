<?php 
//habilitamos el uso de búferes de salida
ob_start('comprimir_pagina'); 
get_header(); ?>
<body>
    <?php 
    if ( !is_page_template( 'templates/header_topbar.php' ) ) {
        get_template_part('templates/header_topbar');        
    } ?>
    <div id="header-inner" class="emagrid">
        <img style="height:250px;" src="https://www.salkantaytrek.tours/wp-content/themes/wpqellucart/assets/images/bg-header.jpg" alt="Logo de mapitravel">
    </div>    
    <main id="main_content">
        <div class="front emagrid md-grid-1 front">
            <div class="s-py-1 md-cols-1 lg-py-2">
                <?php if (is_active_sidebar('welcome')) :?>	
                    <?php dynamic_sidebar('welcome') ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="front emagrid md-grid-9">
            <div class="md-cols-6 main_cont">
                <?php while(have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; wp_reset_postdata(); ?>                                
            </div>
            <div class="md-cols-3">
                <?php get_sidebar(); ?>
            </div>
        </div>
        <div class="front emagrid md-grid-9">
            <div class="s-py-1 md-cols-6 lg-py-2">
                <h2 class="block-title">Noticias de Machu Picchu</h2>
                <div class="homeright_nws">
                    <?php
                        $api = simplexml_load_file('https://news.machupicchu.com.pe/rss.xml');
                        $newslink = $api->channel->item;
                        $count=0;
                        foreach($newslink as $new) {
                            if($count < 6){
                                echo '<div class="data">';
                                echo $new->description;
                                echo '<h3><a href="'. $new->link .'">'. $new->title . '</a></h3>';
                                echo '<div class="new_btn"><a href="' . $new->link .'">Leer más</a></div></div>';
                            }
                            $count++;
                        }
                    ?>		
                </div>

                <?php if (is_active_sidebar('homeright')) :?>	
                    <?php dynamic_sidebar('homeright') ?>
                <?php endif; ?>
            </div>
            <div class="s-py-1 md-cols-3 lg-py-2">
                <?php if (is_active_sidebar('homeleft')) :?>	
                    <?php dynamic_sidebar('homeleft') ?>
                <?php endif; ?>
            </div>
        </div>

    </main>
    <section class="own">
        <div class="emagrid md-grid-7">
            <hr class="md-cols-7">
            <div class="md-cols-5">
                <div class="certified sm-grid-3 emagrid md-grid-5">
                    <div class="cert">
                        <a href="https://cartuc.org/asociado/machupicchu-travel/" rel="nofollow" target="_blank"></a>                        
                    </div>
                    <div class="cert">
                        <a href="https://www.machupicchu.com.pe/imagenes/certificado-de-la-camara-de-comercio-lima.jpg" rel="nofollow" target="_blank"></a>                        
                    </div>
                    <div class="cert">
                        <a href="https://www.camaracusco.org/busqueda-asociados-2019.php?nombre=12" rel="nofollow" target="_blank"></a>                        
                    </div>
                    <div class="cert">
                        <a href="https://www.aatccusco.com/#socios" rel="nofollow" target="_blank"></a>                        
                    </div>
                    <div class="cert">
                        <a href="https://www.machupicchu.com.pe/imagenes/logo_peru_pe.png" rel="nofollow" target="_blank"></a>                        
                    </div>
                </div>
            </div>
            <div class="md-cols-2">
                <div class="certified sm-grid-2 emagrid md-grid-2">
                    <div class="cert">
                        <a class="a" href="https://www.machupicchu.biz/autorizaciones-de-la-empresa-machu-picchu-travel" target="_blank"></a>                        
                    </div>
                    <div class="cert">
                        <a class="a" href="https://www.machupicchu.biz/autorizaciones-de-la-empresa-machu-picchu-travel" target="_blank"></a>                        
                    </div>
                </div>
            </div>
            <hr class="md-cols-7">
            <div class="md-cols-7">
                <div class="autor">
                    <h4>Esta tienda está autorizada por Visa para realizar transacciones electrónicas.</h4>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/metod-pay.png" width="672" height="45">
                </div>
            </div>
            <hr class="md-cols-7" style="margin-bottom: 3em;border:none;">
        </div>
    </section>
</body>
</html>
<?php get_footer();?>
<?php
// Una vez que el búfer almacena nuestro contenido utilizamos "ob_end_flush" para usarlo y deshabilitar el búfer
ob_end_flush(); 
// Función para eliminar todos los espacios en blanco
function comprimir_pagina($buffer) { 
  $busca = array('/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s'); 
  $reemplaza = array('>','<','\\1'); 
  return preg_replace($busca, $reemplaza, $buffer); 
} 
?>