<?php
/*
Template Name: Location Template
*/
?>

<?php 
	wp_enqueue_style( 'wp-citylife-spots', plugins_url( 'css/wp-citylife-spots.css', __FILE__ ) );
	wp_enqueue_style( 'lightbox', plugins_url( 'lightbox/css/lightbox.css', __FILE__ ) );

	wp_enqueue_script(
		'lightbox',
		plugins_url() . '/wp-citylife-spots/lightbox/js/lightbox.min.js'
	);
?>

<script type="text/javascript">
	mixpanel.track("Location viewed", {
		"SIL_location": "<?php echo get_permalink(); ?>"
	});
</script>
<div id="primary">
	<div id="content" role="main">

		<?php 
			query_posts(array('post_type'=>'location'));
			$post = get_post();

			$location_name = $post->post_title;
			$location_description = $post->post_content;

			$location_phone = esc_attr(get_post_meta(get_the_ID(), 'location_phone', true));
			$location_fax = esc_attr(get_post_meta(get_the_ID(), 'location_fax', true));
			$location_email = antispambot(esc_attr(get_post_meta(get_the_ID(), 'location_email', true)));
			$location_website = esc_attr(get_post_meta( get_the_ID(), 'location_website', true ));
			$location_facebook_link = esc_attr(get_post_meta( get_the_ID(), 'location_facebook_link', true ));
			$location_twitter_link = esc_attr(get_post_meta( get_the_ID(), 'location_twitter_link', true ));

			$location_address_street = esc_attr(get_post_meta(get_the_ID(), 'location_street', true ));
			$location_address_number = esc_attr(get_post_meta(get_the_ID(), 'location_number', true ));
			$location_address_box = esc_attr(get_post_meta(get_the_ID(), 'location_box', true ));
			$location_address_city = esc_attr( get_post_meta( get_the_ID(), 'location_city', true ));
			$location_address_zipcode = "B-" . esc_attr(get_post_meta( get_the_ID(), 'location_zipcode', true ));

			$location_address_full = ''; // $location_address_street . ' ' . $location_address_number . ' ' . $location_address_city;
			$location_address_full .= ($location_address_street ?  $location_address_street : '');
			$location_address_full .= ($location_address_number ?  ' ' . $location_address_number : '');
			$location_address_full .= ($location_address_box ?  ' ' . $location_address_box : '');
			$location_address_full .= ($location_address_city ?  ' ' . $location_address_city : '');
			$location_address_full .= ($location_address_zipcode ?  ' ' . $location_address_zipcode : '');

			$location_address_url_encoded = urlencode($location_address_full);
			$location_address_directions_url = "https://www.google.com/maps?saddr=Current+Location&daddr=" . $location_address_url_encoded;

			$location_latitude = get_post_meta(get_the_ID(), 'location_latitude', true);
			$location_longitude = get_post_meta(get_the_ID(), 'location_longitude', true);

			$location_openinghours = esc_attr(get_post_meta(get_the_ID(), 'location_openinghours', true));
			$location_closingdays = esc_attr(get_post_meta(get_the_ID(), 'location_closingdays', true));

			// Images
			$location_image1_url = esc_attr(get_post_meta( get_the_ID(), 'location_image1_url', true ));
			$location_image1_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image1_thumbnail_url', true ));
			$location_image2_url = esc_attr(get_post_meta( get_the_ID(), 'location_image2_url', true ));
			$location_image2_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image2_thumbnail_url', true ));
			$location_image3_url = esc_attr(get_post_meta( get_the_ID(), 'location_image3_url', true ));
			$location_image3_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image3_thumbnail_url', true ));
			$location_image4_url = esc_attr(get_post_meta( get_the_ID(), 'location_image4_url', true ));
			$location_image4_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image4_thumbnail_url', true ));
			$location_image5_url = esc_attr(get_post_meta( get_the_ID(), 'location_image5_url', true ));
			$location_image5_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image5_thumbnail_url', true ));
			$location_image6_url = esc_attr(get_post_meta( get_the_ID(), 'location_image6_url', true ));
			$location_image6_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image6_thumbnail_url', true ));
			$location_image7_url = esc_attr(get_post_meta( get_the_ID(), 'location_image7_url', true ));
			$location_image7_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image7_thumbnail_url', true ));
			$location_image8_url = esc_attr(get_post_meta( get_the_ID(), 'location_image8_url', true ));
			$location_image8_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image8_thumbnail_url', true ));
			$location_image9_url = esc_attr(get_post_meta( get_the_ID(), 'location_image9_url', true ));
			$location_image9_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image9_thumbnail_url', true ));
			$location_image10_url = esc_attr(get_post_meta( get_the_ID(), 'location_image10_url', true ));
			$location_image10_thumbnail_url = esc_attr(get_post_meta( get_the_ID(), 'location_image10_thumbnail_url', true ));

			$location_hs_start_date = esc_attr(get_post_meta( get_the_ID(), 'location_hs_start_date', true ));
			$location_hs_end_date = esc_attr(get_post_meta( get_the_ID(), 'location_hs_end_date', true ));
			$location_hs_description = esc_attr(get_post_meta( get_the_ID(), 'location_hs_description', true ));
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php echo $location_name; ?></h1>
					<div class="clearfix">
						<?php 
						if ($location_image1_thumbnail_url !== ""){ ?>
						<div>
							<a class="location-thumbnail pull-right wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image1_url; ?>">
								<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image1_thumbnail_url; ?>"/>
							</a>
						</div>
						<?php
						} ?>
							
						<?php echo $location_description; ?>
					</div>
				</header>
				<div class="entry-content">
					<div class="row">
						<div class="span9">
							<?php 
								if (
									$location_hs_start_date !== "" &&
									$location_hs_end_date !== "" &&
									$location_hs_description !== "" &&
									(strtotime($location_hs_start_date) < time() && strtotime($location_hs_end_date) > time())
								) {
									echo "<hr>";
									echo "<b>Herfstshopping voordeel (geldig tot " . Date('j/n/Y' , strtotime($location_hs_end_date)) . "): </b><br>" . $location_hs_description;
								}
							?>
						</div>
					</div>
					<div class="row">
						<?php
						if (
							$location_image2_thumbnail_url !== "" ||
							$location_image3_thumbnail_url !== "" ||
							$location_image4_thumbnail_url !== "" ||
							$location_image5_thumbnail_url !== "" ||
							$location_image6_thumbnail_url !== "" ||
							$location_image7_thumbnail_url !== "" ||
							$location_image8_thumbnail_url !== "" ||
							$location_image9_thumbnail_url !== "" ||
							$location_image10_thumbnail_url !== ""
						) {
							echo "<hr>";
							echo '<div class="span-9 wp-citylife-spots-images">';

							// <a href="#img1">
							//   <img src="https://s3.amazonaws.com/gschierBlog/images/pig-small.jpg">
							// </a>

							// <!-- lightbox container hidden with CSS -->
							// <a href="#_" class="lightbox" id="img1">
							//   <img src="https://s3.amazonaws.com/gschierBlog/images/pig-big.jpg">
							// </a>

							if($location_image2_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image2_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image2_thumbnail_url; ?>"/>
								</a>
							<?php }
							if($location_image3_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image3_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image3_thumbnail_url; ?>"/>
								</a>
							<?php }
							if($location_image4_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image4_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image4_thumbnail_url; ?>"/>
								</a>
							<?php }
							if($location_image5_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image5_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image5_thumbnail_url; ?>"/>
								</a>
							<?php }
							if($location_image6_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image6_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image6_thumbnail_url; ?>"/>
								</a>
							<?php }
							if($location_image7_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image7_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image7_thumbnail_url; ?>"/>
								</a>
							<?php }
							if($location_image8_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image8_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image8_thumbnail_url; ?>"/>
								</a>
							<?php }
							if($location_image9_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image9_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image9_thumbnail_url; ?>"/>
								</a>
							<?php }
							if($location_image10_thumbnail_url !== ""){ ?>
								<a class="wp-citylife-spots-has-img" data-lightbox="wp-citylife-spots-merchant-lightbox" href="<?php echo $location_image1_url; ?>">
									<img class="wp-citylife-spots-images-thumbnail" src="<?php echo $location_image10_thumbnail_url; ?>"/>
								</a>
							<?php }
							echo '</div>';
						}
						?>
					</div>
					<hr />
					<div class="row">
						<?php if($location_phone || $location_fax || $location_email || $location_website){ ?>
							<div class="span4">
							<?php
								if($location_phone !== ""){
									echo "T. " . $location_phone . "<br />";
								}
								if($location_fax !== ""){
									echo "F. " . $location_fax . "<br />";
								}
								if($location_email !== ""){
									echo '<a href="mailto:' . $location_email . '">' . $location_email . '</a>' . "<br />";
								}
								if($location_website !== ""){
									echo '<a href="http://' . str_replace("http://", "", $location_website) . '">' . $location_website . '</a>' . "<br /> <br />";
								}
								if($location_facebook_link !== ""){
									echo '<img class="wp-citylife-spots-facebook-icon" src="' . plugins_url( 'images/facebook.png', __FILE__ ) .'"/><a class="wp-citylife-spots-facebook-link" href="http://' . str_replace("http://", "", $location_facebook_link) . '">' . 'Like ons op facebook' . '</a>' . "<br />";
								}
								if($location_twitter_link !== ""){
									echo '<img class="wp-citylife-spots-twitter-icon" src="' . plugins_url( 'images/twitter.png', __FILE__ ) .'"/><a href="http://' . str_replace("http://", "", $location_twitter_link) . '">' . 'Volg ons op twitter' . '</a>' . "<br />";
								}
							?>
							</div>
							<div class="span5">
							<?php
								if($location_address_street !== ""){
									echo $location_address_street . " " . $location_address_number . " " . $location_address_box . "<br />";
								}
								if($location_address_city !== ""){
									echo $location_address_zipcode . " " . $location_address_city . "<br />";
								}
							?>
								<a href="<?php echo $location_address_directions_url; ?>" target="_blank">Routebeschrijving</a>
							</div>
						<?php } else { ?>
							<div class="span9">
							<?php
								if($location_address_street !== ""){
									echo $location_address_street . " " . $location_address_number . " " . $location_address_box . "<br />";
								}
								if($location_address_city !== ""){
									echo $location_address_zipcode . " " . $location_address_city . "<br />";
								}
							?>
								<a href="<?php echo $location_address_directions_url; ?>" target="_blank">Routebeschrijving</a>
							</div>
						<?php } ?>
					</div>
					
					<hr>
					
					<?php if($location_latitude && $location_longitude){ ?>
					<div class="row">
						<div class="span9">
							
							<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmJGavd13SnXGB1vUqx6qNi1nEwkd8vDM"></script>
						    <script type="text/javascript">

						    function initializeLocationMap(){
						    	var myLatlng = new google.maps.LatLng(<?php echo $location_latitude ?>,<?php echo $location_longitude ?>);
								var mapOptions = {
								  zoom: 14,
								  center: myLatlng,
								  scrollwheel: false,
								  zoomControl: true
								}
								var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

								var marker = new google.maps.Marker({
								    position: myLatlng,
								    title: "<?php echo $location_name; ?>",
								    url: "<?php echo $location_address_directions_url ?>"
								});

								google.maps.event.addListener(marker, 'click', function() {
									window.open(
										marker.url,
										'_blank'
									);
								});

								// To add the marker to the map, call setMap();
								marker.setMap(map);
							}

							google.maps.event.addDomListener(window, 'load', initializeLocationMap);

								
						    </script>

							<style>
								/* Fix map controls looking squashed */
								#map-canvas img{
									max-width: none;
								}
							</style>
							<div id="map-canvas" style="height: 300px;"></div>
						</div>
					</div>
					<hr />
					<?php } ?>
					<p>

						<?php
							if($location_openinghours !== ""){
								echo "<strong>Openingsuren:</strong> " . $location_openinghours . "<br />";
							}
							if($location_closingdays !== ""){
								echo "<strong>Sluitingsdagen:</strong> " . $location_closingdays . "<br />";
							}
						?>
					</p>

					<?php if($location_openinghours or $location_closingdays){ ?><hr /><?php } ?>					
				</div>

			</article>

			<a class="btn" href="<?php print $_SERVER['HTTP_REFERER'];?>">&laquo; Terug</a>
	</div>
</div>

<?php wp_reset_query(); ?>
