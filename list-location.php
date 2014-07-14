<?php
/*
Template Name: Location Template
*/
?>

<div id="primary">
	<div id="content" role="main">

		<?php if (single_cat_title('', false)): ?>
			<h1><?php single_cat_title( '', true ); ?> (<?php echo $wp_query->found_posts; ?> resultaten)</h1>	
		<?php else: ?>
			<h1>Winkels (<?php echo $wp_query->found_posts; ?> resultaten)</h1>
		<?php endif ?>
		<?php
		wp('posts_per_page=15');
		$post_number = 1;
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if($post_number % 3 == 1): ?>
				<div class="row">
			<?php endif; ?>
				<?php 
					if ( has_post_thumbnail()) {
					   $post_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large')[0];
					}
				?>
				<a href="<?php the_permalink() ?>">
                	<div class="spot span3">
                		<div class="spot-img has-img" style="background-image: url(<?php if(has_post_thumbnail()){ echo $post_image_url;} ?>);">
                		</div>
                		<div class="spot-name" style="border-color: #15a5db;"><?php the_title(); ?></div>
                	</div>
            	</a>
			<?php if($post_number % 3 == 0 or $post_number == sizeof($wp_query->posts)): ?>
				</div>
			<?php endif; ?>
			<?php $post_number++; ?>
		<?php endwhile; ?>
		<div class="nav-next alignleft"><?php previous_posts_link( 'Terug' ); ?></div>
		<div class="nav-previous alignright"><?php next_posts_link( 'Verder' ); ?></div>
		<?php else: ?>
		<p><?php _e('Sorry, er werden geen winkels gevonden.'); ?></p>
		<?php endif; ?>
	</div>
</div>
