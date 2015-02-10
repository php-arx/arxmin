<?php
/**
 * UserTest.php.
 *
 * @project : arxmin
 * @author : danielsum
 */

class UserTest extends PHPUnit_Framework_TestCase {


    public function testLogin(){

	    $credentials = array(
		    'email' => 'arxmin@arx.io',
		    'password' => "test"
	    );

	    $user = new \Arxmin\User($credentials);

	    $user->save();

	    $this->assertNotNull( $user, 'Cannot create an user' );


    }

}
