<?php
class Person {
	protected static $name;

	public static function set_name( $name ) {
		self::$name = $name;
	}

	public static function get_name() {
		return self::name;
	}
}

Person::set_name( 'John Smith' );
Person::set_name( 'Jane Foster' );

Person::get_name(); // Jane Foster
