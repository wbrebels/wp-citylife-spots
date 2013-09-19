<?php
/*
Template Name: Location Template
*/

get_header(); ?>

<div id="primary">
	<div id="content" role="main">

		<?php 
			query_posts(array('post_type'=>'location')); 

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">

					<h1 class="entry-title"><?php the_title(); ?></h1>

					<?php the_post_thumbnail(); ?>
				
				</header>
					
				<div class="entry-content">
					<?php the_content(); ?>

					<hr />
					<p>
						<?php/*
							if(!empty(esc_attr(get_post_meta(get_the_ID(), 'location_street', true )))){
								echo esc_attr( get_post_meta(get_the_ID(), 'location_street', true )) . " " . esc_attr(get_post_meta(get_the_ID(), 'location_number', true )) . " " . esc_attr(get_post_meta(get_the_ID(), 'location_box', true ));
							}
							if(!empty(esc_attr(get_post_meta(get_the_ID(), 'location_zipcode', true )))){
								echo "B-" . esc_attr(get_post_meta( get_the_ID(), 'location_zipcode', true ) ) . " " . esc_attr( get_post_meta( get_the_ID(), 'location_city', true ) );
							}

							if(!empty(esc_attr(get_post_meta(get_the_ID(), 'location_phone', true )))){
								echo "T. " . esc_attr(get_post_meta( get_the_ID(), 'location_phone', true ) );
							}

							if(!empty(esc_attr(get_post_meta(get_the_ID(), 'location_fax', true )))){
								echo "F. " . esc_attr(get_post_meta( get_the_ID(), 'location_fax', true ));
							}
							if(!empty(esc_attr(get_post_meta(get_the_ID(), 'location_email', true )))){
								echo antispambot(esc_attr(get_post_meta( get_the_ID(), 'location_email', true )));
							}
*/
							//if(esc_attr(get_post_meta(get_the_ID(), 'location_website', true ))){
							//echo get_the_ID();
								//echo get_post_meta( get_the_ID(), 'location_website', true );
							//}
						?>
					</p>

					<hr />
					<p>
						<strong>Openingsuren: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'location_openinghours', true ) ); ?><br />
						<strong>Sluitingsdag: </strong><?php echo esc_attr( get_post_meta( get_the_ID(), 'location_closingdays', true ) ); ?>
					</p>

					<hr />
					<p>
						Groups Capacity: <?php echo esc_attr( get_post_meta( get_the_ID(), 'location_capacity_group', true ) ); ?> |
						Seats outside: <?php echo esc_attr( get_post_meta( get_the_ID(), 'location_capacity_outside', true ) ); ?> |
						Seats inside: <?php echo esc_attr( get_post_meta( get_the_ID(), 'location_capacity_inside', true ) ); ?> |
						<?php echo esc_attr( get_post_meta( get_the_ID(), 'location_childfriendly', true ) ) == "on" ? "Childfriendly | " : ""; ?>
						<?php echo esc_attr( get_post_meta( get_the_ID(), 'location_bikefriendly', true ) ) == "on" ? "Bicyclefriendly | " : ""; ?>
						<?php echo esc_attr( get_post_meta( get_the_ID(), 'location_wheelchair', true ) ) == "on" ? "Accessible for wheelchair users" : ""; ?>
					</p>
					
				</div>

			</article>

			<hr/>
			<?php 


		?>
	</div>
</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>
