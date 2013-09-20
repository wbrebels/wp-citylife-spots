<?php
/*
Template Name: Location Template
*/

get_header(); ?>

<div id="primary">
	<div id="content" role="main">

		<?php 
			query_posts(array('post_type'=>'location')); 

			$mypost = array( 'post_type' => 'location' );
			$loop = new WP_Query( $mypost );

			$post_number = 1;
			$posts_total = $loop->found_posts;

			while ( $loop->have_posts() ) : $loop->the_post(); 

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
		?>
	</div>
</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>
