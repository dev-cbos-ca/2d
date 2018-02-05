<?php
/*
Plugin Name:    2D Community
Plugin URI:     http://wp.cbos.ca/plugins/2d-community/
Description:    2D Community Design.
Version:        2018.02.03
Author:         wp.cbos.ca
Author URI:     http://wp.cbos.ca
License:        GPLv2+
*/ 

defined( 'ABSPATH' ) || exit;

add_shortcode( 'two-dee-community', 'get_2d_community' );


function get_2d_community(){
	require_once( __DIR__ . '/data/role/role-1.php' );
	require_once( __DIR__ . '/template.php' );

	$html = '';
	$file = __DIR__ . '/script/css/design.css';
	
	if ( file_exists( $file ) ){
		$css = '<style>';
		$css .= file_get_contents( $file );
		$css .= '</style>' . PHP_EOL;
		echo $css;
	}
	
	$groups = get_2d_role_group_data();
	$community = '' . PHP_EOL;
	$community .= '<div id="community" class="community">' . PHP_EOL;
	$community .= '<div class="inner">' . PHP_EOL;
	$community .= get_2d_role_logic( $groups );
	$community .= '<div class="text community-text">Commons</div>' . PHP_EOL;
	$community .= '</div><!-- .inner -->' . PHP_EOL;
	$community .= '</div><!-- #community -->' . PHP_EOL;
	return $community;
}

function get_2d_role_logic( $items ){
	$html = '';
	$roles = get_tier_1_role_data();
	foreach ( $items as $item ){
		$html .= sprintf( '<section title="%s" class="group group-%s" style="background-color: %s">%s', $item['name'], $item['order'],$item['color']['hex'], PHP_EOL);
		$html .= '<div class="inner">';
		$html .= sprintf( '<div class="text group-text">%s</div>%s', $item['code'], PHP_EOL );
		foreach ( $roles as $role ){
			$k = $k+1; //convert to 1 based from 0 based.
			if ( $item['code'] == $role['group'] ){
				$html .= get_2d_layout_html( $role );
			}
		}
	$html .= '</div>' . PHP_EOL;
	$html .= '</section>' . PHP_EOL;
	
	}
	return $html;
}
