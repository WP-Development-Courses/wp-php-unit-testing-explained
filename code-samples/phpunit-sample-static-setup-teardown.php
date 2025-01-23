<?php
class DatabaseTest extends PHPUnit\Framework\TestCase {
	private static $dbh;

	public static function setUpBeforeClass() {
		self::$dbh = new PDO( 'sqlite::memory:' );
	}

	public static function tearDownAfterClass() {
		self::$dbh = null;
	}
}
