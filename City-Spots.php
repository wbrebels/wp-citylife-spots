<?php
/*
Plugin Name: CitySpots
Plugin URI: https://citylife.be/
Description: We can handle it all! Also Locations
Version: 1.0.2
Author: Werner Brebels
License: GPLv2
*/

add_action( 'init', 'create_location' );
function create_location() {
	register_post_type( 'location',
		array(
			'labels' =>  array(
				'name' 					=> 'Locations',
				'singular_name' 		=> 'Location',
				'add_new' 				=> 'Add new',
				'add_new_item' 			=> 'Add new location',
				'edit_item' 			=> 'Edit location',
				'new_item' 				=> 'New location',
				'all_items' 			=> 'All locations',
				'view_item' 			=> 'View location',
				'search_items' 			=> 'Search locations',
				'not_found' 			=> 'No locations found',
				'not_found_in_trash'	=> 'No locations found in trash',
				'parent_item_colon' 	=> '',
				'menu_name' 			=> 'Locations',
			),
			'public' 				=> true,
			'menu_position' 		=> 5,
			'supports'				=> array( 'title', 'editor', 'thumbnail' ),
			'taxonomies' 			=> array('category'),
			'menu_icon' 			=> plugins_url( 'images/image.png', __FILE__ ),
			'has_archive' 			=> true
		)
	);
}


add_action( 'admin_init', 'location_admin' );
function location_admin() {
    add_meta_box( 'location_key_box', 'Keys', 'location_key_box', 'location', 'normal', 'high' );
	add_meta_box( 'location_address_meta_box', 'Address', 'location_address_meta_box', 'location', 'normal', 'high' );
	add_meta_box( 'location_contact_meta_box', 'Contact information', 'location_contact_meta_box', 'location', 'normal', 'high' );
	add_meta_box( 'location_openinghours_meta_box', 'Openinghours', 'location_openinghours_meta_box', 'location', 'normal', 'high' );
	add_meta_box( 'location_information_meta_box', 'Information', 'location_information_meta_box', 'location', 'normal', 'high' );
    add_meta_box( 'location_image_meta_box', 'Images', 'location_image_meta_box', 'location', 'normal', 'high' );
    add_meta_box( 'location_herfstshopping_meta_box', 'Herfstshopping', 'location_herfstshopping_meta_box', 'location', 'normal', 'high' );
}

function location_key_box( $location ) {
	
	$location_pkey 	= esc_attr( get_post_meta($location->ID, 'location_pkey', true) );
    $location_slug 	= esc_attr( get_post_meta($location->ID, 'location_slug', true) );

	?>	
		<table width="100%">
			<tr>
				<td width="25%">Primary key</td>
				<td width="75%"><input type="text" size="50" name="location_pkey" value="<?php echo $location_pkey; ?>" /></td>
			</tr>
			<tr>
				<td>Slug</td>
				<td><input type="text" size="50" name="location_slug" value="<?php echo $location_slug; ?>" /></td>
			</tr>						
		</table>
	<?php 
}

function location_address_meta_box( $location ) {
	
	$location_street 	= esc_attr( get_post_meta($location->ID, 'location_street', true) );
	$location_number 	= esc_attr( get_post_meta($location->ID, 'location_number', true) );
	$location_box 		= esc_attr( get_post_meta($location->ID, 'location_box', true) );
	$location_zipcode 	= esc_attr( get_post_meta($location->ID, 'location_zipcode', true) );
	$location_city 		= esc_attr( get_post_meta($location->ID, 'location_city', true) );

	?>
		<table width="100%">
			<tr>
				<td width="25%">Stree / Number / Box</td>
				<td width="75%">
					<input placeholder="Street" type="text" size="30" name="location_street" value="<?php echo $location_street; ?>" />
					<input placeholder="number" type="text" size="5" name="location_number" value="<?php echo $location_number; ?>" />
					<input placeholder="Box" type="text" size="5" name="location_box" value="<?php echo $location_box; ?>" />
				</td>
			</tr>
			<tr>
				<td>Zip / City</td>
				<td>
					<input placeholder="Zip" type="text" size="20" name="location_zipcode" value="<?php echo $location_zipcode; ?>" />
					<input placeholder="City" type="text" size="25" name="location_city" value="<?php echo $location_city; ?>" />
				</td>
			</tr>	
		</table>
	<?php
}

