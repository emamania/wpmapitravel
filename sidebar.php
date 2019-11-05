<div class="main_sidebar">
	<div class="chyt">
		<h4 class="block-title">Vea miles de testimonios</h4>
		<?php
			$api = simplexml_load_file('https://www.youtube.com/feeds/videos.xml?channel_id=UCVmp8Zbx9jJbGLRxir_LlKA');
			$nrolink = $api->entry;
			$count=0;
			foreach($nrolink as $movie) {
				if($count < 3){
					$var_yt = array('https://www.youtube.com/watch?v=');
					$link_yt = $movie->link->attributes()->href;
					echo '<div class="embed-responsive embed-16by9">';
					echo '<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/'.str_replace($var_yt, "", $link_yt).'" allowfullscreen></iframe></div>';
				}
				$count++;
			}
		?>		
	</div>
	<?php if (is_active_sidebar('sidebar_home')) :?>	
		<?php dynamic_sidebar('sidebar_home') ?>
	<?php endif; ?>
</div>