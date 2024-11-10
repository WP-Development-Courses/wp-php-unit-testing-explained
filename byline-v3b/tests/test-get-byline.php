<?php
class Test_Get_Byline extends WP_UnitTestCase {
	public function test_is_byline_returned() {
		$this->assertSame(
			'Written by Max Mustermann',
			wput_get_byline( 'Max Mustermann' )
		);
	}

	public function test_is_byline_returned_for_user() {
		$author_id = wp_insert_user( [
			'display_name' => 'John Doe',
			'user_pass' => 'password',
			'user_login' => 'johndoe',
		] );

		$author = get_user_by( 'ID', $author_id );

		$this->assertSame(
			'Written by John Doe',
			wput_get_byline_for_user( $author )
		);
	}
}
