<?php
/*
Template Name: Location Template
*/
?>

<div id="primary">
	<div id="content" role="main">

		<h1>Handelaars</h1>
		
		<?php
		// The Query
		query_posts( array('post_type'=>'location', 'posts_per_page' => -1, 'orderby'=> 'title', 'order' => 'ASC' ) );

		$post_number = 1;
		$posts_total = $wp_query->found_posts;
		// The Loop
		while ( have_posts() ) : the_post();
		    if ( has_post_thumbnail()) {
			   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
			}
						
			?>

			<?php if($post_number % 3 == 1){ ?>
            <div class="row">
            <?php } ?>
            	<a href="<?php the_permalink() ?>">
                	<div class="spot span3">
                		<div class="spot-img has-img" style="background-image: url(<?php if(has_post_thumbnail()){ echo $large_image_url[0];} ?>);">
                		</div>
                		<div class="spot-name" style="border-color: #15a5db;"><?php the_title(); ?></div>
                	</div>
            	</a>
			<?php if($post_number % 3 == 0 or $post_number == $posts_total){ ?>
            </div>
            <?php } ?>

			<?php 
			$post_number++;
		endwhile;

		// Reset Query
		wp_reset_query();
		?>
	</div>
</div>

<?php wp_reset_query(); ?>
