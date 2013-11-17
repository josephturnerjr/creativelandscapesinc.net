<?php
	/**
	 * This program is free software; you can redistribute it and/or modify
    * it under the terms of the GNU General Public License as published by
    * the Free Software Foundation; either version 2 of the License, or
    * (at your option) any later version.
    * 
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU General Public License for more details.
	 * 
    * You should have received a copy of the GNU General Public License
    * along with this program; if not, write to the Free Software
    * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	 *
	 * 
	 * @Package Simple Captcha Script
	 * @Author  Hamid Alipour, http://www.hamidof.com/
	**/
	
	/**
	 * Start a session
	**/
	session_start();
	
	/**
	 * Send PNG headers to the browser
	**/
	header('content-type: image/png');
	
	$numbers 	= array();
	$numbers[]	= rand(1, 9);
	$numbers[]  = rand(1, 9);
	
	if(rand(0, 1) == 0) {
		$_op 						= '+'; 
		$code						= strval($numbers[0]) .' + ' .strval($numbers[1]) .' =';
		$_SESSION['CAPTCHA'] = $numbers[0] + $numbers[1];
	} else {
		$_op 						= '*';	
		$code						= strval($numbers[0]) .' x ' .strval($numbers[1]) .' =';
		$_SESSION['CAPTCHA'] = $numbers[0] * $numbers[1];
	}
	session_write_close();
	
	/* Our TTF font file, you may use others */
	$font = dirname(__FILE__) .'/fonts/arial.ttf';
	
	/* set the width */
	$width  = 16;
	//$width  = (strlen($code) * $width) + 2;	
	$height = 24;
	
	$code_length = 7;
	
	$image_height = $height + 2;
	$image_width  = $width * $code_length + 20;
	
	$im 	  = imagecreatetruecolor($image_width, $image_height);
	$white  = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0, 0, $white);
	
	/* Some themes */
	$theme   = array();
	$theme[]	= array('CHAR_COLOR' => 
							array('R' => array(150, 201),
									'G' => array(250, 252),
									'B' => array(0, 126) 
									),
						   'BG_COLOR' =>
							array('R' => array(150, 230),
									'G' => array(150, 230),
									'B' => array(150, 230) 
									)
						 );
	$theme[]	= array('CHAR_COLOR' => 
							array('R' => array(23, 172),
									'G' => array(235, 255),
									'B' => array(1, 163) 
									),
						   'BG_COLOR' =>
							array('R' => array(230, 255),
									'G' => array(170, 230),
									'B' => array(170, 230) 
									)
						 );
	$theme[]	= array('CHAR_COLOR' => 
							array('R' => array(0, 125),
									'G' => array(138, 250),
									'B' => array(58, 178) 
									),
							'BG_COLOR' =>
							array('R' => array(194, 230),
									'G' => array(197, 230),
									'B' => array(230, 255) 
									)
						 );
	
	$pos_x 	= 5;
	$pos_y 	= 20;
	$random = rand(0, (count($theme) - 1) );/* Get a random theme */
	
	/**
	 *	Place each character into the image 
	**/
	$angle	= 0;
	$size	   = 16;
	for($i = 0, $count = strlen($code); $i < $count; $i++) {
					
		$color  = imagecolorallocate($im, 
											  rand($theme[$random]['CHAR_COLOR']['R'][0], $theme[$random]['CHAR_COLOR']['R'][1]), 
											  rand($theme[$random]['CHAR_COLOR']['G'][0], $theme[$random]['CHAR_COLOR']['G'][1]), 
											  rand($theme[$random]['CHAR_COLOR']['B'][0], $theme[$random]['CHAR_COLOR']['B'][1])
											  ); 		
		
		imagettftext($im, $size, $angle, $pos_x, $pos_y, $color, $font, $code{$i});
		$pos_x  += $width + 1;
				
	}
		
	/* Finally show image */
	imagepng($im);	
	imagedestroy($im);	
?>