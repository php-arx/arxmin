<?php

/**
 * Class Arxmin ApiTest
 *
 * @author Daniel Sum <daniel@cherrypulp.com>
 */
class ApiTest extends TestCase {

	/**
	 * Get Labels
	 */
	public function test_if_can_get_labels() {

		$response = $this->call( 'GET', 'arxmin/api/v1/labels' );

		$this->assertNotNull( $response, 'No labels' );

	}

	/**
	 * Test Auth
	 */
	public function test_if_auth_is_ok() {

		$auth = Arxmin::attempt(array(
			'email' => 'admin@arx.io',
			'password' => '123456',
		));

		dc( $auth );

		$auth = Arxmin::isAuth();
	}

}
