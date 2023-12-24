<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) exit( 'No direct script access allowed' );

/**
 * Communicate with server API (activate, update)
 */

class WOODMART_Api {

	public $token = '';

	public $base_url;

	public $url = '';

	public function __construct() {
		$this->base_url = WOODMART_API_URL;
	}

	public function call( $endpoint, $data = array(), $method = 'get', $base_url = '' ) {
		switch ( $method ) {
			case 'get':
				return wp_remote_get(
					$this->get_url( $endpoint, $data, $base_url ),
					array(
						'headers' => $this->get_headers(),
					)
				);
			case 'post':
				return wp_remote_post(
					$this->get_url( $endpoint, array(), $base_url ),
					array(
						'headers'     => array( 'Content-Type' => 'application/json; charset=utf-8' ),
						'body'        => wp_json_encode( $data ),
						'method'      => 'POST',
						'data_format' => 'body',
					)
				);
		}
	}

	public function get_headers() {
		if( empty( $this->token ) ) return array();
		return array(
			'Authorization' => 'Bearer ' . $this->token
		);
	}

	public function get_url( $endpoint, $args = array(), $base_url = '' ) {
		$this->url = ! empty( $base_url ) ? $base_url : $this->base_url;

		$this->url .= $endpoint;

		if( ! empty( $args ) ) {
			foreach ($args as $key => $value) {
				$this->add_url_param($key, $value);
			}
		}

		return $this->url;
	}

	public function add_url_param( $key, $value ) {
		$this->url = add_query_arg( $key, $value, $this->url );

	}
}
