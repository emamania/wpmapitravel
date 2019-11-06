<?php get_header(); ?>
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
            <div class="md-cols-6">
                <h2 class="block-title">Noticias de Machu Picchu</h2>              
                <div class="homeright_rs">
                    <div>                        
                        <?php                        
                        require_once( ABSPATH . WPINC . '/feed.php' );
                        $feed_url = 'http://feeds.feedburner.com/machupicchu-noticias';
                        $rss = fetch_feed($feed_url);                        
                        if (!is_wp_error($rss)) {
                            $max_items = $rss->get_item_quantity(6); //pass the quantity(number of post to fetch)
                            $rss_items = $rss->get_items( 0, $max_items );
                        
                            if ($max_items > 0) {
                                foreach ($rss_items as $item) {
                                    ?>
                                    <article class="news">
                                        <div class="news_content"><?php echo $item->get_description(); ?></div>                                        
                                        <h3><a href="<?php echo $item->get_permalink();?>"><?php echo $item->get_title(); ?></a></h3>
                                        <div class="new_btn">
                                            <a href="<?php echo $item->get_permalink();?>">Leer más</a>
                                        </div>
                                    </article>
                                    <?php
                                }
                            }
                        }?>
                    </div>
                </div>
                <?php if (is_active_sidebar('homeright')) :?>	
                    <?php dynamic_sidebar('homeright') ?>
                <?php endif; ?>
            </div>
            <div class="md-cols-3">
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
                        <a href="#"></a>
                        <p>Cámara de Turísmo Cusco</p>
                    </div>
                    <div class="cert">
                        <a href="#"></a>
                        <p>Cámara de Turísmo Cusco</p>
                    </div>
                    <div class="cert">
                        <a href="#"></a>
                        <p>Cámara de Turísmo Cusco</p>
                    </div>
                    <div class="cert">
                        <a href="#"></a>
                        <p>Cámara de Turísmo Cusco</p>
                    </div>
                    <div class="cert">
                        <a href="#"></a>
                        <p>Cámara de Turísmo Cusco</p>
                    </div>
                </div>
            </div>
            <div class="md-cols-2">
                <div class="certified sm-grid-2 emagrid md-grid-2">
                    <div class="cert">
                        <a class="a" href="#"></a>
                        <p>Cámara de Turísmo Cusco</p>
                    </div>
                    <div class="cert">
                        <a class="a" href="#"></a>
                        <p>Cámara de Turísmo Cusco</p>
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