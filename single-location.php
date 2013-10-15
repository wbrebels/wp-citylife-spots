<?php
/*
Template Name: Location Template
*/
?>

<div id="primary">
	<div id="content" role="main">

		<?php 
			query_posts(array('post_type'=>'location')); 

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">

					

					<?php
						$post = get_post();
					?>

					<h1 class="entry-title"><?php echo $post->post_title; ?></h1>
					<div class="clearfix">
						<div><?php the_post_thumbnail("medium", array('class' => 'location-thumbnail pull-right')); ?></div>
							
						<?php echo $post->post_content; ?>
					</div>
				
				</header>
					
				<div class="entry-content">

					<hr />
					<div class="row">
						<div class="span4">
						<?php
							if(get_post_meta(get_the_ID(), 'location_phone', true) !== ""){
								echo "T. " . esc_attr(get_post_meta( get_the_ID(), 'location_phone', true )) . "<br />";
							}
							if(get_post_meta(get_the_ID(), 'location_fax', true) !== ""){
								echo "F. " . esc_attr(get_post_meta( get_the_ID(), 'location_fax', true )) . "<br />";
							}
							if(get_post_meta(get_the_ID(), 'location_email', true) !== ""){
								$location_email = antispambot(esc_attr(get_post_meta( get_the_ID(), 'location_email', true )));
								echo '<a href="mailto:' . $location_email . '">' . $location_email . '</a>' . "<br />";
							}
							if(get_post_meta(get_the_ID(), 'location_website', true) !== ""){
								$location_website = esc_attr(get_post_meta( get_the_ID(), 'location_website', true ));
								echo '<a href="http://' . str_replace("http://", "", $location_website) . '">' . $location_website . '</a>' . "<br />";
							}
						?>
						</div>
						<div class="span5">
						<?php
							if(get_post_meta(get_the_ID(), 'location_street', true) !== ""){
								echo esc_attr( get_post_meta(get_the_ID(), 'location_street', true )) . " " . esc_attr(get_post_meta(get_the_ID(), 'location_number', true )) . " " . esc_attr(get_post_meta(get_the_ID(), 'location_box', true )) . "<br />";
							}
							if(get_post_meta(get_the_ID(), 'location_city', true) !== ""){
								echo "B-" . esc_attr(get_post_meta( get_the_ID(), 'location_zipcode', true )) . " " . esc_attr( get_post_meta( get_the_ID(), 'location_city', true )) . "<br />";
							}
						?>
						</div>
					</div>

					<hr />
					<p>

						<?php
							$location_openinghours = get_post_meta(get_the_ID(), 'location_openinghours', true);
							$location_closingdays = get_post_meta(get_the_ID(), 'location_closingdays', true);

							if($location_openinghours !== ""){
								echo "<strong>Openingsuren:</strong> " . esc_attr($location_openinghours) . "<br />";
							}
							if($location_closingdays !== ""){
								echo "<strong>Sluitingsdagen:</strong> " . esc_attr($location_closingdays) . "<br />";
							}
						?>
					</p>

					<?php if($location_openinghours or $location_closingdays){ ?><hr /><?php } ?>
					<p>

						<?php
							$location_capacity_group = get_post_meta(get_the_ID(), 'location_capacity_group', true);
							$location_capacity_outside = get_post_meta(get_the_ID(), 'location_capacity_outside', true);
							$location_capacity_inside = get_post_meta(get_the_ID(), 'location_capacity_inside', true);

							$location_childfriendly = get_post_meta( get_the_ID(), 'location_childfriendly', true );
							$location_bikefriendly = get_post_meta( get_the_ID(), 'location_bikefriendly', true );
							$location_wheelchair = get_post_meta( get_the_ID(), 'location_bikefriendly', true );

							if($location_capacity_group !== ""){
								echo "<strong>Capaciteit groepen:</strong> " . esc_attr($location_capacity_group);
							}
							if($location_capacity_outside !== ""){
								echo " | <strong>Plaatsen terras:</strong> " . esc_attr($location_capacity_outside);
							}
							if($location_capacity_inside !== ""){
								echo " | <strong>Plaatsen binnen:</strong> " . esc_attr($location_capacity_inside);
							}
						?>
						
						<?php echo esc_attr( $location_childfriendly ) == "on" ? " | Kindvriendelijk" : ""; ?>
						<?php echo esc_attr( $location_bikefriendly ) == "on" ? " | Fietsvriendelijk" : ""; ?>
						<?php echo esc_attr( $location_wheelchair ) == "on" ? " | Toegankelijkheid rolstoelgebruikers" : ""; ?>
					</p>

					<?php if($location_capacity_group or $location_capacity_outside or $location_capacity_inside or $location_childfriendly or $location_bikefriendly or $location_wheelchair) { ?><hr/><?php } ?>
					
				</div>

			</article>

			<a class="btn" href="<?php print $_SERVER['HTTP_REFERER'];?>">&laquo; Terug</a>
	</div>
</div>

<?php wp_reset_query(); ?>
