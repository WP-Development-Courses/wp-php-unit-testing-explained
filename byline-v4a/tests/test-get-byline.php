<?php
class Test_Get_Byline extends WP_UnitTestCase {
	public function test_is_byline_returned() {
		$this->assertSame(
			'Written by Max Mustermann',
			wput_get_byline( 'Max Mustermann' )
		);
	}

	public function test_is_byline_returned_for_user() {
		$author = self::factory()->user->create_and_get( [
			'display_name' => 'John Doe',
		] );

		$this->assertSame(
			'Written by John Doe',
			wput_get_byline_for_user( $author )
		);
	}

	public function test_is_byline_returned_for_post() {
		$post = null;

		$author = self::factory()->user->create_and_get( [
			'display_name' => 'John Doe',
		] );

		$this->assertSame(
			'Written by John Doe',
			wput_get_byline_for_post( $post )
		);
	}
}
