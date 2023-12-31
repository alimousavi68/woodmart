<?php if ( ! defined( 'WOODMART_THEME_DIR' ) ) exit( 'No direct script access allowed' );
/**
* ------------------------------------------------------------------------------------------------
* WoodMart slider element map
* ------------------------------------------------------------------------------------------------
*/

if ( ! function_exists( 'woodmart_get_vc_map_slider' ) ) {
	function woodmart_get_vc_map_slider() {
		return array(
			'name' => esc_html__( 'Slider', 'woodmart' ),
			'base' => 'woodmart_slider',
			'category' => woodmart_get_tab_title_category_for_wpb( esc_html__( 'Theme elements', 'woodmart' ) ),
			'description' => esc_html__( 'WoodMart theme slider', 'woodmart' ),
			'icon' => WOODMART_ASSETS . '/images/vc-icon/slider.svg',
			'params' => array(
				array(
					'type' => 'woodmart_dropdown',
					'heading' => esc_html__( 'Slider', 'woodmart' ),
					'param_name' => 'slider',
					'callback' => 'woodmart_get_sliders_for_vc'
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'woodmart' ),
					'param_name' => 'el_class',
					'hint' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'woodmart' )
				),
			),
		);
	}
}

if( ! function_exists( 'woodmart_get_sliders_for_vc' ) ) {
	function woodmart_get_sliders_for_vc() {
		$args = array(
			'taxonomy'   => 'woodmart_slider',
			'hide_empty' => false,
		);
		$sliders = get_terms( $args );

		if ( is_wp_error( $sliders ) || empty( $sliders ) ) {
			return array();
		}

		$data = array();

		foreach ( $sliders as $slider ) {
			$data[ $slider->name ] = $slider->slug;
		}

		return $data;
	}
}
