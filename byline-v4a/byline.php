<?php
declare( strict_types=1 );

/*
* Plugin Name: Byline - v4
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
