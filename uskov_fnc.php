<?php
/**
 * uskov
 * register post_type movie
 **/
add_action( 'init', 'admin_movie' );
function admin_movie() {
	$labels = array(
		'name'               => _x( 'Movie', 'Movie', 't4.uds.kiev.ua' ),
		'singular_name'      => _x( 'Movie', 'Movie', 't4.uds.kiev.ua' ),
		'menu_name'          => _x( 'Movies', 'Movies', 't4.uds.kiev.ua' ),
		'name_admin_bar'     => _x( 'Movie', 'Movie', 't4.uds.kiev.ua' ),
		'add_new'            => _x( 'Add New', 'Movie', 't4.uds.kiev.ua' ),
		'add_new_item'       => __( 'Add New Movie', 't4.uds.kiev.ua' ),
		'new_item'           => __( 'New Movie', 't4.uds.kiev.ua' ),
		'edit_item'          => __( 'Edit Movie', 't4.uds.kiev.ua' ),
		'view_item'          => __( 'View Movie', 't4.uds.kiev.ua' ),
		'all_items'          => __( 'All Movies', 't4.uds.kiev.ua' ),
		'parent_item_colon'  => __( 'Parent Movie:', 't4.uds.kiev.ua' ),
		'not_found'          => __( 'No Movies found.', 't4.uds.kiev.ua' ),
		'not_found_in_trash' => __( 'No Movies found in Trash.', 't4.uds.kiev.ua' )
	);
	$args = array(
		'description'       => __( 'Movie', 't4.uds.kiev.ua' ),
		'labels'       => $labels,
		'supports'       => array( 'title', 'excerpt', 'editor', 'thumbnail'),
		'hierarchical'        => false,
		'public'        => true,
		'publicly_queryable'   => true,
		'query_var'        => true,
		'rewrite'        => array( 'slug' => 'movie' ),
		'show_ui'        => true,
		'menu_icon'        => 'dashicons-format-video',
		'show_in_menu'        => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'can_export'  => true,
		'has_archive'  => true,
		'exclude_from_search' => false,

	);
	register_post_type( 'product', $args );
}

/**
 * uskov
 * remove cart
 **/
add_filter('add_to_cart_redirect', 'uskov_add_to_cart_redirect');
function uskov_add_to_cart_redirect() {
	global $woocommerce;
	$checkout_url = $woocommerce->cart->get_checkout_url();
	return $checkout_url;
}


/**
 * uskov
 * add skype to register form
 **/
add_action( 'register_form', 'add_skype' );
function add_skype() {

	$skype = ( ! empty( $_POST['skype'] ) ) ? trim( $_POST['skype'] ) : '';

?>
        <p>
            <label for="skype"><?php _e( 'skype', 't4.uds.kiev.ua' ) ?><br />
                <input type="text" name="skype" id="skype" class="input" value="<?php echo esc_attr( wp_unslash( $skype ) ); ?>" size="25" /></label>
        </p>
        <?php
}


add_filter( 'registration_errors', 'skype_registration_errors', 10, 3 );
function skype_registration_errors( $errors, $sanitized_user_login, $user_email ) {

	if ( empty( $_POST['skype'] ) || ! empty( $_POST['skype'] ) && trim( $_POST['skype'] ) == '' ) {
		$errors->add( 'skype_error', __( '<strong>ERROR</strong>: You must include a skype.', 't4.uds.kiev.ua' ) );
	}

	return $errors;
}

add_action( 'user_register', 'skype_user_register' );
function skype_user_register( $user_id ) {
	if ( ! empty( $_POST['skype'] ) ) {
		update_user_meta( $user_id, 'skype', trim( $_POST['skype'] ) );
	}
}

/**
 * uskov
 * login redirect to wishlist
 **/
function login_redirect( $redirect_to, $request, $user ){
	return home_url('/wishlist/');
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );    