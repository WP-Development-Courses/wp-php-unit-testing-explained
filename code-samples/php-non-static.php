<?php
class Person {
	protected $name;

	public function set_name( $name ) {
		$this->name = $name;
	}

	public function get_name() {
		return $this->name;
	}
}

$person1 = new Person();
$person1->set_name( 'John Smith' );
$person2 = new Person();
$person2->set_name( 'Jane Foster ');

$person1->get_name(); // John Smith
$person2->get_name(); // Jane Foster
