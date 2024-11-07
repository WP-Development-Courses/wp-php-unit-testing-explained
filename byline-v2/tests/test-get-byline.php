<?php
class Test_Get_Byline extends WP_UnitTestCase {
	public function test_is_byline_returned() {
		$this->assertSame(
			'Written by Max Mustermann',
			wput_get_byline( 'Max Mustermann' )
		);
	}
}
