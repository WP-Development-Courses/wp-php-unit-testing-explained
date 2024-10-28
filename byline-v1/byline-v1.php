<?php
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
	return 'Written by ' . $author_name;
}
