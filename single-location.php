<?php
/*
Template Name: Location Template
*/
?>
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

			$location_address_street = esc_attr(get_post_meta(get_the_ID(), 'location_street', true ));
			$location_address_number = esc_attr(get_post_meta(get_the_ID(), 'location_number', true ));
			$location_address_box = esc_attr(get_post_meta(get_the_ID(), 'location_box', true ));
			$location_address_city = esc_attr( get_post_meta( get_the_ID(), 'location_city', true ));
			$location_address_zipcode = "B-" . esc_attr(get_post_meta( get_the_ID(), 'location_zipcode', true ));

			$location_latitude = get_post_meta(get_the_ID(), 'location_latitude', true);
			$location_longitude = get_post_meta(get_the_ID(), 'location_longitude', true);

			$location_openinghours = esc_attr(get_post_meta(get_the_ID(), 'location_openinghours', true));
			$location_closingdays = esc_attr(get_post_meta(get_the_ID(), 'location_closingdays', true));
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php echo $location_name; ?></h1>
					<div class="clearfix">
						<div><?php the_post_thumbnail("medium", array('class' => 'location-thumbnail pull-right')) ?></div>	
						<?php echo $location_description; ?>
					</div>
				</header>
				<div class="entry-content">
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
									echo '<a href="http://' . str_replace("http://", "", $location_website) . '">' . $location_website . '</a>' . "<br />";
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
								    url: "http://maps.google.com/maps?&z=10&q=<?php echo $location_latitude; ?>+<?php echo $location_longitude; ?>&ll=<?php echo $location_latitude; ?>+<?php echo $location_longitude; ?>"
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

							<div id="map-canvas" style="height: 300px; img: width: auto;"></div>
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