function location_contact_meta_box( $location ) {
	
	$location_phone 	    = esc_attr( get_post_meta($location->ID, 'location_phone', true) );
	$location_fax 		    = esc_attr( get_post_meta($location->ID, 'location_fax', true) );
	$location_email 	    = esc_attr( get_post_meta($location->ID, 'location_email', true) );
	$location_website 	    = esc_attr( get_post_meta($location->ID, 'location_website', true) );
    $location_facebook_link = esc_attr( get_post_meta($location->ID, 'location_facebook_link', true) );
    $location_twitter_link 	= esc_attr( get_post_meta($location->ID, 'location_twitter_link', true) );

	?>
		<table width="100%">
			<tr>
				<td width="25%">Phone</td>
				<td width="75%"><input type="text" size="50" name="location_phone" value="<?php echo $location_phone; ?>" /></td>
			</tr>
			<tr>
				<td>Fax</td>
				<td><input type="text" size="50" name="location_fax" value="<?php echo $location_fax; ?>" /></td>
			</tr>			
			<tr>
				<td>Email</td>
				<td><input type="text" size="50" name="location_email" value="<?php echo $location_email; ?>" /></td>
			</tr>
			<tr>
				<td>Website</td>
				<td><input type="text" size="100" name="location_website" value="<?php echo $location_website; ?>" /></td>
			</tr>
            <tr>
				<td>Facebook link</td>
				<td><input type="text" size="100" name="location_facebook_link" value="<?php echo $location_facebook_link; ?>" /></td>
			</tr>
            <tr>
				<td>Twitter link</td>
				<td><input type="text" size="100" name="location_twitter_link" value="<?php echo $location_twitter_link; ?>" /></td>
			</tr>
		</table>
	<?php
}

function location_openinghours_meta_box( $location ) {
	
	$location_openinghours 		= esc_attr( get_post_meta($location->ID, 'location_openinghours', true) );
	$location_closingdays 		= esc_attr( get_post_meta($location->ID, 'location_closingdays', true) );
    $location_extra_info 		= esc_attr( get_post_meta($location->ID, 'location_extra_info', true) );

	?>
		<table width="100%">
			<tr>
				<td width="25%">Openinghours</td>
				<td width="75%"><textarea cols="50" rows='3' name="location_openinghours"><?php echo $location_openinghours; ?></textarea></td>
			</tr>
			<tr>
				<td>Closing days</td>
				<td><input type="text" size="50" name="location_closingdays" value="<?php echo $location_closingdays; ?>" /></td>
			</tr>
            <tr>
				<td>Extra info</td>
				<td>
                    <textarea cols="50" rows='5' name="location_extra_info"><?php echo $location_extra_info; ?></textarea></td>
                </td>
			</tr>
		</table>
	<?php
}



function location_information_meta_box( $location ) {
	
	$location_longitude 	= esc_attr( get_post_meta($location->ID, 'location_longitude', true) );
	$location_latitude    	= esc_attr( get_post_meta($location->ID, 'location_latitude', true) ); 

	?>	
		<table width="100%">
			<tr>
				<td width="25%">Longitude</td>
				<td width="75%"><input type="text" size="50" name="location_longitude" value="<?php echo $location_longitude; ?>" /></td>
			</tr>
			<tr>
				<td>Latitude</td>
				<td><input type="text" size="50" name="location_latitude" value="<?php echo $location_latitude; ?>" /></td>
			</tr>						
		</table>
	<?php 
}

