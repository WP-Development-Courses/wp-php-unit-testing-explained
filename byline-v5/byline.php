<?php
declare( strict_types=1 );

/**
 * Plugin Name: Byline
 */

/**
 * Output the post byline.
 *
 * @param string $author_name Name of the post author.
 *
 * @return string Post byline.
 */
function wput_get_byline( string $author_name ) {
	return 'Written by ' . $author_name;
}

/**
 * Output the post byline for a user.
 *
 * @param WP_User $author User object of the post author.
 *
 * @return string Post byline.
 */
function wput_get_byline_for_user( WP_User $author ) {
	return wput_get_byline( $author->display_name );
}

/**
 * Output the byline for a post.
 *
 * @param WP_Post $post Post to output the byline for.
 *
 * @return string|WP_Error Post byline on success, else WP_Error.
 */
function wput_get_byline_for_post( WP_Post $post ) {
	$author = get_user_by( 'ID', $post->post_author );

	if ( ! $author instanceof WP_User ) {
		return new WP_Error(
			'invalid_author',
			'Invalid author ID ' . $post->post_author . ' for post ' . $post->ID
		);
	}

	return wput_get_byline_for_user( $author );
}

function wput_add_byline_override_meta_box() {
	add_meta_box(
		'byline',
		'Byline',
		'wput_output_byline_override_meta_box',
		'post'
	);
}
add_action( 'add_meta_boxes_post', 'wput_add_byline_override_meta_box' );

function wput_output_byline_override_meta_box( $post ) {
	wp_nonce_field( 'wput_byline_override', 'wput_byline_override_nonce' );
	?>
	<label for="wput-byline-override">Custom byline:</label>
	<input
		type="text"
		name="wput_byline_override"
		value="<?php echo esc_attr( get_post_meta( $post->ID, 'wput_byline_override', true ) ); ?>"
		id="wput-byline-override"
	/>
	<?php
}

function wput_save_byline_override_meta_data( $post_id ) {
	if ( ! isset( $_POST['wput_byline_override_nonce'] ) ) {
		return false;
	}

	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['wput_byline_override_nonce'] ) ), 'wput_byline_override' ) ) {
		return false;
	}

	if ( ! isset( $_POST['wput_byline_override'] ) ) {
		return false;
	}

	return update_post_meta(
		$post_id,
		'wput_byline_override',
		sanitize_text_field( wp_unslash( $_POST['wput_byline_override'] ) )
	);
}
add_action( 'save_post_post', 'wput_save_byline_override_meta_data' );
