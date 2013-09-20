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
				
				?>

				<?php if($post_number % 3 == 1){ ?>
                <div class="row">
                <?php } ?>

					<div class="span3">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">

								<h1 class="entry-title">
									<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h1>
								<a href="<?php the_permalink(); ?>" rel="bookmark">
									<?php the_post_thumbnail('medium'); ?>
								</a>
							</header>
								
						</article>
					</div>

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
