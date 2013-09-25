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

					<div class="media">
						<div class="pull-right">
							<?php the_post_thumbnail("medium", array('class' => 'media-object')); ?>
						</div>
						<div class="media-body">
							<?php echo $post->post_content; ?>
						</div>
					</div>
				
				</header>
					
				<div class="entry-content">

					<hr />
					<div class="row">
						<div class="span4">
						<?php
							if(get_post_meta(get_the_ID(), 'location_street', true) !== ""){
								echo esc_attr( get_post_meta(get_the_ID(), 'location_street', true )) . " " . esc_attr(get_post_meta(get_the_ID(), 'location_number', true )) . " " . esc_attr(get_post_meta(get_the_ID(), 'location_box', true )) . "<br />";
							}
							if(get_post_meta(get_the_ID(), 'location_city', true) !== ""){
								echo "B-" . esc_attr(get_post_meta( get_the_ID(), 'location_zipcode', true )) . " " . esc_attr( get_post_meta( get_the_ID(), 'location_city', true )) . "<br />";
							}
						?>
						</div>
						<div class="span5">
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
								echo '<a href="http://' . str_replace($location_website, "http://", "") . '">' . $location_website . '</a>' . "<br />";
							}
						?>
						</div>
					</div>

					<hr />
					<p>

						<?php
							if(get_post_meta(get_the_ID(), 'location_openinghours', true) !== ""){
								echo "<strong>Openingsuren:</strong> " . esc_attr(get_post_meta( get_the_ID(), 'location_openinghours', true )) . "<br />";
							}
							if(get_post_meta(get_the_ID(), 'location_closingdays', true) !== ""){
								echo "<strong>Sluitingsdag:</strong> " . esc_attr(get_post_meta( get_the_ID(), 'location_closingdays', true )) . "<br />";
							}
						?>
					</p>

					<hr />
					<p>

						<?php
							if(get_post_meta(get_the_ID(), 'location_capacity_group', true) !== ""){
								echo "<strong>Groups Capacity:</strong> " . esc_attr(get_post_meta( get_the_ID(), 'location_capacity_group', true )) . " | ";
							}
							if(get_post_meta(get_the_ID(), 'location_capacity_outside', true) !== ""){
								echo "<strong>Seats outside:</strong> " . esc_attr(get_post_meta( get_the_ID(), 'location_capacity_outside', true )) . " | ";
							}
							if(get_post_meta(get_the_ID(), 'location_capacity_inside', true) !== ""){
								echo "<strong>Seats inside:</strong> " . esc_attr(get_post_meta( get_the_ID(), 'location_capacity_inside', true )) . " | ";
							}
						?>
						
						<?php echo esc_attr( get_post_meta( get_the_ID(), 'location_childfriendly', true ) ) == "on" ? "Childfriendly | " : ""; ?>
						<?php echo esc_attr( get_post_meta( get_the_ID(), 'location_bikefriendly', true ) ) == "on" ? "Bicyclefriendly | " : ""; ?>
						<?php echo esc_attr( get_post_meta( get_the_ID(), 'location_wheelchair', true ) ) == "on" ? "Accessible for wheelchair users" : ""; ?>
					</p>
					
				</div>

			</article>

			<hr/>
			<a class="btn" href="<?php print $_SERVER['HTTP_REFERER'];?>">&laquo; Terug</a>
	</div>
</div>

<?php wp_reset_query(); ?>
