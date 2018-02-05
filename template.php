<?php 

defined( 'ABSPATH' ) || exit;

function get_2d_layout_html( $item ) {
	
	if ( ! empty( $item ) ){
		$str = '';
		//foreach ( $items as $k => $item ) {
		if ( $item['cast'] ){
			$str .= '<div '; 
			$str .= sprintf( 'class="wrap role role-%s" style="background-color: %s">', $item['order'], $item['color']['hex'] );
			$str .= '<div class="inner">' . PHP_EOL;
			$str .= sprintf( '<div title="%s"><div class="inner">%s</div></div>', $item['name'],  $item['name'] );
			$str .= '</div></div>';
			}
	//}
	return $str;
	} else {
		return false;
	}
}
