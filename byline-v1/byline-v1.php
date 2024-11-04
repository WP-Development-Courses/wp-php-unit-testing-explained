<?php
declare( strict_types=1 );
/*
* Plugin Name: Byline - V1
*/

/**
 * Output the post byline.
 *
 * @param string $author_name Name of the post author.
 *
 * @return string Post byline.
 */
function wput_get_byline( $author_name ) {
	if ( ! is_string( $author_name ) ) {
		return '';
	}

	return 'Written by ' . $author_name;
}
