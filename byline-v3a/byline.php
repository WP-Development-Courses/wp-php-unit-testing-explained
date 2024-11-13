<?php
declare( strict_types=1 );
/*
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
