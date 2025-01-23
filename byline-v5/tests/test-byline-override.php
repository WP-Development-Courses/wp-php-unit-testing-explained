<?php
class Test_Byline_Override extends WP_UnitTestCase {
	public static $post_id;

	public static function wpSetUpBeforeClass() {
		self::$post_id = self::factory()->post->create();
	}

	public static function wpTearDownAfterClass() {
		wp_delete_post( self::$post_id, true );
	}

	public function test_byline_override_is_saved() {
		$return = wput_save_byline_override_meta_data( self::$post_id );

		// A new field is added, so `update_post_meta()` returns an id.
		$this->assertTrue( is_numeric( $return ) );

		$this->assertSame(
			'A custom byline',
			get_post_meta( self::$post_id, 'wput_byline_override', true )
		);
	}
}