function location_image_meta_box( $location ) {
	
	$location_image1_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image1_thumbnail_url', true) );
	$location_image1_url    	    = esc_attr( get_post_meta($location->ID, 'location_image1_url', true) ); 
    $location_image2_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image2_thumbnail_url', true) );
	$location_image2_url    	    = esc_attr( get_post_meta($location->ID, 'location_image2_url', true) );
    $location_image3_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image3_thumbnail_url', true) );
	$location_image3_url    	    = esc_attr( get_post_meta($location->ID, 'location_image3_url', true) );
    $location_image4_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image4_thumbnail_url', true) );
	$location_image4_url    	    = esc_attr( get_post_meta($location->ID, 'location_image4_url', true) );    
    $location_image5_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image5_thumbnail_url', true) );
	$location_image5_url    	    = esc_attr( get_post_meta($location->ID, 'location_image5_url', true) );
    $location_image6_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image6_thumbnail_url', true) );
	$location_image6_url    	    = esc_attr( get_post_meta($location->ID, 'location_image6_url', true) );
    $location_image7_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image7_thumbnail_url', true) );
	$location_image7_url    	    = esc_attr( get_post_meta($location->ID, 'location_image7_url', true) );
    $location_image8_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image8_thumbnail_url', true) );
	$location_image8_url    	    = esc_attr( get_post_meta($location->ID, 'location_image8_url', true) );
    $location_image9_thumbnail_url 	= esc_attr( get_post_meta($location->ID, 'location_image9_thumbnail_url', true) );
	$location_image9_url    	    = esc_attr( get_post_meta($location->ID, 'location_image9_url', true) );
    $location_image10_thumbnail_url = esc_attr( get_post_meta($location->ID, 'location_image10_thumbnail_url', true) );
	$location_image10_url    	    = esc_attr( get_post_meta($location->ID, 'location_image10_url', true) );

	?>	
		<table width="100%">
            <thead>
                <tr>
                   <th>Image</th>
                   <th>Thumbnail URL</th>                   
                   <th>Image URL</th> 
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="12%">Image 1 (Cover)</td>
                    <td width="44%"><input type="text" size="50" name="location_image1_thumbnail_url" value="<?php echo $location_image1_thumbnail_url; ?>" /></td>
                    <td width="44%"><input type="text" size="50" name="location_image1_url" value="<?php echo $location_image1_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 2</td>
                    <td><input type="text" size="50" name="location_image2_thumbnail_url" value="<?php echo $location_image2_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image2_url" value="<?php echo $location_image2_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 3</td>
                    <td><input type="text" size="50" name="location_image3_thumbnail_url" value="<?php echo $location_image3_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image3_url" value="<?php echo $location_image3_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 4</td>
                    <td><input type="text" size="50" name="location_image4_thumbnail_url" value="<?php echo $location_image4_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image4_url" value="<?php echo $location_image4_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 5</td>
                    <td><input type="text" size="50" name="location_image5_thumbnail_url" value="<?php echo $location_image5_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image5_url" value="<?php echo $location_image5_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 6</td>
                    <td><input type="text" size="50" name="location_image6_thumbnail_url" value="<?php echo $location_image6_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image6_url" value="<?php echo $location_image6_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 7</td>
                    <td><input type="text" size="50" name="location_image7_thumbnail_url" value="<?php echo $location_image7_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image7_url" value="<?php echo $location_image7_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 8</td>
                    <td><input type="text" size="50" name="location_image8_thumbnail_url" value="<?php echo $location_image8_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image8_url" value="<?php echo $location_image8_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 9</td>
                    <td><input type="text" size="50" name="location_image9_thumbnail_url" value="<?php echo $location_image9_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image9_url" value="<?php echo $location_image9_url; ?>" /></td>
                </tr>
                <tr>
                    <td>Image 10</td>
                    <td><input type="text" size="50" name="location_image10_thumbnail_url" value="<?php echo $location_image10_thumbnail_url; ?>" /></td>
                    <td><input type="text" size="50" name="location_image10_url" value="<?php echo $location_image10_url; ?>" /></td>
                </tr>
            </tbody>
		</table>
	<?php 
}


function location_herfstshopping_meta_box( $location ) {
	
	$location_hs_start_date 	= esc_attr( get_post_meta($location->ID, 'location_hs_start_date', true) );
	$location_hs_end_date    	= esc_attr( get_post_meta($location->ID, 'location_hs_end_date', true) ); 
    $location_hs_description    = esc_attr( get_post_meta($location->ID, 'location_hs_description', true) ); 

	?>	
		<table width="100%">
			<tr>
				<td width="25%">Start date</td>
				<td width="75%"><input type="text" size="50" name="location_hs_start_date" value="<?php echo $location_hs_start_date; ?>" /></td>
			</tr>
			<tr>
				<td>End date</td>
				<td><input type="text" size="50" name="location_hs_end_date" value="<?php echo $location_hs_end_date; ?>" /></td>
			</tr>
            <tr>
				<td>Description</td>
				<td><textarea cols="50" rows='5' name="location_hs_description"><?php echo $location_hs_description; ?></textarea></td></td>
			</tr>            
		</table>
	<?php 
}


