<?php



add_shortcode( 'slider-shegeft', 'Devwp_Shegeft_Slider' );

function Devwp_Shegeft_Slider()
{
	if ( is_admin() ) return;
	
	  include 'html-amazing.php';
	
	
}





