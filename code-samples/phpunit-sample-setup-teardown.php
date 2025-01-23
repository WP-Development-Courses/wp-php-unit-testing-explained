<?php
class ExampleTest extends PHPUnit\Framework\TestCase {
	private $example;

	public function testSomething() {
		$this->assertSame(
			'the-result',
			$this->example->doSomething()
		);
	}

	protected function setUp() {
		$this->example = new Example();
	}

	protected function tearDown() {
		$this->example = null;
	}
}