add_action( 'save_post', 'add_location_detail_fields', 10, 2 );
function add_location_detail_fields( $location_id, $location ) {
	
	if ( $location->post_type == 'location' ) {
		
		// KEYS
		update_post_meta( $location_id, 'location_pkey', $_POST['location_pkey'] );
		update_post_meta( $location_id, 'location_slug', $_POST['location_slug'] );
        
        // ADRESS
		update_post_meta( $location_id, 'location_street', $_POST['location_street'] );
		update_post_meta( $location_id, 'location_number', $_POST['location_number'] );
		update_post_meta( $location_id, 'location_box', $_POST['location_box'] );
		update_post_meta( $location_id, 'location_zipcode', $_POST['location_zipcode'] );
		update_post_meta( $location_id, 'location_city', $_POST['location_city'] );

		// CONTACT
		update_post_meta( $location_id, 'location_phone', $_POST['location_phone'] );
		update_post_meta( $location_id, 'location_fax', $_POST['location_fax'] );
		update_post_meta( $location_id, 'location_email', $_POST['location_email'] );
		update_post_meta( $location_id, 'location_website', $_POST['location_website'] );
        update_post_meta( $location_id, 'location_facebook_link', $_POST['location_facebook_link'] );
        update_post_meta( $location_id, 'location_twitter_link', $_POST['location_twitter_link'] );

		// OPENINGHOURS
		update_post_meta( $location_id, 'location_openinghours', $_POST['location_openinghours'] );
		update_post_meta( $location_id, 'location_closingdays', $_POST['location_closingdays'] );
        update_post_meta( $location_id, 'location_extra_info', $_POST['location_extra_info'] );
		
		// INFORMATION
		update_post_meta( $location_id, 'location_longitude', $_POST['location_longitude'] );
		update_post_meta( $location_id, 'location_latitude', $_POST['location_latitude'] );
        
        // IMAGES
		update_post_meta( $location_id, 'location_image1_thumbnail_url', $_POST['location_image1_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image1_url', $_POST['location_image1_url'] );
        update_post_meta( $location_id, 'location_image2_thumbnail_url', $_POST['location_image2_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image2_url', $_POST['location_image2_url'] );
        update_post_meta( $location_id, 'location_image3_thumbnail_url', $_POST['location_image3_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image3_url', $_POST['location_image3_url'] );
        update_post_meta( $location_id, 'location_image4_thumbnail_url', $_POST['location_image4_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image4_url', $_POST['location_image4_url'] );
        update_post_meta( $location_id, 'location_image5_thumbnail_url', $_POST['location_image5_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image5_url', $_POST['location_image5_url'] );
        update_post_meta( $location_id, 'location_image6_thumbnail_url', $_POST['location_image6_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image6_url', $_POST['location_image6_url'] );
        update_post_meta( $location_id, 'location_image7_thumbnail_url', $_POST['location_image7_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image7_url', $_POST['location_image7_url'] );
        update_post_meta( $location_id, 'location_image8_thumbnail_url', $_POST['location_image8_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image8_url', $_POST['location_image8_url'] );
        update_post_meta( $location_id, 'location_image9_thumbnail_url', $_POST['location_image9_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image9_url', $_POST['location_image9_url'] );
        update_post_meta( $location_id, 'location_image10_thumbnail_url', $_POST['location_image10_thumbnail_url'] );
		update_post_meta( $location_id, 'location_image10_url', $_POST['location_image10_url'] );
        
        // HERFSTSHOPPING
		update_post_meta( $location_id, 'location_hs_start_date', $_POST['location_hs_start_date'] );
		update_post_meta( $location_id, 'location_hs_end_date', $_POST['location_hs_end_date'] );
        update_post_meta( $location_id, 'location_hs_description', $_POST['location_hs_description'] );
	}
}


add_filter( 'template_include', 'include_location_template_function', 1 );
function include_location_template_function( $template_path ) {

	if ( get_post_type() == 'location' ) {
		if ( is_single() ) {
			if ( $theme_file = locate_template( array( 'single-location.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path( __FILE__ ) . '/single-location.php';
			}
		}else{
			if ( $theme_file = locate_template( array( 'list-location.php' ) ) ) {
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path( __FILE__ ) . '/list-location.php';
			}
		}
	}
	return $template_path;
}
