<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//assets
if ( ! function_exists('asset_url()')){
	function asset_url(){
		return base_url().'assets';
	}
}