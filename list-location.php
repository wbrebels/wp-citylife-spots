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

			while ( $loop->have_posts() ) : $loop->the_post(); 
				
				?>
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

				<hr/>
				<?php 

			endwhile; 
		?>
	</div>
</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>
