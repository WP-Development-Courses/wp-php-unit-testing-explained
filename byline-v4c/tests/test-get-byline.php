<?php
class Test_Get_Byline extends WP_UnitTestCase {
	public static $author;

	public static function wpSetUpBeforeClass() {
		self::$author = self::factory()->user->create_and_get( [
			'display_name' => 'John Doe',
		] );
	}

	public static function wpTearDownAfterClass() {
		wp_delete_user( self::$author->ID );
	}

	public function test_is_byline_returned() {
		$this->assertSame(
			'Written by Max Mustermann',
			wput_get_byline( 'Max Mustermann' )
		);
	}

	public function test_is_byline_returned_for_user() {
		$this->assertSame(
			'Written by John Doe',
			wput_get_byline_for_user( self::$author )
		);
	}

	public function test_is_byline_returned_for_post() {
		$post = self::factory()->post->create_and_get( [
			'post_author' => self::$author->ID,
		] );

		$this->assertSame(
			'Written by John Doe',
			wput_get_byline_for_post( $post )
		);
	}
}
